<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Sajha Hospital</title>
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
</head>
<body>
	<?php require_once '_navigation.php'; ?>
	<div id="body">
		<div class="header">
			<div>
				<ul>
					<li><img src="images/inj.jpg" alt="" /></li>	
					<li><img src="images/stec.jpg" alt="" /></li>
					<li><img src="images/pres.jpg" alt="" /></li>		
				</ul>		
				<div>
				<?php 
					function redirect() {
	    				header("Location: actions/redirect.php");
					}
				 ?>

					<h3>Login Now!</h3>
					<form method="POST" action="actions/backend_login.php">
						<input type="email" name="email" placeholder="E-mail" required autofocus>
						<input type="password" name="password" placeholder="Password" required autofocus><br>
						<input type="submit" name="login" value="Log in">
						Not registered? Click <a href="registration.php">HERE</a> to register.
					</form>
					<?php
						session_start();
					  if(isset($_SESSION['login'])){
					   redirect();
					  }
					?> 
				</div>
			</div>
		</div>
		
</body>
</html>

<?php 
	include("database_setup.php");
 ?>