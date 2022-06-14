<?php
require ('server.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="../headfoot/header.css">
    <link rel="stylesheet" href="../headfoot/footer.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
</head>
<body>

<!-- Header import -->
<?php
include ('../../PRODŽEKT/headfoot/header.php');
?>
    <div class="loginwrap">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <?php include('../errors.php'); ?>
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="login_user" value="Log in">
            <p>
                Not yet a member? <a href="register.php">Sign up</a>
            </p>
        </form>
    </div>

<!-- Footer import -->
<?php
include ('../../PRODŽEKT/headfoot/footer.php');
?>

</body>
</html>