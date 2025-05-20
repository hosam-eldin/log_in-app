<?php
 include "partials/navigation.php"; 
 
$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    if ($password !== $confirm_password) {
       $error = "passwords do not match";
    }else{

        $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1){
            $error = "Username already exists, please choose another one";
        }else{
            $password_hash = password_hash($password, PASSWORD_DEFAULT);


            $sql = " INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password_hash')";
            if(mysqli_query($conn, $sql)){
                echo "DATA INSERTED";
            }else{
                $error =  "DATA NOT INSERTED ,ERROR: ".mysqli_error($conn);
            }
        }

    }
}
?>

<?php include "partials/header.php"; ?>
<div class="container">
<h2>REGISTER</h2>

<?php if($error != ""): ?>

<p style="color: red">
    <?php echo $error; ?>
    </p>

<?php endif; ?>

<form method="post" action="">

    <label for="username">USERNAME:</label><br>
    <input type="text" name="username"  placeholder="Enter your username" required><br><br>

    <label for="email">EMAIL:</label><br>
    <input type="email" name="email" required placeholder="Email address"><br><br>

    <label for="password">PASSWORD:</label><br>
     <input type="password" name="password" required  placeholder="Password"><br><br>

    <label for="confirm_password">confirm password:</label><br>
    <input type="password" name="confirm_password" required  placeholder="Confirm password"><br><br>

    <input type="submit" value="register"  >

</form>
</div>

<?php include "partials/footer.php"; ?>

<?php
mysqli_close($conn);
?>