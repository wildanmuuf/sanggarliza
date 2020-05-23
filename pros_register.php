<?php
    if(isset($_POST['btn_regis'])){
        include('function/connection.php');
        try{
            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $gender = $_POST['gender'];
            $encrypt = hash('sha256', $password);
            $phone = $_POST['phone'];
            $role_id = $_POST['role'];
            $sql = "INSERT INTO users(name, username, email, gender, password, phone, role_id) VALUES (:name, :username, :email, :gender, :password, :phone, :role_id)";
            $query = $dbcon->prepare($sql);
            $query->bindParam("name", $name, PDO::PARAM_STR);
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("gender", $gender, PDO::PARAM_STR);
            $query->bindParam("password", $encrypt, PDO::PARAM_STR);
            $query->bindParam("phone", $phone, PDO::PARAM_STR);
            $query->bindParam("role_id", $role_id, PDO::PARAM_STR);
            $query->execute();
            $lastId = $dbcon->lastInsertId();
            if($lastId){
                echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
            }else{
                echo "<script type='text/javascript'>alert('Registration Error!');</script>";
                print_r($query->errorInfo());
            }
        }catch(PDOException $ex){
            exit($ex->getMessage());
        }
    }
?>