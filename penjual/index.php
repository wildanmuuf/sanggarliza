<?php
    include_once("../sesi.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Masuk</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
        <?php
            include_once("../function/connection.php");
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT users.*, roles.* FROM users, roles 
                where users.user_id = :user_id
                and users.role_id=roles.role_id";
            $query = $dbcon->prepare($sql);
            $query->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $query->execute();
            if($query->rowCount() > 0){
                $user = $query->fetch(PDO::FETCH_ASSOC);
                echo "<h3>SELAMAT DATANG ".$user['name']."</h3>";
                echo "<h4>Anda masuk sebagai ".$user['rolename']."</h4>";
            }
        ?>
        <br><br><a href="../logout.php">
            <button>Keluar</button>
        </a>
	</body>
</html>