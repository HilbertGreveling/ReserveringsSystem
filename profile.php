<?php
require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()){
    Redirect::to( 'login.php');
}

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'firstname' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
            )
        ));
        if($validation->passed()) {
            try {
                $user->update(array(
                    'firstname' => Input::get('firstname'),
                    'lastname' => Input::get('lastname'),
                    'email' => Input::get('email')

                ));
                    Redirect::to('profile.php');
            }catch(Exception $e) {
                die($e->getMessage());
            }
        }
        else {
            foreach($validation->errors() as $error) {
                echo $error, '<br>';
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
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <title>Reserveringssyteem</title>
    </head>
    <body class="grey lighten-3">

  <!-- Include Menu balk-->
<?php
include 'includes/menu.php';
?>


        <div class="container">
            <div class="row">
                <div class="col s12 m6 offset-m3 post-index">
                    <div class="widget-item z-depth-1">
                        <h4>
                            Profiel
                            <div class="line-separator margin-bottom-30 red darken-4">
                            </div>
                        </h4>
                        <div class="row">
                            <form class="col s12" method="POST" autocomplete="off" action="">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="mdi-action-account-circle prefix"></i>
                                        <input disabled value="<?php echo escape($user->data()->username); ?>" id="disabled" type="text" class="validate">
                                        <label for="username">Ov Nummer</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="mdi-content-mail prefix"></i>
                                        <input value="<?php echo escape($user->data()->email); ?>" id="email" name="email" type="text" class="validate">
                                        <label for="email">Voornaam </label>
                                    </div>
                                    <div class="input-field col s12">
                                         <i class="mdi-action-account-circle prefix"></i>
                                        <input value="<?php echo escape($user->data()->firstname); ?>" id="firstname" name="firstname" type="text" class="validate">
                                        <label for="firstname">Voornaam </label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="mdi-action-account-circle prefix"></i>
                                        <input value="<?php echo escape($user->data()->lastname); ?>" id="lastname" name="lastname" type="text" class="validate">
                                        <label for="lastname">Achternaam</label>
                                    </div>
                                    <div class="row">
                                        <button class="btn waves-effect blue waves-light"  type="submit">Gegevens veranderen</button>
                                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6 offset-m3 post-index">
                    <div class="widget-item z-depth-1">
                            <h5 class="flow-text center">
                                    Wachtwoord veranderen
                                    <div class="line-separator red darken-4"></div>
                            </h5>
                            <h6 class="center">Klik op de knop hieronder om het wachtwoord te veranderen.</h6>
                            <div class="row">
                                <a class="btn waves-effect blue waves-light m6" href="changepassword.php" >Wachtwoord veranderen</a>
                            </div>
                    </div>
            </div>
        </div>
        <script type="text/javascript" src="resources/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="resources/js/materialize.min.js"></script>
        <script type="text/javascript">
            $(".button-collapse").sideNav();
        </script>
    </body>
</html>
