<?php
    include('server.php');
    include('../header.php');
    ob_start();

    if (empty($_SESSION['email'])) {
    header('location: login.php');
    ob_end_flush();
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>User registration system using PHP and MYSQL</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css?v=<?=time();?>">
    </head>

    <div>
        <body>
        <div class="header">
            <h2>Login</h2>
        </div>

        <form method="post" action="login.php">
            <!-- display error -->
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>Email</label>
                <input type="text" name="email">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <div class="input-group">
                <button type="submit" name="login" class="btn">Login</button>
            </div>
            <p>
                회원이 아니세요? <a href="register.php">회원가입</a>
            </p>
        </form>
        </body>
    </div>
    
</html>

<?php
include("../footer.php");
?>  