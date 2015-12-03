<?php
/*
    Query om reserveringen op te halen reserveringen voor huidige datum
    Optie om verlopen reserveringen te verwijderen / alle verlopen reserveringen te verwijderen?
 */
require('core/init.php');

$user = new User();
$reserve = new Reserve();

if(!$user->isLoggedIn()){
    Redirect::to( 'login.php');
}

if(Input::get("id") !== null && is_numeric(Input::get("id"))){
    $reserve->delete(Input::get("id"));
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

<!-- Include Menu balk-->
<?php
include 'includes/menu.php';
?>

    <!-- Genereer reserveringlijst voor gebruikers -->
    <div class="container">
        <div class="row">
            <div class="grey lighten-4 post-index z-depth-2 col s12 m8 offset-m2">
                <h5 class="flow-text" style="text-align:center;">
                    Verlopen reserveringen
                    <div class="line-separator red darken-4"></div>
                </h5>
                <div class="row">
                    <table class="centered paginated">
                        <thead>
                          <tr>
                              <th data-field="date" class="center">Datum</th>
                              <th data-field="time" class="center">Tijd</th>
                              <th data-field="workplace" class="center">Werkplek</th>
                              <th data-field="delete" class="center"></th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php

                                $reservations = $reserve->fetch($user->data()->id, "expired");
                                if(is_array($reservations)){
                                    foreach ($reservations as $key => $value) {
                                        $date = date_create($value->date);
                                        $times = DB::getInstance()->get('time', array('time_id', '=', $value->time_id));
                                        $time = $times->results();
                                            echo "<tr>";
                                            echo "<td>" . date_format($date, 'd/m/Y') . "</td>" ;
                                            echo "<td>" . $time[0]->start . " - " . $time[0]->end . "</td>" ;
                                            echo "<td>" . $value->classroom . "." .$value->workplace_id . "</td>";
                                            ?>
                                                <td>
                                                    <form action="" method="post" >
                                                        <input name="id" type="hidden" value="<?php echo $value->id; ?>">
                                                        <button id="deleteBtn" class="btn waves-effect waves-light" type="submit" name="action">
                                                            <i class="material-icons">delete</i>
                                                        </button>
                                                    </form>
                                                </td>
                                            <?php
                                            echo "</tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
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
