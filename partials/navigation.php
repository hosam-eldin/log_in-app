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