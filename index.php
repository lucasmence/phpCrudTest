<?php 

    $username = null;
    $messageError = null;

    if (!empty($_GET['username'])){
        $username = $_REQUEST['username'];    
    }

    if (!empty($_GET['error'])) {
        switch($_REQUEST['error']){
            case '1':
                $messageError = "Wrong Username or Password, try again!";
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="spawn10 offset1">
            <div class="row">
                <h3>Login</h3>
            </div>
        </div>
        <form class="form-horizontal" action="authentication.php" method="post">
            <p class="alert alert-error" <?php if (empty($messageError)) { echo "style='visibility:hidden;' "; }?> > <?php echo $messageError; ?> </p>
            <div class="control-group">
                <label class="control-label">Username</label>
                <div class="controls">
                    <input name="username" type="text" placeholder="Username" value="<?php echo $username; ?>"/>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                    <input name="password" type="password" />      
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-success">Login</button>
            </div>
        </form>
    </div>
</body>
</html>