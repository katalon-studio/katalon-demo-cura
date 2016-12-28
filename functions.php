<?php

require 'config.php';
require 'underscore.php';

class _f extends __{
    public function render($page_name, $data = array(), $include_main_template = false) {
        if (!self::isArray($data)) {
            die("Invalid data type input! Data must be an array of keys and values.");
        }

        if (!self::isBoolean($include_main_template)) {
            die("Invalid argument!");
        }

        if (!array_key_exists(TPL_KEY_TITLE, $data)) {
            $data = array_merge($data, array(TPL_KEY_TITLE => SITE_NAME));
        }

        if (!array_key_exists(TPL_KEY_DESCRIPTION, $data)) {
            $data = array_merge($data, array(TPL_KEY_DESCRIPTION => SITE_NAME.'; '.SITE_TEL));
        }

        if ($include_main_template === true) {
            $main_tpl_loc = TPL_DIR . '/page_template.php';
            $main_tpl = file_get_contents($main_tpl_loc);
            return self::template($main_tpl, array_merge($data, array('page' => self::render($page_name, $data))));
        } else {
            $tpl_loc = TPL_DIR . '/page_' . $page_name . '.php';
            if (!file_exists($tpl_loc)) {
                die("Template file does not exist: " . $tpl_loc);
            }
            $tpl = file_get_contents($tpl_loc);
            return self::template($tpl, $data);
        }
    }

    public function is_user_logged_in(){
        return isset($_SESSION[SESSION_KEY_IS_LOGGED_IN]) && $_SESSION[SESSION_KEY_IS_LOGGED_IN] === true;
    }

    public function login($user, $password){
        if (self::is_user_logged_in()) {
            return true;
        }

        if ($user === USERNAME && $password === PASSWORD) {
            $_SESSION[SESSION_KEY_IS_LOGGED_IN] = true;
            $_SESSION[SESSION_KEY_USER] = $user;
            unset($_SESSION[SESSION_KEY_ERROR]);
            return true;
        }

        $_SESSION[SESSION_KEY_ERROR] = "Login failed! Please ensure the username and password are valid.";
        $_SESSION[SESSION_KEY_ERROR_TIME] = time() + 2; // Error message is valid in 2 seconds

        return false;
    }

    public function logout(){
        session_unset();
        return session_destroy();
    }

    // Get HTTP GET value
    public function get($param = '') {
        if (!self::isString($param)) {
            return null;
        }
        return $_GET[$param];
    }

    // Get HTTP POST value
    public function post($param = '') {
        if (!self::isString($param)) {
            return null;
        }
        return $_POST[$param];
    }

    public function getError() {
        $current = time();
        $error_time = $_SESSION[SESSION_KEY_ERROR_TIME];
        if (!isset($error_time) || $error_time === null) {
            $error_time = 0;
        }

        if ($error_time < $current) {
            $_SESSION[SESSION_KEY_ERROR] = null;
        }

        return $_SESSION[SESSION_KEY_ERROR];
    }

    public function redirect($url) {
        header('Location: ' . $url);
    }
}

