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
            $_data,
            $_sessionName;

    public function __construct($user = null) {
        $this->_db = DB::getInstance();
    }

    public function fetch($code = null) {

    }

    public function check($date = null, $time = null) {

    }

    public function delete($id = null) {

    }

    public function create($fields = array(), $id = null) {
        if (!$id && User::isLoggedIn()) {
            $id = $this->data()->id;
        }
        if(!$_db->insert('reservations', $id, $fields)){
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
