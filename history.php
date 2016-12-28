<?php

require "functions.php";

if (_f::is_user_logged_in()) {
    echo _f::render("history", array(), true);
    die();
}

echo _f::redirect(SITE_URL);
die();
