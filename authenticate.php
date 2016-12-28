<?php

require "functions.php";

$logout = _f::get('logout');
if (isset($logout)) {
    _f::logout();
    _f::redirect(SITE_URL);
    die();
}

if (_f::login(_f::post("username"), _f::post("password"))) {
    _f::redirect(SITE_URL . '#appointment');
} else {
    _f::redirect(SITE_URL . 'profile.php#login');
}

die();
