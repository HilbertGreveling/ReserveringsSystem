<?php
class User {
    private $_db,
            $_data,
            $_sessionName,
            $_cookieName,
            $_isLoggedIn;
    public function __construct($user = null) {
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('session/session_name');
        $this->_cookieName = Config::get('remember/cookie_name');

        if(!$user) {
            if(Session::exists($this->_sessionName)) {
                $user = Session::get($this->_sessionName);
                // echo $user;
                if($this->find($user)) {
                    $this->_isLoggedIn = true;
                } else {
                    $this->logout();
                }
            }
        } else {
            $this->find($user);
        }
    }

    /**
     * [create description]
     * @param  array  $fields [description]
     * @return [type]         [description]
     */
    public function create($fields = array()) {
        if(!$this->_db->insert('users', $fields)) {
            throw new Exception('There was a problem creating this account.');
        }
    }

    /**
     * [update description]
     * @param  array  $fields [description]
     * @return [type]         [description]
     */
    public function update($fields = array(), $id = null) {
        if(!$id && $this->isLoggedIn()) {
            $id = $this->data()->id;
        }
        if(!$this->_db->update('users', $id, $fields)) {
            throw new Exception('There was a problem updating.');
        }
    }

    public function delete($ov){
        if(!is_numeric($ov) && empty($ov)){
            return false;
        }

        if($this->_db->query("DELETE FROM users WHERE id = ? ", array($ov))){
            return true;
        }
    }
    /**
     * [find description]
     * @param  [type] $user [description]
     * @return [type]       [description]
     */
    public function find($user = null) {
        if($user) {
            // if user had a numeric username this FAILS...
            $field = (is_numeric($user)) ? 'id' : 'username';
            $data = $this->_db->get('users', array($field, '=', $user));
            if($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

    /**
     * [login description]
     * @param  [type] $username [description]
     * @param  [type] $password [description]
     * @param  [type] $remember [description]
     * @return [type]           [description]
     */
    public function login($username = null, $password = null, $remember = false) {

        // print_r($this->_data);
        // check if username has been defined
        if($username && $password && $this->exists()) {
            Session::put($this->_sessionName, $this->data()->id);
        }else {
            $user = $this->find($username);
            if($user) {
                if($this->data()->password === Hash::make($password, $this->data()->salt)) {
                    Session::put($this->_sessionName, $this->data()->id);
                    if($remember) {
                        $hash = Hash::unique();
                        $hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));
                        if(!$hashCheck->count()) {
                            $this->_db->insert('users_session', array(
                                'user_id' => $this->data()->id,
                                'hash' => $hash
                            ));
                        } else {
                            $hash = $hashCheck->first()->hash;
                        }
                        Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
                    }
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * [hasPermission description]
     * @param  [type]  $key [description]
     * @return boolean      [description]
     */
    public function hasPermission($key) {
    $group = $this->_db->get('groups', array('id', '=', $this->data()->group));
        if($group->count()) {
            $permissions = json_decode($group->first()->permissions, true);

            if($permissions[$key] == true) {
                return true;
            }
        }
    }

    /**
     * [exists description]
     * @return [type] [description]
     */
    public function exists() {
        return (!empty($this->_data)) ? true : false;
    }

    /**
     * [logout description]
     * @return [type] [description]
     */
    public function logout() {
        $this->_db->delete('user_session', array('user_id', '=', $this->data()->id));
        Session::delete($this->_sessionName);
        Cookie::delete($this->_cookieName);
    }

    /**
     * [data description]
     * @return [type] [description]
     */
    public function data() {
        return $this->_data;
    }

    /**
     * [isLoggedIn description]
     * @return boolean [description]
     */
    public function isLoggedIn() {
        return $this->_isLoggedIn;
    }
}
