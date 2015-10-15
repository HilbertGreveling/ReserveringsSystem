<?php
    /*
        Workplace DB vullen met de tafelgroepen

        Inserten reservering
            - Eerst controleren of er op de aangegeven datum/tijd een werkplek beschikbaar is. d.m.v. een query
            - Tijd id 1/2 aangegeven in reserveringsform 1 query uitvoeren, als tijd id 3 is aangegeven in reserveringsform 2 queries uitvoeren voor tijdid 1/2
            - Reserveringen in database inserten d.m.v. query
     */
    require('core/init.php');

    $user = new User();

    if(!$user->isLoggedIn()){
        Redirect::to( 'login.php');
    }

    if(Input::exists()) {
        if(Token::check(Input::get('token'))){
            $validate = new Validate();
            $valdidate = $validate->check($_POST, array(
                'date' => array(
                    'required' => true
                ),
                'time' => array(
                    'required' => true
                )
            ));
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
            <form class="col s12 m6 offset-m3">
                <div class="widget-item z-depth-1">
                    <h6 class="flow-text center">
                        Reserveren
                        <div class="line-separator red darken-4"></div>           </h6>
                    <input name="date" type="date" placeholder="Klik hier om een datum te selecteren" class="datepicker">
                    <p>Selecteer het gewenste tijdsvenster:</p>
                    <div class="row">

                        <p>
                            <input name="time" class="blue" type="radio" id="1" />
                            <label for="1">08:30 - 11:45</label>
                        </p>
                        <p>
                            <input name="time" class="blue" type="radio" id="2" />
                            <label for="2">12:30 - 16:30</label>
                        </p>
                        <p>
                            <input name="time" class="blue" type="radio" id="3" />
                            <label for="3">08:30 - 16:30</label>
                        </p>
                    </div>
                    <div class="row">
                        <button class="btn waves-effect blue waves-light right" type="submit">Reserveren</button>
                        <input type="hidden" name="token" value="<?php echo Token::generate();?>">
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
            disableWeekends: true,
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
          });

    </script>
</body>
</html>
