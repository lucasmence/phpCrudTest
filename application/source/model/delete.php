<?php
    require "authentication.php";
    $username = Validate::checkLogin();

    $id = 0;

    if (!empty($_GET['id'])){
        $id = $_REQUEST['id'];
    }

    if (!empty($_POST)) {
        $id = $_POST['id'];

        $pdo = Database::connect();

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM usuarios WHERE md5(id) = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));

        Database::disconnect();
        
        header("Location: mainPage.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete user</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="span10 offset1">
            <div class="row">
                <h3> Delete an User</h3>
            </div>

            <form class="form-horizontal" action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id;?>"/>
                <p class="alert alert-error">Are you sure to delete?</p>
                <div class="form-actions">
                    <button type="submit" class="btn btn-danger">Yes</button>
                    <a class="btn" href="mainPage.php">No</a>
                </div>
            </form>

        </div>
    </div>
</html>