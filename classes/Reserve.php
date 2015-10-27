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

    }

    public function check($date = null, $time = null) {

    }

    public function delete($id = null) {

    }

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
