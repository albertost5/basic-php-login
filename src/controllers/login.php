<?php session_start();

require('../../functions/session.php');

checkSession();

$errors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user = filter_var(strtolower($_POST['username']), FILTER_SANITIZE_STRING);
    $pw = $_POST['password'];
    $pw = hash('sha512', $pw);

    // db
    $userdb = 'root';
    $pwdb = '';
    $dbName = 'test_login';
    $dsn = "mysql:hoost=localhost;dbname=$dbName";

    try {
        $connection = new PDO($dsn, $userdb, $pwdb);
    } catch (PDOException $err) {
        echo "Error: " . $err->getMessage();
    }

    $statement = $connection->prepare('SELECT * FROM user WHERE username = :username AND pw = :password');
    $statement->execute(array(':username' => $user, 'password' => $pw));
    $rdo = $statement->fetch();

    if ($rdo != false) {
        $_SESSION['user'] = $user;
        header('Location: ../index.php');
    } else {
        array_push($errors, 'Invalid credentials');
    }
}

require('../views/login.view.php');
