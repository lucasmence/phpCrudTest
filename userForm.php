<?php
    $username = null;
    $email;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Sys - User</title>
</head>
<body>
    <div>
        <div>
            <h2>Sys - User</h2>
        </div>

        <div>
            <form action="post.php" method="POST">
                Username: 
                <input type="input" name="username" value="<?php echo $username; ?>" placeholder="Bob"><br>
                
                Email: 
                <input type="input" name="email" value="<?php echo $email; ?>" placeholder="bob@email.com"><br>
                
                Password: 
                <input type="password" name="password" value=""><br>
                
                Confirm Password: 
                <input type="password" name="passwordConfirm" value=""><br><br>
        
                <input type="submit" value="Post">
                <a>Cancel</a>
            </form>
        </div>
    </div>
    
    
</body>
</html>