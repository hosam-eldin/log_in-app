<?php
include_once "functions.php";
include "partials/header.php";
include "partials/navigation.php";
 include_once "db.php";


 
$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    if ($password !== $confirm_password) {
       $error = "passwords do not match";
    }else{

        //check if user exist


        if(UserExists($conn, $username)){
            $error = "Username already exists, please choose another one";
        }else{
            $password_hash = password_hash($password, PASSWORD_DEFAULT);


            $sql = " INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password_hash')";
            if(mysqli_query($conn, $sql)){
                $_SESSION["username"] = $username;
                $_SESSION["logged_in"] = true;
                header("location: admin.php");
                exit;
            }else{
                $error =  "DATA NOT INSERTED ,ERROR: ".mysqli_error($conn);
            }
        }

    }
}
?>


<div class="container">



<div class="form-container">

    <form method="post" action="">
        <h2>Create Your Account</h2>
        <?php if($error != ""): ?>

            <p style="color: red">
                <?php echo $error; ?>
            </p>

        <?php endif; ?>
        <label for="username">USERNAME:</label>
        <input value=" <?php echo isset($username)? $username :'';?>" type="text" name="username"  placeholder="Enter your username" required>

        <label for="email">EMAIL:</label>
        <input value=" <?php echo isset($email)? $email:'';?>" type="email" name="email" required placeholder="Email address">

        <label for="password">PASSWORD:</label>
        <input type="password" name="password" required  placeholder="Password">

        <label for="confirm_password">confirm password:</label>
        <input type="password" name="confirm_password" required  placeholder="Confirm password">

        <input type="submit" value="register"  >

    </form>
</div>

</div>

<?php include "partials/footer.php"; ?>
<?php mysqli_close($conn); ?>

