<?php


$con = mysqli_connect("localhost", "root", "","login_app");
if($con){
    echo "connected";
}else{
    echo "NOT CONNECTING" . mysqli_error($con);
}

