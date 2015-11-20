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

    public function checkDay($date, $time, $classroom) {
        if(!empty($date) && !empty($time) && !empty($classroom)){
            $check = $this->_db->query("SELECT ov, date, workplace_id, time_id from reservations WHERE  date = ? AND time_id = ? ", array($date, $time));

            $workplace = $this->_db->get('workplace', array('classroom', "=", $classroom));
            $workplaces = count($workplace->results());
            if($check){
                if(count($check) >= $workplaces) {
                    return "Alle tafels vol voor die dag";
                } else {
                    //genereer tafel
                    return $this->workplace($date, $classroom, $time);
                }
            }
        }
    }

    public function checkUser($ov, $date, $time) {
        $check = $this->_db->query("SELECT ov, date, workplace_id, time_id from reservations WHERE ov = ? AND date = ? AND time_id = ? ", array($ov, $date, $time));
        if($check != false){
            return true;
        }
        return false;
    }

    public function workplace($date, $classroom, $time){
        // Gotta remake workplace, was pure dogshit
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
