
<?php
class DB {
    private static $_instance = null;

    /* ------------------------------------------------------------------------------------------------------
    /   Creating private variables
    / ------------------------------------------------------------------------------------------------------ */
    private $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_count = 0;


    /* ------------------------------------------------------------------------------------------------------
    /   Creating a connection with the database
    /   By using the prefixed Database configuration given in init.php
    /
    / ------------------------------------------------------------------------------------------------------ */
    private function __construct() {
        try{
            $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') .';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    /* ------------------------------------------------------------------------------------------------------
    /   Checks if we instantiated a object.
    /   If the object is instantiated it wont be instantiated again
    / ------------------------------------------------------------------------------------------------------ */
    public static function getInstance() {
        if(!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }


    /* ------------------------------------------------------------------------------------------------------
    /   Executes a query after the inserted values are processed in the action() method
    /   After a query is executed the fetchAll() method assigns the returned items to $_results
    /
    /   $user = DB::getInstance()->query("SELECT username FROM users WHERE username = ?", array('henk'));
    /
    /   if($user->error()){
    /       echo 'No entry in the database';
    /   } else {
    /       //Perform a action with the executed query or just use this as a error functionality
    /   }
    / ------------------------------------------------------------------------------------------------------ */
    public function query($sql, $params = array()) {
        $this->error = false;
        if($this->_query = $this->_pdo->prepare($sql)) {

            $x = 1;
            if(count($params)){
                foreach($params as $param){
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }

            if($this->_query->execute()){
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            } else {
                $this->_error = true;
            }
        }
        return $this;
    }

    /* ------------------------------------------------------------------------------------------------------
    /   Fills and prepares the query and then executes the query with the the query() method
    / ------------------------------------------------------------------------------------------------------ */

        public function action($action, $table, $where = array()) {
        if(count($where) === 3) {
            $operators = array('=', '>', '<', '>=', '<=');

            $field      = $where[0];
            $operator   = $where[1];
            $value      = $where[2];

            if(in_array($operator, $operators)) {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
                if(!$this->query($sql, array($value))->error()) {
                    return $this;
                }
            }
        }
        return false;
    }

    /* ------------------------------------------------------------------------------------------------------
    /   Selecting data from the database by calling the action() method and setting the
    /   $action parameter of the action() method to SELECT *
    /
    /   $user = DB::getInstance()->get('users', array('username', '=', 'henk'));
    / ------------------------------------------------------------------------------------------------------ */
    public function get($table, $where) {
        return $this->action('SELECT *', $table, $where);
    }

    /* ------------------------------------------------------------------------------------------------------
    /   Deleting data from the database by calling the action() method and setting the
    /   $action parameter of the action() method to DELETE *
    /
    /   $deleteuser = DB::getInstance()->delete('users', array('username', '=', 'henk'))
    / ------------------------------------------------------------------------------------------------------ */
    public function delete($table, $where) {
        return$this->action('DELETE *', $table, $where);
    }

    /* ------------------------------------------------------------------------------------------------------
    /   Inserting data into the database
    /
    /   $userInsert = DB::getInstance()->insert('users', array(
    /   'username' => 'Michael',
    /   'password' => 'test',
    /   'salt' => 'salt'
    /   ));
    / ------------------------------------------------------------------------------------------------------ */
    public function insert($table, $fields = array()) {
        if(count($fields)) {
            $keys = array_keys($fields);
            $values = null;
            $x = 1;

            foreach($fields as $field) {
                $values .= '?';
                if($x < count($fields)) {
                    $values .= ',';
                }
                $x++;
            }
            $sql = "INSERT INTO {$table} (`" . implode('`,`', $keys) . "`) VALUES ({$values})";

            if(!$this->query($sql, $fields)->error()) {
                return true;
            }
        }
    }

    /* ------------------------------------------------------------------------------------------------------
    /   Updating data from the database
    /
    /   $userUpdate = DB::getInstance()->update('users', 1 , array(
    /   'username' => 'Michael',
    /   'password' => 'test',
    /   'salt' => 'salt'
    /   ));
    / ------------------------------------------------------------------------------------------------------ */
    public function update($table, $id, $fields) {
        $set = '';
        $x = 1;

        foreach ($fields as $name => $value) {
            $set .= "{$name} = ?";
            if($x < count($fields)) {
                $set .= ', ';
            }

            $x++;
        }

        $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

        if(!$this->query($sql, $fields)->error()) {
                return true;
            }
    }

    /* ------------------------------------------------------------------------------------------------------
    /   Returns all of the results returned by the query executed in the query() method
    /   To only return the first result of the query, use the first() method
    /
    / ------------------------------------------------------------------------------------------------------ */

    public function results() {
        return $this->_results;
    }


    /* ------------------------------------------------------------------------------------------------------
    /   Returns the value of the $_error boolean
    / ------------------------------------------------------------------------------------------------------ */

    public function error(){
        return $this->_error;
    }

    /* ------------------------------------------------------------------------------------------------------
    /   Shows the first row of the rows that are selected with your query
    /
    /   QUERY
    /   $user = DB::getInstance()->get('users', array('username', '=', 'henk'));
    /
    /   USAGE OF first() method
    /   echo $user->first();
    / ------------------------------------------------------------------------------------------------------ */
    public function first() {
        return $this->results()[0];
    }

    /* ------------------------------------------------------------------------------------------------------
    /   Method to count the values that are given through with the
    /   $where array from the action() method
    / ------------------------------------------------------------------------------------------------------ */
    public function count() {
        return $this->_count;
    }


    }