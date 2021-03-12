<?php
$con = mysqli_connect('localhost',  'root',  '',  'sing_up');
if (mysqli_connect_errno()) {
    echo 'erreur de connexion : ' . mysqli_connect_error();
    die();
}