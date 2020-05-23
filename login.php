<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Masuk</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body>
		<form action="pros_login.php" method="POST" 
			oninput='confirm_password.setCustomValidity(confirm_password.value != password.value ? "Password does not match!" : "")'>
			<h3>Masuk</h3>
			<label for="username">Username :</label><br>
			<input type="text" id="username" name="username" placeholder="Username" required><br><br>
			<label for="password">Password :</label><br>
			<input type="password" id="password" name="password" placeholder="Password"><br><br>
			<input type="submit" name="btn_login" value="Login" />
		</form>
	</body>
</html>