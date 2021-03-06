<?php
/*
    Alle staande reserveringen ophalen + optie om reserveringen te verwijderen uit de database.
 */
require('core/init.php');

$user = new User();
$adminpanel = new Adminpanel();
$reserve = new Reserve();

if(!$user->hasPermission('admin')) {
    Redirect::to('index.php');
}
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
                    <div class="input-field col s12">
                         <form class="col s12" method="POST" autocomplete="off" action="">
                                <i class="mdi-action-search prefix"></i>
                                <input id="Search" type="text" class="validate">
                                <label for="Search">Zoek voor een naam, ov-nummer, lokaal of datum</label>
                                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
                        </form>
                    </div>

            </div>
        </div>
        <div class="row">
            <div class="grey lighten-4 post-index z-depth-2 col s12 m8 offset-m2">
                <h5 class="flow-text center" style="text-align:center;">
                    Reserveringen
                    <div class="line-separator red darken-4"></div>
                </h5>

                <div class="row">
                    <table class="centered paginated">
                        <thead>
                          <tr>
                                <th data-field="date" class="center">Ov-Nummer</th>
                                <th data-field="date" class="center">Voornaam</th>
                                <th data-field="date" class="center">Achternaam</th>
                                <th data-field="date" class="center">Datum</th>
                                <th data-field="time" class="center">Tijd</th>
                                <th data-field="workspace" class="center">Werkplek</th>
                                <th data-field="" class="center"></th>
                          </tr>
                        </thead>
                        <tbody id="table">
                            <?php
                            $display = $adminpanel->display();
                            if(is_array($display)){
                                foreach ($display as $key => $value) {
                                    $users = DB::getInstance()->get('users', array('id', '=', $value->ov));
                                    $user = $users->results();
                                    $times = DB::getInstance()->get('time', array('time_id', '=', $value->time_id));
                                    $time = $times->results();
                                    echo "<tr>" . PHP_EOL;
                                    echo "<td>" . $user[0]->id . "</td>" . PHP_EOL;
                                    echo "<td>" . $user[0]->firstname . "</td>" . PHP_EOL;
                                    echo "<td>" . $user[0]->lastname . "</td>" . PHP_EOL;
                                    echo "<td>" . $value->date . "</td>" . PHP_EOL;
                                    echo "<td>" . $time[0]->start . " - " . $time[0]->end . "</td>" . PHP_EOL;
                                    echo "<td>" . $value->classroom . "." .$value->workplace_id . "</td>". PHP_EOL;
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
                    <div class="row paginationbuttons">
                        <!--pagination buttons autogenerated met JS -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="resources/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="resources/js/materialize.min.js"></script>
    <script type="text/javascript" src="resources/js/pagination.js"></script>
    <script type="text/javascript" src="resources/js/filter.js"></script>
    <script type="text/javascript">
        $(".button-collapse").sideNav();

        $(".dropdown-button").dropdown();

        $('.btn').on('click', function( event ) {
            if(!confirm("Weet je zeker dat je deze gebruiker wilt verwijderen?")) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
