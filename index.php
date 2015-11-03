<?php
/*
    Query komende 5 reserveringen ophalen
 */
require('core/init.php');

$user = new User();
$reserve = new Reserve();

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
</head>
<body class="grey lighten-3">

    <noscript>
        <div class="row">
            <div class="col s12 m12">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text nojavascript">
                    <span class="card-title nojavascript">Deze website werkt niet zonder javascript</span>
                    <p>
                        Klik op deze link om te leren hoe je  <a href="https://support.google.com/adsense/answer/12654?hl=nl">Javascript aan kan zetten</a>
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </noscript>

        <ul id="navdropdown" class="dropdown-content cyan lighten-3">
        <li><a href="#"><i class="mdi-social-person left"></i><?php echo escape($user->data()->username); ?></a></li>
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
                        <li><a class="dropdown-button" href="profile.php?user=<?php echo escape($user->data()->firstname); ?>" data-activates="navdropdown"><i class="mdi-social-person left"></i><?php echo escape($user->data()->firstname ); ?><i class="mdi-navigation-arrow-drop-down right"></i></a></li>


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

    <!-- Genereer reserveringlijst voor gebruikers -->
    <div class="container">
        <div class="row">
            <div class="grey lighten-4 post-index z-depth-2 col s12 m8 offset-m2">
                <h5 class="flow-text" style="text-align:center;">
                    Komende reserveringen
                    <div class="line-separator red darken-4"></div>
                </h5>
                <div class="row">
                    <table class="centered">
                        <thead>
                          <tr>
                              <th data-field="workspaceid" class="center">Datum</th>
                              <th data-field="date" class="center">Tijd</th>
                              <th data-field="time" class="center">Werkplek</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php

                                $reservations = $reserve->fetch($user->data()->id, "upcoming");
                                if(is_array($reservations)){
                                    foreach ($reservations as $key => $value) {
                                        $times = DB::getInstance()->get('time', array('time_id', '=', $value->time_id));
                                        $time = $times->results();
                                            echo "<tr>";
                                            echo "<td>" . $value->date . "</td>" ;
                                            echo "<td>" . $time[0]->start . " - " . $time[0]->end . "</td>" ;
                                            echo "<td>" . $value->classroom . "." .$value->workplace_id . "</td>";
                                            echo "</tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>

                        <a class="btn waves-effect blue waves-light col s3 offset-s8" href="reservation.php" >Reserveren</a>

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
