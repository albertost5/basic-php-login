<?php session_start();


if (isset($_SESSION['user'])) {
    header('Location: controllers/home.php');
} else {
    header('Location: controllers/register.php');
}
