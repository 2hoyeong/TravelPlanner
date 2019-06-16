<?php 
    include('server.php');
    if(isset($_SESSION['id']))
    {
        echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    } else {
?>

<style>
.header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background: #5F9EA0;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}

.input-group {
  margin: 10px 0px 10px 0px;
}

.input-group label {
  display: block;
  text-align: center;
  margin: 3px;
}

.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}

form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
  text-align: center;
}

</style>

<div>
    <div class="header">
        <h2>비밀번호 찾기</h2>
    </div>

    <form method="post" action="find_pw.php">
        <div class="input-group">
            <label>ID</label>
            <input type="text" name="id" style="height:30px; width:50%">&nbsp;
            <input type="submit" value="비밀번호 찾기" style="height:30px; width:130px">
        </div>
        <p><a href="/">홈으로</a></p>
    </form>
</div>

<?php
    }
?>