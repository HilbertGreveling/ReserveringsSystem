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

<!-- Include Menu balk-->
<?php
include 'includes/menu.php';
?>

    <!-- Genereer reserveringlijst voor gebruikers -->
    <div class="container">
        <div class="row">
            <div class="grey lighten-4 post-index z-depth-2 col s12 m8 offset-m2">
                <h5 class="flow-text" style="text-align:center;">
                    Komende reserveringen
                    <div class="line-separator red darken-4"></div>
                </h5>
                <div class="row">
                    <table class="centered paginated">
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
                                        $date = date_create($value->date);
                                        $times = DB::getInstance()->get('time', array('time_id', '=', $value->time_id));
                                        $time = $times->results();
                                            echo "<tr>";
                                            echo "<td>" . date_format($date, 'd/m/Y') . "</td>" ;
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
    <script type="text/javascript" src="resources/js/pagination.js"></script>
    
    <script type="text/javascript">
        $(".button-collapse").sideNav();

        $(".dropdown-button").dropdown();

    </script>
</body>
</html>
