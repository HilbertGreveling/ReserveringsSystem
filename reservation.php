<?php
    /*
        Workplace DB vullen met de tafelgroepen

        Inserten reservering
            - Eerst controleren of er op de aangegeven datum/tijd een werkplek beschikbaar is. d.m.v. een query
            - Tijd id 1/2 aangegeven in reserveringsform 1 query uitvoeren, als tijd id 3 is aangegeven in reserveringsform 2 queries uitvoeren voor tijdid 1/2
            - Reserveringen in database inserten d.m.v. query

            20/10 fix verification of input
     */
    require('core/init.php');

    $user = new User();
    $reserve = new Reserve();

    if(!$user->isLoggedIn()){
        Redirect::to( 'login.php');
    }

//$workplace = $reserve->workplace("2015-10-29", 130, 3);
    echo $user->data()->id;

    if(Input::exists()) {
        if(Token::check(Input::get('token'))){

            $validate = new Validate();

            $validation = $validate->check($_POST, array(
                'date' => array('required' => true),
                'time' => array('required' => true)
            ));
            if($validation->passed($validate)){ // Check if the selected date is available, if false return error message

                // print_r($reserve->checkDay(Input::get('date'), Input::get('time')));
                $check = $reserve->checkUser($user->data()->id, Input::get('date'), Input::get('time'));
                if($check){
                    try {
                    $reservation = $reserve->create(
                        array(
                            'ov' => $user->data()->id,
                            'workplace_id' => 2,
                            'classroom' => Input::get('classroom'),
                            'date' => Input::get('date'),
                            'time_id' => Input::get('time')
                        ));
                    }catch(Exception $e) {
                        die($e->getMessage());
                    }
                } else {
                    echo "meme";
                }
            } else {
                echo "Thats not the magic number";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>TRS - Index</title>
    <link rel="shortcut icon" href="resources/icon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="resources/css/materialize.css">
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
</head>
<body class="grey lighten-3">

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



    <ul id="navdropdown" class="dropdown-content cyan lighten-3">
        <li><a href="index.php">Overzicht</a>
        <li><a href="history.php">Verlopen reserveringen</a></li>
        <li><a href="profile.php">Bewerk Profiel</a></li>
        <li class="divider"></li>
        <li><a href="logout.php">Afmelden</a></li>
    </ul>

    <!-- Navigation bar -->
    <nav class="navmargin">
            <div class="nav-wrapper blue lighten-1">
                <div class="container">
                    <a href="index.php" class="brand-logo" style="margin-left:10px;">TRS</a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

                    <ul class="right hide-on-med-and-down">
                        <li><a href="reservation.php">Reserveren</a></li>
                        <li><a href="overview.php">Reserveringen</a></li>
                        <li><a class="dropdown-button" href="#!" data-activates="navdropdown"><i class="mdi-social-person left"></i><?php echo escape($user->data()->firstname ); ?><i class="mdi-navigation-arrow-drop-down right"></i></a></li>


                    </ul>
                    <ul class="side-nav" id="mobile-demo">

                        <li><a href="reservation.php">Reserveren</a></li>
                        <li><a href="overview.php">Reserveringen</a></li>
                        <li><a href="index.php">Overzicht</a>
                        <li><a href="history.php">Verlopen reserveringen</a></li>
                        <li><a href="profile.php">Bewerk Profiel</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php">Afmelden</a></li>


                    </ul>
                </div>
            </div>
            <!-- Navigation bar end -->
        </nav>

    <div class="container">
        <div class="row">
            <form class="col s12 m6 offset-m3" method="post" action="">
                <div class="widget-item z-depth-1">
                    <h6 class="flow-text center">
                        Reserveren
                        <div class="line-separator red darken-4"></div>
                    </h6>

                    <div class="row">

                        <input name="date" type="date" placeholder="Klik hier om een datum te selecteren" class="datepicker input-field">

                        <div class="input-field col s12">
                            <select name="time">
                              <option value="1" selected>Selecteer het gewenste tijdsvenster</option>
                              <option value="1">08:30 - 11:45</option>
                              <option value="2">12:30 - 16:30</option>
                              <option value="3">08:30 - 16:30</option>
                            </select>
                        </div>
                        <div class="input-field col s12">
                            <select name="classroom">
                              <option value="130" selected>Selecteer een klaslokaal</option>
                              <option value="130">130</option>
                              <option value="215">215</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
                        <button class="btn waves-effect blue waves-light right" type="submit">Reserveren</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="resources/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="resources/js/materialize.min.js"></script>

    <script type="text/javascript">
        $(".button-collapse").sideNav();

        $(".dropdown-button").dropdown();

         $('.datepicker').pickadate({
            format: 'yyyy-mm-dd',
            disable: [
                1, 7
            ],
            min: true,
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
          });

          $(document).ready(function() {
            $('select').material_select();
          });
    </script>
</body>
</html>
