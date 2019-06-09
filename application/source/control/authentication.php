<?php 
    ob_start();

    $id = null;
    if (!empty($_GET['logoff'])){
        if ($_REQUEST['logoff'] == '1') {
            session_start();
            session_destroy();
            header("Location: ../index.php");    
        }
    }
     if (!empty($_POST)){
         $email = $_POST['email'];
         $password = $_POST['password'];

         $messageError = null;

         if ((empty($email)) || (empty($password))) {
             $messageError = 2;
         }

         if ($messageError == null){
            require 'database.php';      

             $pdo = Database::connect();

             $sql = "SELECT id FROM users where email = ? and password = md5(?)";
             $query = $pdo->prepare($sql);
             $query->execute(array($email, $password));

             $data = $query->fetch();

             Database::disconnect();

             if (empty($data['id'])){
                $messageError = 1;
             } else {
                $id = $data['id'];           
             }
         }

        if (empty($messageError)){
            session_start();
            $_SESSION['user_id'] = $id;
            header("Location: mainPanel.php");
        } else {
            header("Location: ../index.php?email=".$email."&error=".$messageError);
        }
     }

     class Validate{
         public static function checkLogin(){
            session_start();

            $username = null;
            $sql = null;
        
            if (!isset($_SESSION['user_id'])){
                header("Location: ../index.php");
            } else {
                require 'database.php';
                
                $pdo = Database::connect();
                $sql = "SELECT username FROM users WHERE id = ?";
                $query = $pdo->prepare($sql);
                $query->execute(array($_SESSION['user_id']));
                $data = $query->fetch();
                
                $username = $data['username'];
                Database::disconnect();
            }   

            return $username;
         }
     }
?>