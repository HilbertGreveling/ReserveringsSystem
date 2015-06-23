<?php
require_once 'core/init.php';

// $user = DB::getInstance()->query("SELECT firstname FROM users WHERE ov = ?", array('1'));
$user = DB::getInstance()->get('users', array('ov', '=', '1'));
// var_dump($user);
if(!$user->count()){
     echo 'No entry in the database';
} else {
   foreach($user->results() as $user) {
        echo $user->firstname, '<br>';
   }
}
 //Perform a action with the executed query or just use this as a error functionality

// $user = DB::getInstance()->get('users', array('ov', '=', '1'));

// if ($user->error()) {
// 	echo 'No user';
// } else {
// 	echo 'ok';
// }

