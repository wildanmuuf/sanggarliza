<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Daftar Akun</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body>
		<form action="pros_register.php" method="POST" 
			oninput='confirm_password.setCustomValidity(confirm_password.value != password.value ? "Password does not match!" : "")'>
			<h3>Daftar Akun</h3>
			<label for="name">Your Name :</label><br>
			<input type="text" id="name" placeholder="Your Name" name="name" required 
					oninvalid="this.setCustomValidity('Silahkan Masukkan Nama Pertama')" oninput="this.setCustomValidity('')" /><br><br>
			<label for="username">Username :</label><br>
			<input type="text" id="username" name="username" placeholder="Username" required><br><br>
			<label for="email">Email :</label><br>
			<input type="email" id="email" name="email" placeholder="Email Address" required><br><br>
			<label for="phone">Phone :</label><br>
			<input type="text" id="phone" name="phone" placeholder="Phone Number" required><br><br>
			<label for="gender">Gender :</label><br>
			<select name="gender" id="gender">
				<option value="" disabled selected>Select Gender</option>
				<option value="male">Male</option>
				<option value="femal">Female</option>
			</select><br><br>
			<label for="password">Password :</label><br>
			<input type="password" id="password" name="password" placeholder="Password"><br><br>
			<label for="confirm_password">Confirm Password :</label><br>
			<input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password"><br><br>
			<label for="role">Role:</label><br>
			<select name="role" id="role">
				<option value="" disabled selected>Select Role</option>
				<?php
					include_once("function/connection.php");
					$sql = "SELECT*FROM roles where NOT rolename='Admin' or NOT rolename='admin' ";
					$query = $dbcon->query($sql);
					while($roles = $query->fetch()) {
						echo "<option value=".$roles['role_id'].">".$roles['rolename']."</option>";
					}
				?>
			</select><br><br>
			<input type="submit" name="btn_regis" value="Daftar" />
		</form>
	</body>
</html>