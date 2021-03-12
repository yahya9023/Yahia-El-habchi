<?php
include "conn.php";

/* if (isset($_POST['singup'])) {
    if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['repeat_password'])) {
        $user = $_POST['username'];
        $email =  $_POST['email'];
        $pass =  $_POST['password'];
        $pass_rep =  $_POST['repeat_password'];
        $query = "INSERT INTO `users`(`username`, `email` , `password` , `repeat_password`)
            VALUES('$user' , '$email' , '$pass' , '$pass_rep')";
        $result = mysqli_query($con, $query);
        header('Location:index.php');
    } else {
        header('Location: index.php');
        }
}*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_repeat = $_POST['repeat_password'];
    $stmt = $con->prepare("INSERT INTO `users` (`username`, `email` , `password` , `repeat_password`) 
    VALUES ('$username','$email','$password','$password_repeat')");
    $stmt->execute();
    header('Location:index.php');
} else {
    header('Location: index.php');
}