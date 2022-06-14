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
    <title>Register</title>
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
        <h1>Register</h1>
        <form action="register.php" method="post">
            <?php include('../errors.php'); ?>
            <input type="text" name="Name" placeholder="Name" value="<?php echo $username; ?>">
            <input type="email" name="Email" placeholder="Email" value="<?php echo $email; ?>">
            <input type="text" name="ContactNumber" placeholder="Contact Number" value="<?php echo $contactnumber; ?>">
            <input type="password" name="password_1" placeholder="Password">
            <input type="password" name="password_2" placeholder="Confirm Password">
            <input type="submit" name="reg_user" value="Register">
            <p>
                Already a member? <a href="login.php">Log in</a>
            </p>
        </form>
    </div>

<!-- Footer import -->
<?php
include ('../../PRODŽEKT/headfoot/footer.php');
?>

</body>
</html>
