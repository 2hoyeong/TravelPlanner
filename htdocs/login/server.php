<?php
    include('functions.php');
    @session_start();
    //ob_start();

    $id = "";
    $email = "";
    $errors = array();

    $db = mysqli_connect('localhost', 'root', 'apmsetup', 'travelplanner');
    
    // if the register button is clicked
    if (isset($_POST['register'])) {
        $id = mysql_real_escape_string($_POST['id']);
        $email = mysql_real_escape_string($_POST['email']);
        $password_1 = mysql_real_escape_string($_POST['password_1']);
        $password_2 = mysql_real_escape_string($_POST['password_2']);

        if (empty($id)) {
            array_push($errors, "ID is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
        }

        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }

        if (count($errors) == 0) {
            $password = md5($password_1);
            $sql = "INSERT INTO accounts (id, email, password) VALUES ('$id', '$email', '$password')";
            mysqli_query($db, $sql);

            if (mysqli_error($db))
            {
                array_push($errors, "아이디가 중복되었습니다."); //.mysqli_error($db);
            }
        }
    }

    // login
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        else if (empty($password)) {
            array_push($errors, "Password is required");
        }
        else if (email_exists($email, $db))
        {
            $pass = mysqli_query($db, "SELECT password FROM accounts WHERE email='$email'");
            $pass_w = mysqli_fetch_array($pass);
            $dpass = $pass_w['password'];
            $password = md5($password);
            if($password !== $dpass)
            {
                array_push($errors, "Password is Wrong!");
            } else {
                //echo "you are logged in";
                echo "<script type='text/javascript'> document.location = '../index.php'; </script>";
                //header('location: index.php');
            }
        }

/* # login source code #
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM accounts WHERE email='$email' AND password='$password'";
            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) == 1) {
                $_SESSION['email'] = $email;
                $_SESSION['success'] = "You are now logged in";
                header('location: index.php');
                //ob_end_flush();
            } else {
                array_push($errors, "wrong email/password combination");
            }   
        }*/

    }

    // logout
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['email']);
        echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
        header('location: login.php');
    }
?>