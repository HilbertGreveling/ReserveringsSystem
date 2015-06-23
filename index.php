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



    <ul id="navdropdown" class="dropdown-content red lighten-4">
        <li><a href="index.php">Overzicht</a>
        <li><a href="profile.php">Profiel</a></li>
        <li><a href="editprofile.php">Bewerk Profiel</a></li>
        <li class="divider"></li>
        <li><a href="logout.php">Afmelden</a></li>
    </ul>

    <!-- Navigation bar -->
    <nav>
        <div class="nav-wrapper blue lighten-1">
            <div class="container">
                <a href="index.php" class="brand-logo" style="margin-left:10px;">TRS</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

                <ul class="right hide-on-med-and-down">
                    <li><a href="#">Reserveren</a></li>
                    <li><a href="#">Reserveringen</a></li>


                </ul>
                <ul class="side-nav" id="mobile-demo">

                    <li><a href="#">Reserveren</a></li>
                    <li><a href="#">Reserveringen</a></li>

                </ul>
            </div>
        </div>
        <!-- Navigation bar end -->
    </nav>

    <!-- Genereer reserveringlijst voor gebruikers -->
    <div class="container">
        <table>
            <thead>
              <tr>
                  <th data-field="id" class="center">Name</th>
                  <th data-field="name" class="center">Item Name</th>
                  <th data-field="price" class="center">Item Price</th>
              </tr>
            </thead>

        </table>
    </div>
    <script type="text/javascript" src="resources/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="resources/js/materialize.min.js"></script>

    <script type="text/javascript">
        $(".button-collapse").sideNav();

        $(".dropdown-button").dropdown();

    </script>
</body>
</html>

