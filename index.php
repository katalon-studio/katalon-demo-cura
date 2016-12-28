<?php

require "functions.php";

// Render content
if (_f::is_user_logged_in()) {
    echo _f::render("appointment", array(), true);
    die();
}

//_redirect("profile.php");
echo _f::render("template", array());
die();
