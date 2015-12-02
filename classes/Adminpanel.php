<?php
  class Adminpanel {

      private $_db,
      $_data,
      $_sessionName;

      public function __construct() {
        $this->_db = DB::getInstance();
      }

      /**
     * [fetch get all the reservations from the database based on everything after CURDATE]
     */

    public function display(){
      $display = $this->_db->query("SELECT * from reservations WHERE date >= CURDATE()");
      if(!$display){
        throw new Exception("No data found");
      } else {
        return $display->results();
      }
    }


      /**
     * [fetch get all the reservations from the database based on everything after CURDATE]
     */
    public function userdisplay(){
      $display = $this->_db->query("SELECT * from users");
      if(!$display){
        throw new Exception("No data found");
      } else {
        return $display->results();
      }
    }

/**
     * [delete Deleting a USER by username]
     * @param  [type] $id [users username]
     * @return [type]     [description]
     */
    public function deleteuser($username) {
        if(is_null($username)){
            return false;
        }

        if($this->_db->query("DELETE FROM users WHERE username = ? ", array($username))){
            return "De gebruiker is succesvol verwijderd.";
        }
    }
}
