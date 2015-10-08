<?php

require_once 'core/init.php';

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true,)
        ));
        if($validation->passed()) {
            $user = new User();
            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(
                Input::get('username'),
                Input::get('password'),
                $remember
             );
            if($login) {
                Redirect::to('index.php');
            } else {
                ?>
                <div class="container">
                     <div class="row">
                        <div class="col s12 m4 l4 offset-m4 offset-l4">
                            <div class="widget-item z-depth-1">
                                Ov-nummer en/of wachtwoord is incorrect!
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable = 0">
        <link rel="shortcut icon" href="resources/icon/favicon.ico">
        <link href="resources/css/materialize.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="resources/css/style.css">
        <title>Reserveringssyteem</title>
</head>
<body class="grey lighten-3">


    <div class="container">
    <div class="row">
        <div class="col s12 m4 l4 offset-m4 offset-l4">
            <div class="widget-item z-depth-1">
                <h4>Inloggen</h4>

                    <div class="row">
                        <form class="col s12" method="POST" autocomplete="off" action="">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="mdi-action-account-circle prefix"></i>
                                    <input id="username" name="username" type="text" class="validate">
                                    <label for="username">Ov Nummer</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="mdi-action-https prefix"></i>
                                    <input id="password" name="password" type="password" class="validate">
                                    <label for="password">Wachtwoord</label>
                                </div>
                                <div class="row">
                                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
                                    <button class="btn waves-effect green waves-light left" style="width:49%" type="submit">Inloggen<i class="mdi-action-lock-open right"></i></button>

                                    <a class="btn waves-effect blue waves-light right" style="width:49%" href="register.php" >Registreren<i class="mdi-content-send right"></i></a>
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
