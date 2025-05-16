<?php

include "db.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login app by sql and php</title>
</head>
<body>
    
    <h2>WELCOME TO HOME PAGE</h2>


    <?php if(isset($_SESSION['logged_in'])&& $_SESSION['logged_in'] === true): ?>
    <p>
        <a href="admin.php">admin</a>
    </p>

        <p>
            <a href="logout.php.">logout</a>
        </p>

    <?php else: ?>

    <p>
        <a href="login.php">LOGIN</a>
    </p>

    <?php endif; ?>



    <p>
        <a href="register.php">register</a>
    </p>
    

</body>
</html>



