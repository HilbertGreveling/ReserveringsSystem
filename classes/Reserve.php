<?php
class Reserve {
    private $_db,
            $_data;

    public function __construct($user = null){
        $this->_db = DB::getInstance();
    }

    public function fetch($code = null) {

    }

