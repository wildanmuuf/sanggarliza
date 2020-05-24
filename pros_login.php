<?php
    if(isset($_POST['btn_login'])){
        include('function/connection.php');
        try{
            session_start();
            $username = $_POST['username'];
            $password = $_POST['password'];
            $encrypt = hash('sha256', $password);
            $sql = "SELECT users.user_id, roles.role_id FROM users, roles 
                where ((username=:username OR email=:username) 
                and password=:password) 
                and users.role_id=roles.role_id";
            $query = $dbcon->prepare($sql);
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("password", $encrypt, PDO::PARAM_STR);
            $query->execute();
            if($query->rowCount() > 0){
                $user = $query->fetch(PDO::FETCH_ASSOC);
                $_SESSION['user_id'] = $user['user_id'];
                switch($user['role_id']){
                    case 1 :
                        echo "<script type='text/javascript'> document.location = 'penjual/index.php'; </script>";
                        break;
                    case 2 :
                        echo "<script type='text/javascript'> document.location = 'pembeli/index.php'; </script>";
                        break;
                    case 3 :
                        echo "<script type='text/javascript'> document.location = 'suplier/index.php'; </script>";
                        break;
                    case 4 :
                        echo "<script type='text/javascript'> document.location = 'admin/index.php'; </script>";
                        break;
                    default :
                        echo "<script type='text/javascript'>alert('Modul belum dibuat!');</script>";
                        echo "<script type='text/javascript'> document.location = 'logout.php'; </script>";
                        break;
                }
                
            }else{
                echo "<script type='text/javascript'>alert('Username/password salah');</script>";
                print_r($query->errorInfo());
            }
        }catch(PDOException $ex){
            exit($ex->getMessage());
        }
    }
?>