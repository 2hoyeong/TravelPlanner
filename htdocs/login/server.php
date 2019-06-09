<?php

    $id = "";
    $email = "";
    $errors = array();
  
    // if the register button is clicked
    if (isset($_POST['register'])) {
        $id = mysqli_real_escape_string($db_conn, $_POST['id']);
        $email = mysqli_real_escape_string($db_conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($db_conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db_conn, $_POST['password_2']);

        if (empty($id)) {
            array_push($errors, "아이디를 입력해주세요.");
        }
        if (empty($email)) {
            array_push($errors, "이메일을 입력해주세요.");
        }
        if (empty($password_1)) {
            array_push($errors, "비밀번호를 입력해주세요.");
        }

        if ($password_1 != $password_2) {
            array_push($errors, "비밀번호가 일치하지 않습니다.");
        }

        if (count($errors) == 0) {
            $password = md5($password_1);
            $sql = "INSERT INTO accounts (id, email, password) VALUES ('$id', '$email', '$password')";
            if (!sqlInsert($sql))
            {
                array_push($errors, "아이디가 중복되었습니다."); //.mysqli_error($db);
            } else 
			{
				alert("회원가입이 완료되었습니다.", "login.php");
			}
			
        }
    }

    // login
    if (isset($_POST['login'])) {
        $id = mysqli_real_escape_string($db_conn, $_POST['id']);
        $password = mysqli_real_escape_string($db_conn, $_POST['password']);

        if (empty($id)) {
            array_push($errors, "아이디를 입력해주세요.");
        }
        if (empty($password)) {
            array_push($errors, "비밀번호를 입력해주세요.");
        }

        if (count($errors) == 0) {
            //$password = md5($password);
            $query = "SELECT * FROM accounts WHERE id='$id' AND password='$password'";
            $result = sqlSelect($query);
			if($result) {
                $_SESSION['id'] = $id;
                $_SESSION['success'] = "You are now logged in";
                header('location: /index.php');
                //ob_end_flush();
            } else {
                array_push($errors, "아이디 혹은 비밀번호가 잘못되었습니다.");
            }
        }
    }
?>