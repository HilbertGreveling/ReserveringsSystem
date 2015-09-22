<?php
class Validate {

    private $_passed = false,
            $_errors = array(),
            $_db = null;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function check($source, $items = array()) {
        foreach($items as $item => $rules) {
            foreach($rules as $rule => $rule_value) {

                $value = trim($source[$item]);
                $item = escape($item);

                if($rule === 'required' && empty($value)) {
                    $this->addError("{$item} is verplicht");
                } else if(!empty($value)) {
                    switch($rule) {
                        case 'min':
                            if(strlen($value) < $rule_value) {
                                $this->addError("Het veld {$item} moet minimaal {$rule_value} tekens lang zijn.");
                            }
                        break;
                        case 'max':
                            if(strlen($value) > $rule_value) {
                                $this->addError("Het veld {$item} mag maximaal {$rule_value} tekens lang zijn.");
                            }
                        break;
                        case 'matches':
                            if($value != $source[$rule_value]) {
                                $this->addError("{$rule_value} moet gelijk zijn aan {$item}.");
                            }
                        break;
                        case 'unique':
                            $this->_db->get($rule_value, array($item, '=', $value));
                            if($this->_db->count() > 0) {
                            $this->addError("Uw {$item} is already in use");
                           }
                          break;
                          case 'save':
                            if(!preg_match('/\A(?=[\x20-\x7E]*?[A-Z])(?=[\x20-\x7E]*?[a-z])(?=[\x20-\x7E]*?[0-9])[\x20-\x7E]{6,}\z/', $value))
                            {
                                $this->addError("Uw {$item} moet uit een speciaal karakter en uit een nummer bestaan");
                            }
                            case 'number':
                            {
                                if(!is_numeric($value)){

                                }
                            }
                    }
                }

            }
        }

        if(empty($this->_errors)) {
            $this->_passed = true;
        }

        return $this;
    }

    private function addError($error) {
        $this->_errors[] = $error;
    }

    public function errors() {
        return $this->_errors;
    }

    public function passed() {
        return $this->_passed;
    }
}
