<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "login_app";
$conn = mysqli_connect($host, $username, $password,$dbname);
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

function check_query( $result){
    if(!$result){
        return "Erorr:" . mysqli_error($conn);
    }
    return true;
}





