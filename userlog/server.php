<?php
session_start();

$username = "";
$email = "";
$contactnumber = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'imi_travel');

// REGISTER USER
if (isset($_POST['reg_user'])) {

    $username = mysqli_real_escape_string($db, $_POST['Name']);
    $email = mysqli_real_escape_string($db, $_POST['Email']);
    $contactnumber = mysqli_real_escape_string($db, $_POST['ContactNumber']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    if (empty($username)) {
        array_push($errors, "Username is required!");
    }
    if (empty($email)) {
        array_push($errors, "Email is required!");
    }
    if (empty($contactnumber)){
        array_push($errors, "Contact is required!");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required!");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match!");
    }

    $user_check_query = "SELECT * FROM user WHERE Name='$username' OR Email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['Name'] === $username) {
            array_push($errors, "Username already exists!");
        }

        if ($user['Email'] === $email) {
            array_push($errors, "Email already exists!");
        }
    }

    //Register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //Password encryption
        $query = "INSERT INTO `user` (`Name`, `Email`, `Phone_number`, `Password`) 
  			  VALUES('$username', '$email', '$contactnumber','$password')";
        mysqli_query($db, $query);
        header('location: login.php');
    }
}

//User login
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is required!");
    }
    if (empty($password)) {
        array_push($errors, "Password is required!");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE Email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($results);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['id'] = $row['User_ID'];
            $_SESSION['Name'] = $row['Name'];
            $_SESSION['Password'] = $row['Password'];
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $row['Phone_number'];
            header('location: ../index.php');
        }else {
            array_push($errors, "Wrong email/password combination!");
        }
    }
}


//Update password
if (isset($_POST['changepw'])) {

    $passwordold = mysqli_real_escape_string($db, $_POST['passwordold']);
    $passwordnew = mysqli_real_escape_string($db, $_POST['passwordnew']);

    if (count($errors) == 0) {
        $passwordold = md5($passwordold);
        $passwordnew = md5($passwordnew);

        if ((empty(mysqli_real_escape_string($db, $_POST['passwordold']))) || empty(mysqli_real_escape_string($db, $_POST['passwordnew']))) {
            array_push($errors, "Password is required!");
        }
        elseif ($passwordold != $_SESSION['Password']) {
            array_push($errors, "Wrong password!");
        }
        elseif ($passwordold == $_SESSION['Password']) {
            $email1= $_SESSION['email'];
            mysqli_query($db, "UPDATE user SET Password='$passwordnew' WHERE Email='$email1'");
            $_SESSION['Password']=$passwordnew;
        }
    }
}

//Update username
if (isset($_POST['changeus'])){
    $username =  mysqli_real_escape_string($db, $_POST['username']);

    if (count($errors) == 0) {
        if (empty($username)) {
            array_push($errors, "Username is required!");
        } else {
            $email1= $_SESSION['email'];
            mysqli_query($db, "UPDATE user SET Name='$username' WHERE Email='$email1'");
            $_SESSION['Name'] = $username;
        }
    }
}

//Update phonenumber
if (isset($_POST['changenb'])){
    $phonenumber = mysqli_real_escape_string($db, $_POST['number']);

    if (count($errors) == 0) {
        if (empty($phonenumber)) {
            array_push($errors, "Phone number is required!");
        } else {
            $email1= $_SESSION['email'];
            mysqli_query($db, "UPDATE user SET Phone_number='$phonenumber' WHERE Email='$email1'");
            $_SESSION['phone'] = $phonenumber;
        }
    }
}

?>

