<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <title>LOG IN</title>
</head>

<body>
    <div class="container">
        <h1 class="title">LOG IN</h1>
        <hr class="border">

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="custom-form" name="login">
            <div class="form-group">
                <i class="left icon fa fa-user"></i><input type="text" name="username" id="username" class="username" placeholder="Type your username...">
            </div>
            <div class="form-group">
                <i class="left icon fa fa-lock"></i><input type="password" name="password" id="password" class="password_btn" placeholder="Type your password...">
                <i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
            </div>
            <ul>
                <?php if ($errors) {
                    foreach ($errors as $err) {
                        echo "<li>$err</li>";
                    }
                }
                ?>
            </ul>
        </form>

        <p class="text-register">
            Do not have an account yet?
            <a href="register.php">Register</a>
        </p>
    </div>
</body>

</html>