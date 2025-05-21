<?php

function GetCurrentPage ($page_name) {
    $current_page = basename($_SERVER['PHP_SELF']);
    return  ($current_page === $page_name)? "active" : "";
}

function GetPageClass () {
    return basename($_SERVER['PHP_SELF'] , '.php');
}

function UserExists ($conn,$username) {
    $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;

}

?>

