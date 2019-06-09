<?php
include('server.php');
?>
<link rel="stylesheet" type="text/css" href="/css/style.css?v=<?=time();?>">
<div>
	<div class="header">
		<h2>Regisdter</h2>
	</div>

	<form method="post" action="register.php">
		<!-- display error -->
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>ID</label>
			<input type="text" name="id" value="<?php echo $id; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>비밀번호</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>비밀번호 확인</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" name="register" class="btn">Register</button>
		</div>
		<p>
			이미 회원이신가요? <a href="login.php">로그인</a>
		</p>
	</form>
</div>