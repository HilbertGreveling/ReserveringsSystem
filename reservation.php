<?php
// require('core/init.php');

// $user = new User();

// if(!$user->isLoggedIn()){
//     //redirect
// }
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
                        <li><a class="dropdown-button" href="#!" data-activates="navdropdown"><i class="mdi-social-person left"></i>' <!--. escape($user->data()->username) . --> '<i class="mdi-navigation-arrow-drop-down right"></i></a></li>


                    </ul>
                    <ul class="side-nav" id="mobile-demo">

                        <li><a href="reservation.php">Reserveren</a></li>
                        <li><a href="overview.php">Reserveringen</a></li>
                        <li><a href="index.php">Overzicht</a>
                        <li><a href="history.php">Verlopen reserveringen</a></li>
                        <li><a href="profile.php.php">Bewerk Profiel</a></li>
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
                <div class="row grey lighten-4 post-index z-depth-2 widget-item">
                    <h5 class="flow-text center">
                        Reserveren
                        <div class="line-separator black"></div>
                    </h5>

                    <div class="row">

                        <div class="input-field">
                            <input type="date" placeholder="Klik hier om een datum te selecteren" class="datepicker input-field">
                        </div>

                        <div class="input-field" style="margin-top:10px !important;">
                            <select>
                              <option value="" disabled selected>Kies een tijdsvak</option>
                              <option value="1">08:30 - 11:45</option>
                              <option value="2">12:30 - 16:30</option>
                              <option value="3">08:30 - 16:30</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <select>
                              <option value="" disabled selected>Lokaal</option>
                              <option value="1">130.1</option>
                              <option value="2">130.2</option>
                              <option value="3">130.3</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <button class="btn waves-effect blue waves-light right" type="submit">Reserveren</button>
                        </div>
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

        $(document).ready(function() {
            $('select').material_select();
          });

         $('.datepicker').pickadate({
            disable: [
                1, 7
              ],
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year
            monthsFull: [ 'januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december' ],
            monthsShort: [ 'jan', 'feb', 'maa', 'apr', 'mei', 'jun', 'jul', 'aug', 'sep', 'okt', 'nov', 'dec' ],
            weekdaysFull: [ 'zondag', 'maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag', 'zaterdag' ],
            weekdaysShort: [ 'zo', 'ma', 'di', 'wo', 'do', 'vr', 'za' ],
            today: 'vandaag',
            clear: 'Leeg sel.',
            close: 'sluit'
          });


    </script>
</body>
</html>