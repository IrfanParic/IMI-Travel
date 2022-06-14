<?php
session_start();
// Turning off the session and logging off
$_SESSION = array();
header('Location: ../index.php');


