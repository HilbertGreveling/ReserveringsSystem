<!DOCTYPE html>
<html>
    <head>
            <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable = 0">
            <link rel="shortcut icon" href="resources/icon/favicon.ico">
            <link href="resources/css/materialize.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="resources/css/style.css">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <title>Reserveringssyteem</title>
    </head>
    <body class="grey lighten-3">

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
                <div class="col s12 m6 offset-m3 post-index">
                    <div class="widget-item z-depth-1">
                        <h4>
                            Profiel
                            <div class="line-separator margin-bottom-30 red darken-4">
                            </div>
                        </h4>
                        <div class="row">
                            <form class="col s12" method="POST" autocomplete="off" action="">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">account_box</i>
                                        <input disabled value="74676" id="disabled" type="text" class="validate">
                                        <label for="ov">Ov Nummer</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">email</i>
                                        <input disabled value="Jantje123@cursist.novecollege.nl" id="disabled" type="text" class="validate">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">face</i>
                                        <input id="firstname" name="firstname" type="text" class="validate">
                                        <label for="firstname">Voornaam </label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">face</i>
                                        <input id="lastname" name="lastname" type="text" class="validate">
                                        <label for="lastname">Achternaam</label>
                                    </div>
                                    <div class="row">
                                        <a class="btn waves-effect blue waves-light" href="registration.php" >Gegevens veranderen<i></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6 offset-m3 post-index">
                    <div class="widget-item z-depth-1">
                            <h5 class="flow-text center">
                                    Wachtwoord veranderen
                                    <div class="line-separator red darken-4"></div>
                            </h5>
                            <h6 class="center">Klik op de knop hieronder om het wachtwoord te veranderen.</h6>
                            <div class="row">
                                <a class="btn waves-effect blue waves-light m6" href="changepassword.php" >Wachtwoord veranderen</a>
                            </div>
                    </div>
            </div>
        </div>
        <script type="text/javascript" src="resources/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="resources/js/materialize.min.js"></script>
    </body>
</html>