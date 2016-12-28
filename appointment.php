<?php

require "functions.php";

if (sizeof($_POST) <= 0) {
    _f::redirect(SITE_URL);
    die();
}

$keys_diff = array_diff_key($_POST, array("facility" => "", "hospital_readmission" => "", "programs" => "", "visit_date" => "", "comment" => ""));
if (sizeof($keys_diff) != 0) {
    echo _f::render("invalid_appointment", array(), true);
    die();
}

if (_f::post('hospital_readmission') === null) {
    $_POST['hospital_readmission'] = "No";
}

if ($_SESSION['history'] === null) {
    $_SESSION['history'] = array();
}

array_push($_SESSION['history'], $_POST);

echo _f::render("view_appointment", $_POST, true);
die();
