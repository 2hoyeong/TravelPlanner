<?php
    include('server.php');
?>
<link rel="stylesheet" type="text/css" href="/css/style.css?v=<?=time();?>">

<div>
	<div class="header">
		<h2>Login</h2>
	</div>

	<form method="post" action="login.php">
		<!-- display error -->
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>ID</label>
			<input type="text" name="id">
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
</div> 