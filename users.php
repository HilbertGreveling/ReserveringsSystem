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
if(Input::get("username") !== null){
    $user->delete(Input::get("id"));
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
            <div class="grey lighten-4 post-index z-depth-2 col s12 m10 offset-m1">
                    <div class="input-field col s12">
                         <form class="col s12" method="POST" autocomplete="off" action="">
                                <i class="mdi-action-search prefix"></i>
                                <input id="Search" type="text" class="validate">
                                <label for="Search">Zoek voor een naam of ov-nummer</label>
                                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
                        </form>
                    </div>

            </div>
        </div>
        <div class="row">
            <div class="grey lighten-4 post-index z-depth-2 col s12 m10 offset-m1">
                <h5 class="flow-text center" style="text-align:center;">
                    Gebruikers
                    <div class="line-separator red darken-4"></div>
                </h5>

                <div class="row">
                    <table class="centered paginated">
                        <thead>
                          <tr>
                                <th data-field="ov" class="center" scope="col">Ov-Nummer</th>
                                <th data-field="firstname" class="center" scope="col">Voornaam</th>
                                <th data-field="lastname" class="center" scope="col">Achternaam</th>
                                <th data-field="email" class="center" scope="col">E-mail</th>
                                <th data-field="permissions" class="center" >Permissie</th>
                                <th data-field="" class="center"></th>
                          </tr>
                        </thead>
                        <tbody id="table" >
                            <?php
                            $userdisplay = $adminpanel->userdisplay();
                            if(is_array($userdisplay)){
                                foreach ($userdisplay as $key => $value) {
                                    echo "<tr>" . PHP_EOL;
                                    echo "<td>" . $value->id . "</td>" . PHP_EOL;
                                    echo "<td>" . $value->firstname . "</td>" . PHP_EOL;
                                    echo "<td>" . $value->lastname . "</td>" . PHP_EOL;
                                    echo "<td>" . $value->email . "</td>" . PHP_EOL;
                                    echo "<td>" . $value->group . "</td>" . PHP_EOL;
                                    ?>
                                       <td>
                                           <form action="" method="post" >
                                               <input name="id" type="hidden" value="<?php echo $value->id; ?>">
                                               <button class="btn waves-effect waves-light" type="submit" name="action">
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
                    <div class="line-separator grey lighten-1"></div>
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
