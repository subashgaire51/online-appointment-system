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
		<div class="general">
			<h1>Registration</h1>
			<div>
				<script type="text/javascript">

				function checkForm(form){
				    if(form.username.value == "") {
				      alert("Error: Username cannot be blank!");
				      form.username.focus();
				      return false;
				    }
				    re = /^\w+$/;
				    if(!re.test(form.username.value)) {
				      alert("Error: Username must contain only letters, numbers and underscores!");
				      form.username.focus();
				      return false;
				    }
				    if(form.password.value != "" && form.password.value == form.repassword.value) {
				      if(form.password.value.length < 6) {
				        alert("Error: Password must contain at least six characters!");
				        form.password.focus();
				        return false;
				      }
				      if(form.password.value == form.username.value) {
				        alert("Error: Password must be different from Username!");
				        form.password.focus();
				        return false;
				      }
				      re = /[0-9]/;
				      if(!re.test(form.password.value)) {
				        alert("Error: password must contain at least one number (0-9)!");
				        form.password.focus();
				        return false;
				      }
				    } else {
				      alert("Error: Please check that you've entered and confirmed your password!");
				      form.password.focus();
				      return false;
				    }
				    alert("Thank You");
				    return true;
				  }

				</script>
				<form method="POST" action="actions/backend_register.php" id="regiter" onsubmit="return checkForm(this)">
					Full Name: <input type="text" name="name"> <br>
					Email: <input type="email" name="email"> <br>
					Password: <input type="password" name="password"><br>
					Confirm Password: <input type="password" name="repassword"><br>
					Address: <input type="text" name="address">
					Date of birth: <input type="date" name="dob"> <br>
					Gender:
					<select name="gender">
						<option selected>Male</option>
						<option>Female</option>
					</select>
					<br>
					<input type="submit" name="register" value="Register">
					<br>
					Already registered? Click <a href="index.php">HERE</a> to log in.

				</form>

			
			</div>
		</div>
	</div>
		
</body>
</html>