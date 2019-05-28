<?php 
     if (!empty($_POST)){
         $username = $_POST['username'];
         $password = $_POST['password'];

         $messageError = null;

         if ((empty($username)) || (empty($password))) {
             $messageError = "Username/Password cannot be empty!";
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
             }
         }

         if (empty($messageError)){
            header("Location: mainPage.php");
         } else {
            header("Location: index.php?username=".$username."&error=".$messageError);
         }
     }
?>