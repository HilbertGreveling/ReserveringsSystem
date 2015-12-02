
       <ul id="navdropdown" class="dropdown-content cyan lighten-3">
            <li><a href="index.php">Overzicht</a>
                <li><a href="history.php">Verlopen reserveringen</a></li>
                <li><a href="profile.php">Bewerk Profiel</a></li>
                <?php
                if($user->hasPermission('admin')) {
                    ?><li><a href="admin.php">Admin Panel</a></li>
                    <li><a href="users.php">Gebruikers</a></li>
                    <?php
                }
                ?>
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
                            <li><a href="index.php">Overzicht</a></li>
                            <li><a href="history.php">Verlopen reserveringen</a></li>
                            <li><a href="profile.php">Bewerk Profiel</a></li>
                            <?php
                            if($user->hasPermission('admin')) {
                                ?><li><a href="admin.php">Admin Panel</a></li>
                                <li><a href="users.php">Gebruikers</a></li>
                                <?php
                            }
                            ?>
                            <li class="divider"></li>
                            <li><a href="logout.php">Afmelden</a></li>


                        </ul>
                    </div>
                </div>
                <!-- Navigation bar end -->
            </nav>
