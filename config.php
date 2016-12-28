<?php

// Default user account
define('USERNAME', "John Doe");
define('PASSWORD', "ThisIsNotAPassword");

// Session keys
define('SESSION_KEY_IS_LOGGED_IN', 'can_access');
define('SESSION_KEY_USER', 'user');
define('SESSION_KEY_ERROR', 'error');
define('SESSION_KEY_ERROR_TIME', 'error_time');

// Pre-defined template keys
define('TPL_KEY_TITLE', 'title');
define('TPL_KEY_DESCRIPTION', 'description');

define('TPL_DIR', __DIR__ . '/views');

// Site config
// define('SITE_URL', "http://localhost/katalon-sample/"); // website URL with ended slash
define('SITE_URL', $_SERVER['SITE_URL']); // website URL with ended slash
define('SITE_NAME', "CURA Healthcare Service");
define('SITE_ADDRESS', "Atlanta 550 Pharr Road NE Suite 525<br>Atlanta, GA 30305");
define('SITE_TEL', "(678) 813-1KMS");
define('SITE_EMAIL', "info@katalon.com");
define('FOOTER_COPYRIGHT', "Copyright &copy; " . SITE_NAME . " " . date("Y"));

header("Cache-Control: no-cache");
session_start();
