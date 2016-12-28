<?php

require "functions.php";

// Render content
if (_f::is_user_logged_in()) {
    echo _f::render("profile", array(), true);
    die();
}

echo _f::render("login", array(), true);
die();
