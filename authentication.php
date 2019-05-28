<?php 
    $id = null;
    if (!empty($_GET['logoff'])){
        if ($_REQUEST['logoff'] == '1') {
            session_start();
            session_destroy();
            header("Location: index.php");    
        }
    }
     if (!empty($_POST)){
         $username = $_POST['username'];
         $password = $_POST['password'];

         $messageError = null;

         if ((empty($username)) || (empty($password))) {
             $messageError = 2;
         }

         if ($messageError == null){
            require 'Database.php';            
             $pdo = Database::connect();
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

             $sql = "SELECT id FROM usuarios where nome = ? and senha = md5(?)";
             $query = $pdo->prepare($sql);
             $query->execute(array($username, $password));
             $data = $query->fetch(PDO::FETCH_ASSOC);

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
            header("Location: mainPage.php");
        } else {
            header("Location: index.php?username=".$username."&error=".$messageError);
        }
     }

     class Validate{
         public static function checkLogin(){
            session_start();

            $username = null;
            $sql = null;
        
            if (!isset($_SESSION['user_id'])){
                header("Location: index.php");
            } else {
                require 'database.php';
                
                $pdo = Database::connect();
                $sql = "SELECT nome FROM usuarios WHERE id = ?";
                $query = $pdo->prepare($sql);
                $query->execute(array($_SESSION['user_id']));
                $data = $query->fetch();
                
                $username = $data['nome'];
                Database::disconnect();
            }   

            return $username;
         }
     }
?>