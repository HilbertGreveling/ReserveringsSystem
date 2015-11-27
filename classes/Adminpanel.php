<?php
  class Adminpanel {

      private $_db,
      $_data,
      $_sessionName;

      public function __construct() {
        $this->_db = DB::getInstance();
      }

    public function display(){
      $display = $this->_db->query("SELECT * from reservations WHERE date >= CURDATE()");
      if(!$display){
        throw new Exception("No data found");
      } else {
        return $display->results();
      }
    }

    public function userdisplay(){
      $display = $this->_db->query("SELECT * from users");
      if(!$display){
        throw new Exception("No data found");
      } else {
        return $display->results();
      }
    }
}
