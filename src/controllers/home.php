<?php session_start();

if (isset($_SESSION['user'])) {
    require('../views/home.view.php');
} else {
    header('Location: login.php');
}
