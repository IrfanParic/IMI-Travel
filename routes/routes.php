<?php
require('../userlog/server.php');
$db = mysqli_connect('localhost', 'root', '', 'imi_travel');

if (isset($_POST['add'])){

    $startinput = mysqli_real_escape_string($db, $_POST['startinput']);
    $finishinput = mysqli_real_escape_string($db, $_POST['finishinput']);
    $priceinput = mysqli_real_escape_string($db, $_POST['priceinput']);
    $timeinput = mysqli_real_escape_string($db, $_POST['timeinput']);

    mysqli_query($db, "INSERT INTO route (Start, Finish, Price, Start_Time) values ('$startinput','$finishinput','$priceinput','$timeinput')");
}

$query = mysqli_query($db, "select * from route");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IMI Travel</title>
    <link rel="stylesheet" href="routes.css">
    <link rel="stylesheet" href="../headfoot/header.css">
    <link rel="stylesheet" href="../headfoot/footer.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>

<!-- Header import -->
<?php
include ('../headfoot/header.php');
?>

<main>
<section class="top">
    <!-- Checking if user is logged in (if session is started)-->
    <?php if(!isset($_SESSION['email'])){?> <h1 style="font-family: 'Fjalla One', sans-serif; letter-spacing: 2px; text-align: center; padding-top: 50px">PLEASE RETURN TO THE MAIN PAGE!</h1><?php }else{ ?>
    <img src="worldmap.jpg" alt="worldmap">
    <div class="content">
        <form action="routes.php" method="post">
            <h3>Select your destination</h3>
                <div>
                    <table>
                        <tr>
                            <th>Starting Destination</th>
                            <th>Final Destination</th>
                            <th>Price</th>
                            <th>Place Order</th>
                        </tr>
                        <?php
                        while($row = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td><?php echo $row['Start']?></td>
                            <td><?php echo $row['Finish']?></td>
                            <td><?php echo $row['Price']?> KM</td>
                            <td style="display: flex; width: 100%; justify-content: space-evenly"><a style="width: 100%;" href="Confirm.php?id=<?= $row['Rout_ID']?>">Select</a>
                            <?php
                            // Checking if user is logged in and if he is the admin
                            if(isset($_SESSION['email']) && ($_SESSION['email']=='irfan@gmail.com' || $_SESSION['email']=='ismar@gmail.com' || $_SESSION['email']=='mirza@gmail.com')){
                                ?>
                                <a style="width: 100%;" href="Remove.php?id=<?= $row['Rout_ID']?>">Remove</a>
                                <?php
                            }
                            ?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
        </form>
    </div>
</section>
    <?php }?>

    <?php
        // Checking if user is logged in and if he is the admin
        if(isset($_SESSION['email']) && ($_SESSION['email']=='irfan@gmail.com' || $_SESSION['email']=='ismar@gmail.com' || $_SESSION['email']=='mirza@gmail.com')){
            ?>
            <div class="bottom">
                <h3>Add new routes</h3>
                <form action="" method="post">
                    <input type="text" name="startinput" placeholder="Starting destination">
                    <input type="text" name="finishinput" placeholder="Final destination">
                    <input type="text" name="priceinput" placeholder="Price">
                    <input type="datetime-local" name="timeinput" placeholder="year-month-dayT00:00">
                    <input type="submit" name="add" value="Add to routes">
                </form>
            </div>
            <?php
        }
    ?>
</main>

<!-- Footer import -->
<?php
include ('../headfoot/footer.php');
?>

</body>
</html>

