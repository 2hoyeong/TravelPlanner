<?php
    include('server.php');
    
    if($_POST["email"] == "") {
		echo '<script> alert("항목을 입력하세요"); history.back(); </script>';
	} else {
        $email = $_POST['email'];
	    $row = mysqli_query($dbconn, "SELECT id FROM accounts WHERE Email='$email'");
	
	    if (mysqli_num_rows($row) == 1) {
		    echo "<script>alert('회원님의 ID는 ".$row['id']."입니다.'); history.back();</script>";
	    } else {
		    echo "<script>alert('없는 계정입니다.'); history.back();</script>";
        }
        
        /*
        $email = $_POST['email'];
    
        $sql = "SELECT id FROM accounts WHERE Email='$email'";
        $result = $sql->fetch_array();

        if($result) {
	        echo "<script>alert('회원님의 ID는 ".$result['id']."입니다.'); history.back();</script>";
        } else {
            echo "<script>alert('없는 계정입니다.'); history.back();</script>";
        }*/
    }
?>