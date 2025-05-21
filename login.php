<?php
 include "partials/header.php"; 
  
if(isset($_SESSION['logged_in'])&& $_SESSION['logged_in'] === true){
    header("location: admin.php");
    exit;
}

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);


       if(mysqli_num_rows($result) === 1) {
           $user = mysqli_fetch_assoc($result);

           if (password_verify($password, $user["password"])) {

               $_SESSION["username"] = $user["username"];
               $_SESSION["logged_in"] = true;
               header("location: admin.php");
               exit;
           } else {
               $error = "invalid password";
           }

       }else{
           $error = "invalid username";
       }

}

?>


<?php include "partials/navigation.php";?>
<div class="container">



<div class="form-container">
    <form method="post" action="">
        <h2>login</h2>
        <?php if($error != ""): ?>

            <p style="color: red">
                <?php echo $error; ?>
            </p>

        <?php endif; ?>
        <label for="username">USERNAME:</label><br>
        <input type="text" name="username"  placeholder="Enter your username" required><br><br>



        <label for="password">PASSWORD:</label><br>
        <input type="password" name="password" required  placeholder="Password"><br><br>



        <input type="submit" value="login"  >

    </form>
</div>

</div>


   <?php include "partials/footer.php"; ?>
   <?php mysqli_close($conn);?>

   
 

