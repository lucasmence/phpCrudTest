<?php 
    require 'database.php';

    $id = null;
    if (!empty($_GET['id'])){
        $id = $_REQUEST['id'];
    }

    if (!empty($_POST)) {
        $nameError = null;
        $emailError = null;
        $passwordError = null;

        $name = $_POST['edtName'];
        $email = $_POST['edtEmail'];
        $password = $_POST['edtPassword'];

        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }

        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = "Please enter a valid Email Address";
            $valid = false;
        }

        if (empty($password)) {
            $passwordError = 'Please enter Password';
            $valid = false;
        }

        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO usuarios (nome, email, senha) values (?,?,md5(?)) ";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$email,$password));
            Database::disconnect();
            header("Location: index.php");
        }


    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Insert</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="spawn10 offset1">
            <div class="row">
                <h3>Create a User</h3>
            </div>
        </div>

        <form class="form-horizontal" action="create.php" method="post">
            <div class="control-group <?php echo !empty($nameError)? 'error':'';?>">
                <label class="control-label">Username</label>
                <div class="controls">
                    <input name="edtName" type="text" placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                    <?php if (!empty($nameError)): ?>
                        <span class="help-inline"><?php echo $nameError;?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                <label class="control-label">Email Address</label>
                <div class="controls">
                    <input name="edtEmail" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                    <?php if (!empty($emailError)): ?>
                        <span class="help-inline"><?php echo $emailError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
                <label class="control-label">Password</label>
                <div class="controls">
                    <input name="edtPassword" type="password" value="<?php echo !empty($password)?$password:'';?>">
                    <?php if (!empty($passwordError)): ?>
                        <span class="help-inline"><?php echo $passwordError;?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>
                <a class="btn" href="index.php">Back</a>
            </div>
        </form>
    </div>
</body>
</html>