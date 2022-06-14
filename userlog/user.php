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
    <title>User</title>
    <link rel="stylesheet" type="text/css" href="user.css">
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

<main>
    <!-- Checking if user is logged in and if he is the admin -->
    <?php if(isset($_SESSION['email']) && ($_SESSION['email']=='irfan@gmail.com' || $_SESSION['email']=='ismar@gmail.com' || $_SESSION['email']=='mirza@gmail.com')){
        ?>
        <section>
            <?php if($_SESSION['email']=='irfan@gmail.com'){
                ?>
                <img src="../assets/irfan.jpg" alt="irfan">
                <?php
            } else if($_SESSION['email']=='ismar@gmail.com'){
                ?>
                <img src="../assets/ismar.jpg" alt="ismar">
                <?php
            } else if($_SESSION['email']=='mirza@gmail.com'){
                ?>
                <img src="../assets/mirza.jpg" alt="mirza">
                <?php
            }?>
            <h3>Username: <br> <span><?php echo $_SESSION['Name']?></span></h3>
            <h3>E-mail: <br> <span><?php echo $_SESSION['email']?></span></h3>
            <h3>Phone number: <br> <span><?php echo $_SESSION['phone']?></span></h3>
        </section>
        <aside>
            <h1>Welcome <?= $_SESSION['Name']?></h1>
            <h3>Admin</h3>
            <section>
                <form action="user.php" method="post">
                        <input type="password" name="passwordold" placeholder="Enter old password">
                        <input type="password" name="passwordnew" placeholder="Enter new password">
                        <input type="submit" name="changepw" value="Update Password">
                </form>
                <form class="formup" action="user.php" method="post">
                        <input type="text" name="username" placeholder="Enter new username">
                        <input type="submit" name="changeus" value="Update">
                </form>
                <form class="formup" action="user.php" method="post">
                        <input type="text" name="number" placeholder="Enter new phone number">
                        <input type="submit" name="changenb" value="Update">
                </form>
                <?php include('../errors.php'); ?>
            </section>
        </aside>
        <?php
    } elseif(isset($_SESSION['email'])){
        ?>
        <section>
            <img src="../assets/traveler.jpg" alt="irfan" style="border: 2px solid mediumpurple !important;">
                <h3>Username: <br> <span style="color: mediumpurple !important;"><?php echo $_SESSION['Name']?></span></h3>
                <h3>E-mail: <br> <span style="color: mediumpurple !important;"><?php echo $_SESSION['email']?></span></h3>
                <h3>Phone number: <br> <span style="color: mediumpurple !important;"><?php echo $_SESSION['phone']?></span></h3>
        </section>
        <aside>
            <h1>Welcome <?= $_SESSION['Name']?></h1>
            <h3 style="color: mediumpurple !important;">User</h3>
            <section>
                <form action="user.php" method="post">
                    <input type="password" name="passwordold" placeholder="Enter old password">
                    <input type="password" name="passwordnew" placeholder="Enter new password">
                    <input type="submit" name="changepw" value="Update Password">
                </form>
                <form class="formup" action="user.php" method="post">
                    <input type="text" name="username" placeholder="Enter new username">
                    <input type="submit" name="changeus" value="Update">
                </form>
                <form class="formup" action="user.php" method="post">
                    <input type="text" name="number" placeholder="Enter new phone number">
                    <input type="submit" name="changenb" value="Update">
                </form>
                <?php include('../errors.php'); ?>
            </section>
        </aside>
        <?php
    } elseif (!isset($_SESSION['email'])){ ?>
        <h1 style="font-family: 'Fjalla One', sans-serif; letter-spacing: 2px">PLEASE RETURN TO THE MAIN PAGE!</h1>
    <?php
    }
    ?>
</main>

<!-- Showing the tickets of user -->
<div class="tickets">
    <h1>Your tickets</h1>
<?php
$db = mysqli_connect('localhost', 'root', '', 'imi_travel');
$id=$_SESSION['id'];
$search = mysqli_query($db, "SELECT * FROM ticket t, route r where t.Rout_ID=r.Rout_ID and t.User_ID=".$id);

while($row = mysqli_fetch_assoc($search)){
    ?>
        <table>
            <tr>
                <th>Starting Destination</th>
                <th>Final Destination</th>
                <th>Price</th>
                <th>Cancel Order</th>
            </tr>
            <tr>
                <td><?php echo $row['Start']?></td>
                <td><?php echo $row['Finish']?></td>
                <td><?php echo $row['Price']?> KM</td>
                <td><a href="../routes/Delete.php?id=<?= $row['Rout_ID']?>">Cancel</a></td>
            </tr>
        </table>
    <?php
}
?>
</div>

<!-- Logout button -->
<div class="wrapper">
    <a href="logout.php">Log out</a>
</div>

<!-- Footer import -->
<?php
include ('../../PRODŽEKT/headfoot/footer.php');
?>

</body>
</html>
