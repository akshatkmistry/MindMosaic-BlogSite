<?php
session_start();
define("ROOT_URL", "http://localhost/webproject/");
define('DB_HOST', 'localhost:3308');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'blogsite');
if (!isset($_SESSION['user-id'])) {
    header("location: " . ROOT_URL . "logout.php");
    //destroy all sessions and redirect user to login page
    session_destroy();
    die();
    header("location: " . ROOT_URL . "signin.php");
}