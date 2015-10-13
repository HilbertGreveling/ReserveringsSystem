<?php
/*
    Alle staande reserveringen ophalen + optie om reserveringen te verwijderen uit de database.
 */
require('core/init.php');

$user = new User();

if(!$user->isLoggedIn()){
    Redirect::to( 'login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>TRS - Index</title>
    <link rel="shortcut icon" href="resources/icon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="resources/css/materialize.css">
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                        <li><a href="profile.php.php">Bewerk Profiel</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php">Afmelden</a></li>


                    </ul>
                </div>
            </div>
            <!-- Navigation bar end -->
        </nav>

    <!-- Genereer reserveringlijst voor gebruikers -->
    <div class="container">
        <div class="row">
            <div class="grey lighten-4 post-index z-depth-2 col s12 m8 offset-m2">
                <h5 class="flow-text center" style="text-align:center;">
                    Komende reserveringen
                    <div class="line-separator red darken-4"></div>
                </h5>
                <div class="row">
                    <table class="centered">
                        <thead>
                          <tr>
                                <th data-field="date" class="center">Datum</th>
                                <th data-field="time" class="center">Tijd</th>
                                <th data-field="workspace" class="center">Werkplek</th>
                                <th data-field="" class="center"></th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>22/03/2015</td>
                                <td>08:30 - 16:30</td>
                                <td>130.1</td>
                                <td><i class="material-icons">delete</i></td>
                            </tr>
                            <tr>
                                <td>22/03/2015</td>
                                <td>08:30 - 16:30</td>
                                <td>130.6</td>
                                <td><i class="material-icons">delete</i></td>
                            </tr>

                            <tr>
                                <td>26/03/2015</td>
                                <td>12:30 - 16:30</td>
                                <td>222.3</td>
                                <td><i class="material-icons">delete</i></td>
                            </tr>
                            <tr>
                                <td>21/04/2015</td>
                                <td>08:30 - 11:45</td>
                                <td>130.3</td>
                                <td><i class="material-icons">delete</i></td>
                            </tr>
                            <tr>
                                <td>22/04/2015</td>
                                <td>08:30 - 16:30</td>
                                <td>222.1</td>
                                <td><i class="material-icons">delete</i></td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="resources/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="resources/js/materialize.min.js"></script>

    <script type="text/javascript">
        $(".button-collapse").sideNav();

        $(".dropdown-button").dropdown();

    </script>
</body>
</html>

