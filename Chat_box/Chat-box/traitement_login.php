<?php
include "conn.php";

session_start();
if (isset($_SESSION['username'])) {
    header('Location:comment/index.php'); //redirect to dashborde
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //assign Variables
    $Ussername =  filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password =  filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $hashePass = sha1($password);
    $stmt = $con->prepare("SELECT username, password FROM users WHERE `username` = ? AND `password` = ?");
    $stmt->execute(array($Ussername, $hashePass));
    $count = $stmt->rowCount();
    if ($count > 0) {
        $_SESSION['username'] = $Ussername;
        header('Location: comment/index.php'); //redirect to dashborde
        exit();
    } else {
        echo 'error:';
    }
}