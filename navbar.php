    <nav class="navbar navbar-inverse" style="margin-bottom: 0px">
        <div class="container-fluid">
            <div class="navbar-header" style="margin-right: 63px;">
                <a class="navbar-brand" href="index.php?side=forside"><img src="sitelogo.png" width="180px" style="margin-right: -60px;"></a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index.php?side=blackjack"><img width="50px" src="blackjacklogo.png"></a></li>
                <li><a href="#">Kommer snart!</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (is_user_logged_in()) {
                    echo '<li><a href="index.php?side=logout"><span class="glyphicon glyphicon-user"></span> Log Ud</a></li>';
				} else {
                    echo '<li><a href="index.php?side=register"><span class="glyphicon glyphicon-user"></span> Registrer Dig</a></li>';
				};
                ?>
                <?php if (!(is_user_logged_in())) { echo '<li><a href="index.php?side=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>'; } else { } ?>
            </ul>
        </div>
    </nav>