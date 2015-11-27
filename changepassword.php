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
            'password' => array(
                'required' => true,
                'min' => 6
            ),
            'newpassword' => array(
                'required' => true,
                'min' => 6
            ),
            'newpassword_repeat' => array(
                'required' => true,
                'min' => 6,
                'matches' => 'newpassword'
            )
        ));
        if($validation->passed()) {
            if(Hash::make(Input::get('password'), $user->data()->salt) !== $user->data()->password) {
                echo 'Your current password is wrong.';
            } else {
                $salt = Hash::salt(32);
                $user->update(array(
                    'password' => Hash::make(Input::get('newpassword'), $salt),
                    'salt' => $salt
                ));
                Session::flash('home', 'Your password has been changed!');
                Redirect::to('profile.php');
            }
        } else {
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
                            Wachtwoord veranderen
                            <div class="line-separator margin-bottom-30 red darken-4">
                            </div>
                        </h4>
                        <div class="row">
                            <form class="col s12" method="POST" action="">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="mdi-action-https prefix"></i>
                                        <input id="password" name="password" type="password" class="validate">
                                        <label for="password">Oud wachtwoord</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="mdi-action-https prefix"></i>
                                        <input id="newpassword" name="newpassword" type="password" class="validate">
                                        <label for="newpassword">Nieuw wachtwoord</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="mdi-action-https prefix"></i>
                                        <input id="newpassword_repeat" name="newpassword_repeat" type="password" class="validate">
                                        <label for="newpassword_repeat">Herhaal uw nieuwe wachtwoord</label>
                                    </div>
                                    <div class="row">
                                    <div class="row">
                                        <button class="btn waves-effect blue waves-light"  type="submit">Wachtwoord veranderen<i class="mdi-action-lock-open right"></i></button>
                                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                    </div>
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
        <script type="text/javascript">
            $(".button-collapse").sideNav();
        </script>
    </body>
</html>
