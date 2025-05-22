<?php

$conn = mysqli_connect("localhost", "root", "","login_app");

function check_query( $result)
{

    if(!$result){
        return "Erorr:" . mysqli_error($conn);

    }
    return true;
}





