<?php
class Session {

    public static function exists($ov) {
        return (isset($_SESSION[$ov])) ? true : false;
    }

    public static function put($ov, $value) {
        return $_SESSION[$ov] = $value;
    }

    public static function get($ov) {
        return $_SESSION[$ov];
    }

    public static function delete($ov) {
        if(self::exists($ov)) {
            unset($_SESSION[$ov]);
        }
    }
    public static function flash($ov, $string = '') {
        if(self::exists($ov)) {
            $session - self::get($ov);
            self::delete($ov);
            return $session;
        } else {
            self::put($ov, $string);
        }
    }

}