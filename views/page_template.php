<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<%= $description %>">

    <title><%= $title %></title>

    <!-- Bootstrap Core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo SITE_URL; ?>/css/theme.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- Navigation -->
<a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
<nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
        <li class="sidebar-brand">
            <a href="./" onclick="$('#menu-close').click();">CURA Healthcare</a>
        </li>
        <li>
            <a href="./" onclick="$('#menu-close').click();">Home</a>
        </li>
        <?php if (_f::is_user_logged_in()) : ?>
        <li>
            <a href="history.php#history" onclick="$('#menu-close').click();">History</a>
        </li>
        <li>
            <a href="profile.php#profile" onclick="$('#menu-close').click();">Profile</a>
        </li>
        <li>
            <a href="authenticate.php?logout" onclick="$('#menu-close').click();">Logout</a>
        </li>
        <?php else: ?>
        <li>
            <a href="profile.php#login" onclick="$('#menu-close').click();">Login</a>
        </li>
        <?php endif; ?>
    </ul>
</nav>

<!-- Header -->
<header id="top" class="header">
    <div class="text-vertical-center">
        <h1><?php echo SITE_NAME; ?></h1>
        <h3>We Care About Your Health</h3>
        <br>
        <a id="btn-make-appointment" href="<?php echo _f::is_user_logged_in() ? "./index.php#appointment": "./profile.php#login"; ?>" class="btn btn-dark btn-lg">Make Appointment</a>
    </div>
</header>

<%= $page %>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <h4><strong><?php echo SITE_NAME; ?></strong>
                </h4>
                <p><?php echo SITE_ADDRESS; ?></p>
                <ul class="list-unstyled">
                    <li><i class="fa fa-phone fa-fw"></i> <?php echo SITE_TEL; ?></li>
                    <li><i class="fa fa-envelope-o fa-fw"></i> <a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a>
                    </li>
                </ul>
                <br>
                <ul class="list-inline">
                    <li>
                        <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                    </li>
                </ul>
                <hr class="small">
                <p class="text-muted"><?php echo FOOTER_COPYRIGHT; ?></p>
            </div>
        </div>
    </div>
    <a id="to-top" href="#top" class="btn btn-dark btn-lg"><i class="fa fa-chevron-up fa-fw fa-1x"></i></a>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo SITE_URL; ?>/js/theme.js"></script>

</body>
</html>

