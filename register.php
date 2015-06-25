<?php
    // TODO LIST
    //
    // Redirect after logging in
    // Javascript alert if logging in failed with some extra functionality

    //------------------------------------------------------------------------------
    // Requires
    //------------------------------------------------------------------------------
    // require_once 'core/init.php';
    // $user = new User();


    // /* ------------------------------------------------------------------------------------------------------
    // /   Check if the user is logged in.
    // /   If the user is logged in, redirect the user to index.php (user dashboard).
    // /   If the user isn't logged in redirect the user to the login page.
    // / ------------------------------------------------------------------------------------------------------ */
    // if($user->isLoggedIn())
    // {
    //     Redirect::to('index.php');
    // }
    // elseif(Input::exists()) {
    //     if(Token::check(Input::get('token'))) {
    //         $validate = new Validate();

    //         $validation = $validate->check($_POST, array(
    //                 'username' => array('required' => true),
    //                 'password' => array('required' => true)
    //             ));

    //         if($validation->passed()) {

    //             $login = $user->login(Input::get('username'), Input::get('password'));

    //             if($login) {
    //                 Redirect::to('index.php');
    //             } else {
    //                 //failed to login
    //             }

    //         } else {
    //             foreach($validation->errors() as $error) {
    //                 echo $error, '<br>';
    //             }
    //         }
    //     }
    // }
?>
<!DOCTYPE html>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable = 0">
        <link rel="shortcut icon" href="resources/icon/favicon.ico">
        <link href="resources/css/materialize.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="resources/css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Reserveringssyteem</title>
</head>
<body class="grey lighten-3">


    <div class="container">
    <div class="row">
        <div class="col s12 m6 l4 offset-m4 offset-l4">
            <div class="widget-item z-depth-1">
                <h4>Registreren</h4>


                    <div class="row">
                        <form class="col s12" method="POST" autocomplete="off" action="">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">account_box</i>
                                    <input id="ov" name="ov" type="text" class="validate">
                                    <label for="ov">Ov Nummer</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">email</i>
                                    <input id="email" name="email" type="text" class="validate">
                                    <label for="email">Email</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">face</i>
                                    <input id="firstname" name="firstname" type="text" class="validate">
                                    <label for="firstname">Voornaam </label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">face</i>
                                    <input id="lastname" name="lastname" type="text" class="validate">
                                    <label for="lastname">Achternaam</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="mdi-action-https prefix"></i>
                                    <input id="password" name="password" type="password" class="validate">
                                    <label for="password">Wachtwoord</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="mdi-action-https prefix"></i>
                                    <input id="password_again" name="password_again" type="password" class="validate">
                                    <label for="password_again">Wachtwoord Herhalen</label>
                                </div>
                                <div class="row">
                                    <a class="btn waves-effect blue waves-light" href="registration.php" >Registreren<i class="mdi-content-send"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript" src="resources/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="resources/js/materialize.min.js"></script>
</body>
</html>