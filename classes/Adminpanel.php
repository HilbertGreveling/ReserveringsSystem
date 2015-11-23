<?php
class Adminpanel {

    private $_db,
            $_data,
            $_sessionName;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

public function adminsearch($search = null) {
$adminsearch = $this->_db->query("SELECT ov, date, workplace_id, time_id from reservations WHERE ov = ? OR date = ? OR classroom = ? ";
        if(!$search){
            throw new Exception("No data found");
        } else {
            return $AdminSearch->results();
        }
}
