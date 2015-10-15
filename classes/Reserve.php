<?php
class Reserve {
    /*
    Functies
        checkReservation
        getReservations
        createReservation
        deleteReservation
        deleteAllExpReservations
 */
    private $_db,
            $_data;

    public function __construct($user = null) {
        $this->_db = DB::getInstance();
    }

    public function fetch($code = null) {

    }

    public function check($date = null, $time = null) {

    }

    public function delete($id = null) {

    }

    public function create() {

    }

    public function deleteAllExp($user = null) {

    }

    public function data() {
        return $this->_data;
    }