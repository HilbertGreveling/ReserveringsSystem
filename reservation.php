
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
        <li><a href="index.php">Home</a>
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Reserveren</a></li>
                    <li><a href="#">Reserveringen</a></li>
                    <li><a href="#">Profiel</a></li>
                </ul>

                <ul class="side-nav" id="mobile-demo">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Reserveren</a></li>
                    <li><a href="#">Reserveringen</a></li>
                    <li><a href="#">Profiel</a></li>
                </ul>
            </div>
        </div>
        <!-- Navigation bar end -->
    </nav>
    <div class="container">
        <div class="row">
            <form class="col s12 m6 offset-m3" autocomplete="off" action="" method="post">
                <div class="row grey lighten-3 post-index z-depth-2">
                    <h5 class="flow-text" style="text-align:center;">
                        Profile
                        <div class="line-separator red darken-4"></div>
                    </h5>

                    <div class="input-field col s10 offset-s1">
                        <input id="name" name="name" type="text" class="validate" value="<?php echo escape($user->data()->name); ?>">
                        <label for="name">Name</label>
                    </div>

                    <div class="input-field col s10 offset-s1">
                        <input id="email" name='email' type="email" class="validate" value="<?php echo escape($user->data()->email); ?>">
                        <label for="email">Email</label>
                    </div>

                    <div class="input-field col s10 offset-s1">
                        <input id="location" name="location" type="text" class="validate" value="<?php echo escape($user->data()->location); ?>">
                        <label for="location">Location</label>
                    </div>


                    <div class="input-field col s10 offset-s1">
                        <textarea id="summary" name="summary" class="materialize-textarea"><?php echo escape($user->data()->summary);?></textarea>
                        <label for="summary">Summary</label>
                    </div>

                    <div class="col s10 offset-s1">
                        <button class="btn waves-effect red waves-light lighten-1 col s6 offset-s3" type="submit">Edit profile<i class="mdi-action-input right"></i></button>
                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    </div>
                </div>
            </form>
        </div>



<input type="date" class="datepicker">

    </div>
    <script type="text/javascript" src="resources/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="resources/js/materialize.min.js"></script>

    <script type="text/javascript">
        $(".button-collapse").sideNav();

        $(".dropdown-button").dropdown();

         $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
          });
    </script>
</body>
</html>