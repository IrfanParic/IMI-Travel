<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'imi_travel');

$id = $_GET['id'];
$query = mysqli_query($db, "select * from route where Rout_ID=".$id);
$row = mysqli_fetch_assoc($query);

$price=$row['Price'];
$sessionid=$_SESSION['id'];
$routid=$row['Rout_ID'];

if(isset($_POST['submit'])){
    mysqli_query($db, "INSERT INTO ticket (Price, User_ID, Rout_ID) VALUES ('$price', '$sessionid', '$routid')");
    header('location: routes.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="ConfirmDelete.css">
    <link rel="stylesheet" href="../headfoot/header.css">
    <link rel="stylesheet" href="../headfoot/footer.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Confirmation</title>
</head>
<body>

<!-- Header import -->
<?php
include ('../headfoot/header.php');
?>

<main>
    <div class="top">
        <!-- Checking if user is logged in (if session is started)-->
        <?php if(!isset($_SESSION['email'])){?> <h1 style="font-family: 'Fjalla One', sans-serif; letter-spacing: 2px; text-align: center; padding-top: 50px">PLEASE RETURN TO THE MAIN PAGE!</h1><?php }else{ ?>
        <img class="worldmapleft" src="worldmapleft.jpg" alt="left">
        <div class="ticketcontent">
            <h1 style="color: green">Confirm your ticket</h1>
            <form action="" method="post">
                <div>
                    <h3> <?= $row['Start']?> to <?= $row['Finish']?> for <?= $row['Price']?> KM </h3>
                </div>
                <input type="submit" name="submit" value="Confirm">
            </form>
        </div>
        <img class="worldmapright" src="worldmapright.jpg" alt="right">
        <?php }?>
    </div>
</main>

<!-- Footer import -->
<?php
include ('../headfoot/footer.php');
?>

</body>
</html>
