<?php
    ob_start();
    include('server.php');
    //include('login_check.php');
    include('../header.php');
    
    /*
    if(is_login()){

        if ($_SESSION['id'] == 'admin' && $_SESSION['password']==1)
            echo "<script type='text/javascript'> document.location = 'admin.php'; </script>";
            //header("Location: admin.php");
        else 
            echo "<script type='text/javascript'> document.location = 'welcome.php'; </script>";
            //header("Location: welcome.php");
    }*/

    if (empty($_SESSION['email'])) {
        //header("Location: login.php");
        echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
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
                <input type="text" name="email" value="<?php echo $email; ?>">
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
            &nbsp;
            <p><a href="forgotpass.php">Forgot your password?</a></p>
        </form>
        </body>
    </div>
    
</html>

<?php
include("../footer.php");
?>  