<?php 
    require 'database.php';
    
    $id = null;
    if (!empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if (null==$id) {
        header ("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT nome, email, senha FROM usuarios where id = ? ";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>User</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link   href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="span10 offset1">
            <div class="row">
                <h3>Read an User</h3>
            </div>

            <div class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">Name</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['nome'];?>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Email Address</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['email'];?>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Password</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['senha']; ?>
                        </label>
                    </div>
                </div>

                <div class="form-actions">
                    <a class="btn btn-success" href="index.php">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>