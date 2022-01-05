<?php session_start();

require('../../functions/session.php');

checkSession();

// $_POST['name']

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = filter_var(strtolower($_POST['username']), FILTER_SANITIZE_STRING);
    $password = $_POST['passwordA'];
    $passwordB = $_POST['passwordB'];

    $errors = array();

    if (empty($user)) {
        array_push($errors, "The username can not be empty...");
    }
    if (empty($password || $passwordB)) {
        array_push($errors, "The password can not be empty...");
    }
    if ($password !== $passwordB) {
        array_push($errors, "The password should match...");
    }

    // connection to the db
    $userdb = 'root';
    $pwdb = '';
    $dbName = 'test_login';
    $dsn = "mysql:hoost=localhost;dbname=$dbName";

    if (empty($errors)) {
        try {
            $connection = new PDO($dsn, $userdb, $pwdb);
        } catch (PDOException $err) {
            echo "Error: " . $err->getMessage();
        }

        $findUser = $connection->prepare('SELECT * FROM user WHERE username = :user LIMIT 1');
        $findUser->execute(array(':user' => $user));
        $findUser = $findUser->fetch();
        // Get the statement or false if it doens't match

        if ($findUser != false) {
            array_push($errors, 'The username is already taken.');
        } else {
            $password = hash('sha512', $password);

            $userInserted = $connection->prepare('INSERT INTO user (id, username, pw) VALUES (null, :user, :pw)');
            $userInserted->execute(array(':user' => $user, ':pw' => $password));

            header('Location: login.php');
        }
    }
}

require('../views/register.view.php');
