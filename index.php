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

=======
// require('core/init.php');

// $user = new User();
?>

<!DOCTYPE html>
<html>
<head>
    <title>TRS - Index</title>
    <link rel="shortcut icon" href="resources/icon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="resources/materialize/css/materialize.css">
</head>
<body>

    <noscript>
        <div class="row">
            <div class="col s12 m12">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text nojavascript">
                    <span class="card-title nojavascript">PLEASE ENABLE JAVASCRIPT</span>
                    <p>This website <strong>needs</strong> JavaScript!
                    The website loses 90% of its functionality without JavaScript being enabled.</p>
                    </div>
                </div>
            </div>
        </div>
    </noscript>



    <ul id="navdropdown" class="dropdown-content red lighten-4">
        <li><a href="index.php">Overzicht</a>
        <li><a href="profile.php">Profiel</a></li>
        <li><a href="editprofile.php">Bewerk Profiel</a></li>
        <li class="divider"></li>
        <li><a href="logout.php">Afmelden</a></li>
    </ul>
    <!-- Navigation bar -->
    <nav>
        <div class="nav-wrapper blue lighten-1">
            <a href="index.php" class="brand-logo center" style="margin-left:10px;">TRS</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>



            <ul class="right hide-on-med-and-down">
                <li><a href="#">Reserveren</a></li>
                <li><a href="#">Reserveringen</a></li>

                <?php
                if($user->isLoggedIn()) {
                    echo '<li><a class="dropdown-button" href="#!" data-activates="navdropdown"><i class="mdi-social-person left"></i>' . escape($user->data()->username) .  '<i class="mdi-navigation-arrow-drop-down right"></i></a></li>';
                } else {
                    echo '<li><a href="registration.php">Become a Watcher</a></li>
                        <li><a href="login.php">Login</a></li>';
                }
                ?>
            </ul>
            <ul class="side-nav" id="mobile-demo">

                <li><a href="#">Reserveren</a></li>
                <li><a href="#">Reserveringen</a></li>

                <?php
                if($user->isLoggedIn()) {
                    echo '<li><a href="profile.php">Profile</a></li>
                    <li><a href="editprofile.php">Edit Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>';
                } else {
                    echo '<li><a href="registration.php">Become a Watcher</a></li>
                        <li><a href="login.php">Login</a></li>';
                }
                ?>
            </ul>
        </div>
        <!-- Navigation bar end -->
    </nav>


    <script type="text/javascript" src="resources/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="resources/materialize/js/sideNav.js"></script>
    <script type="text/javascript" src="resources/materialize/js/dropdown.js"></script>

    <script type="text/javascript">
        $(".button-collapse").sideNav();

        $(".dropdown-button").dropdown();

    </script>
</body>
</html>
>>>>>>> Michael
