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

    /**
     * [fetch get all the reservations from the given user from the database based on the $when variable]
     * @param  [type] $code [description]
     * @param  [type] $when [expired === load the expired reservations, upcoming === load the upcoming reservations]
     * @return [type]       [return the results from the executed query]
     */
    public function fetch($code = null,$when) {
        if($when === 'expired'){
            $fetch = $this->_db->query("SELECT * FROM reservations WHERE ov = ? AND date < ? order by date", array($code, date("Y-m-d")));
        } else if($when === 'upcoming') {
            $fetch = $this->_db->query("SELECT * FROM reservations WHERE ov = ? AND date >= ? order by date", array($code, date("Y-m-d")));
        }
        if(!$fetch){
            throw new Exception("There was a problem making this reservation");
        } else {
            return $fetch->results();
        }

    }

    /**
     * [checkDay description]
     * @param  [type] $date      [description]
     * @param  [type] $time      [description]
     * @param  [type] $classroom [description]
     * @return [type]            [description]
     */
    public function checkDay($date, $time, $classroom) {
        if(!empty($date) && !empty($time) && !empty($classroom)){
            $check = $this->_db->query("SELECT ov, date, workplace_id, time_id from reservations WHERE  date = ? AND time_id = ? ", array($date, $time));

            $workplace = $this->_db->get('workplace', array('classroom', "=", $classroom));
            if($check){
                if(count($check) >= count($workplace->results())) {
                    return "Er zijn geen tafels beschikbaar op dit tijdstip.";
                } else {
                    return $this->workplace($date, $classroom, $time);
                }
            }
        }
    }

    /**
     * [checkUser description]
     * @param  [type] $ov   [description]
     * @param  [type] $date [description]
     * @param  [type] $time [description]
     * @return [type]       [description]
     */
    public function checkUser($ov, $date, $time) {
        $check = $this->_db->query("SELECT ov, date, workplace_id, time_id from reservations WHERE ov = ? AND date = ? AND time_id = ? ", array($ov, $date, $time));

        if($check->results()){
            return true;
        } else {
        return false;
        }
    }

    /**
     * [workplace Generating a workplace based on availability]
     * @param  [type] $date      [Reservation date]
     * @param  [type] $classroom [Classroom]
     * @param  [type] $time      [Time ID]
     * @return [type]            [Returns the first available workplace]
     */
    public function workplace($date, $classroom, $time){
        if(empty($date) && empty($classroom) && empty($time)){
            return false;
        }

        $qDayres = $this->_db->query("SELECT classroom, workplace_id, date FROM reservations WHERE classroom = ? AND date = ? AND time_id = ? order by workplace_id", array($classroom, $date, $time));
        if(empty($oDayres = $qDayres->results())){
            return 1;
        }

        $qWorkplaces = $this->_db->query("SELECT workplace_id from workplace WHERE classroom = ? ", array($classroom));
        $oWorkplaces = $qWorkplaces->results();

        $aWorkplaces = array();
        foreach($oWorkplaces as $key => $value){
            $aWorkplaces[] = $value->workplace_id;
        }

        foreach($oDayres as $keys => $value){
            if(!is_null($key = array_search($value->workplace_id, $aWorkplaces))){
                unset($aWorkplaces[$key]);
                $aWorkplaces = array_values($aWorkplaces);
            }
        }

        return $aWorkplaces[0];
    }

    /**
     * [delete Deleting a reservation by id]
     * @param  [type] $id [reservation id]
     * @return [type]     [description]
     */
    public function delete($id) {
        if(is_null($id) && !is_numeric($id)){
            return false;
        }

        if($this->_db->query("DELETE FROM reservations WHERE id = ? ", array($id))){
            return "Alle verlopen reserveringen succesvol verwijdert.";
        }
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

    /**
     * [deleteAllExp Deletes all of the expired reservations for this user]
     * @return [type] [description]
     */
    public function deleteAllExp($id) {
        if($this->_db->query("DELETE * FROM reservations WHERE id = ? AND date < ?", array($id , date("Y-m-d")))){
            return "Alle verlopen reserveringen succesvol verwijdert.";
        }
    }

    /**
     * [data description]
     * @return [type] [description]
     */
    public function data() {
        return $this->_data;
    }
}
