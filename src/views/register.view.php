<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <title>SIGN UP</title>
</head>

<body>
    <div class="container">
        <h1 class="title">SIGN UP</h1>
        <hr class="border">

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="custom-form" name="register">
            <div class="form-group">
                <i class="left icon fa fa-user"></i><input type="text" name="username" id="username" class="username" placeholder="Type your username...">
            </div>
            <div class="form-group">
                <i class="left icon fa fa-lock"></i><input type="password" name="passwordA" id="passwordA" class="password" placeholder="Type your password...">
            </div>
            <div class="form-group">
                <i class="left icon fa fa-lock"></i><input type="password" name="passwordB" id="passwordB" class="password_btn" placeholder="Repeat your password...">
                <i class="submit-btn fa fa-arrow-right" onclick="register.submit()"></i>
            </div>
            <?php if (!empty($errors)) : ?>
                <div class="error">
                    <ul>
                        <?php foreach ($errors as $err)
                            echo "<li>$err</li>";
                        ?>
                    </ul>
                </div>
            <?php endif; ?>

        </form>

        <p class="text-register">
            Do you have an account?
            <a href="login.php">Log in</a>
        </p>
    </div>
</body>

</html>