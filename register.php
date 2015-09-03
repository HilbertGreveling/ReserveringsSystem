<?php
    require_once 'core/init.php';


    /* ------------------------------------------------------------------------------------------------------
    /   Checks if the values entered in the input fields match the set rules by calling the Validate check()
    /   method and giving an array with the fields, and an array inside of the array with the rules that
    /   are being applied to the fields
    / ------------------------------------------------------------------------------------------------------ */
    if(Input::exists()) {
        if(Token::check(Input::get('token'))) {

            $validate = new Validate();
            $validate = $validate->check($_POST, array(
                'ov' => array(
                    'required' => true,
                    'min' => 2,
                    'max' => 20,
                ),
                'password' => array(
                    'required' => true,
                    'min' => 2),
                'passwordRepeat' => array(
                    'required' => true,
                    'matches' => 'password'
                ),
                'firstname' => array(
                    'required' => true,
                    'min' => 2,
                    'max' => 50
                ),
                'lastname' => array(
                    'required' => true,
                    'min' => 2,
                    'max' => 50
                ),


            ));
        /* ------------------------------------------------------------------------------------------------------
        /   If the validation is a success redirect the user to the main page
        /   If there occur any errors during the validation process they will be displayed on the screen
        /   echo all the errors with the use of a foreach loop
        / ------------------------------------------------------------------------------------------------------ */
            if($validate->passed()) {
                $user = new User();
                $salt = Hash::salt(32);

                try {

                    $user->create(array(
                        'ov' => Input::get('ov'),
                        'email' => Input::get('email'),
                        'password' => Hash::make(Input::get('password'), $salt),
                        'salt' => $salt,
                        'firstname' => Input::get('firstname'),
                        'lastname' => Input::get('lastname'),
                        'group' => 1
                        ));

                        Session::flash('home', 'U bent succesvol geregistreerd en u kunt nu inloggen. ');
                        Redirect::to('index.php');
                }catch(Exception $e) {
                    die($e->getMessage());
                }
            } else {
                foreach($validate->errors() as $error) {
                    echo $error . '<br>';
                }
            }
        }
    }

?>

<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable = 0">
        <link rel="shortcut icon" href="resources/icon/favicon.ico">
        <link href="resources/materialize/css/materialize.css" rel="stylesheet">
        <link href="resources/css/style.css" rel="stylesheet">
        <title>Registratie pagina</title>
</head>
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
                        <form class="col s12" method="POST" action="">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="mdi-action-account-circle prefix"></i>
                                    <input id="ov" name="ov" type="text" class="validate">
                                    <label for="ov">Ov-nummer</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="mdi-action-account-circle prefix"></i>
                                    <input id="firstname" name="firstname" type="text" class="validate">
                                    <label for="firstname">Voornaam</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="mdi-action-account-circle prefix"></i>
                                    <input id="lastname" name="lastname" type="text" class="validate">
                                    <label for="lastname">Achternaam</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="mdi-content-mail prefix"></i>
                                    <input id="email" name="email" type="text" class="validate">
                                    <label for="email">E-mail</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="mdi-action-https prefix"></i>
                                    <input id="password" name="password" type="password" class="validate">
                                    <label for="password">Password</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="mdi-action-https prefix"></i>
                                    <input id="passwordrepeat" name="passwordRepeat" type="password" class="validate">
                                    <label for="passwordrepeat">Repeat password</label>
                                </div>
                                <button class="btn waves-effect blue waves-light"  type="submit">Registreren<i class="mdi-action-lock-open right"></i></button>
                                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
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
