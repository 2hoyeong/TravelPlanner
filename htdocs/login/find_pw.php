<?php
    include('server.php');
    $id = $_POST['id'];

    $sql ="SELECT * FROM accounts WHERE id='$id'";
    $result = $sql->fetch_array();

    if($result["id"] == $id) {
	    $_SESSION['id'] = $id;
	    echo "<script>alert('회원님의 비밀번호를 변경합니다.'); location.href='member_pw_update.php';</script>";
    } else {
	    echo "<script>alert('없는 계정입니다.'); history.back();</script>";
    }
?>