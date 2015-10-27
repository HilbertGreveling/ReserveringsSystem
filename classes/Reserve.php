<?php
class Reserve {
    /*
    Functies
        checkReservation
        getReservations
        createReservation
        deleteReservation
        deleteAllExp
 */
    private $_db,
            $_data,
            $_sessionName;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function fetch($code = null) {
        $fetch = $this->_db->get('reservations', array('ov', '=', $code), 'ORDER BY DATE');
        if(!$fetch){
            throw new Exception("There was a problem making this reservation");
        } else {
            return $fetch->results();
        }

    }

    public function check($date = null, $time = null) {

    }

    public function delete($id = null) {

    }

    /**
     * [create]
     * @param  array  $fields [description]
     * @return [type]         [description]
     */
    public function create($fields = array()) {
        if(!$this->_db->insert('reservations', $fields)){
            throw new Exception("There was a problem making this reservation");
        }
    }

    public function deleteAllExp() {
        /*

        */
    }

    public function data() {
        return $this->_data;
    }
}
