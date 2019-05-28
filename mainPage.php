<?php 
    session_start();

    $username = null;
    $sql = null;

    if (!isset($_SESSION['user_id'])){
        header("Location: index.php");
    } else {
        include 'database.php';
        $pdo = Database::connect();
        $sql = "SELECT nome FROM usuarios WHERE id = ?";
        $query = $pdo->prepare($sql);
        $query->execute(array($_SESSION['user_id']));
        $data = $query->fetch();
        $username = $data['nome'];
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Test page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <h3>PHP CRUD GRID</h3>
        </div>
        <div class="row">
            <p class="alert alert-info">Hello <?php  echo $username; ?>! &nbsp; <a class="btn btn-primary" href="authentication.php?logoff=1">Logoff</a> </p>
            <p><a  href="create.php?id=0" class="btn btn-success">Create</a></p>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email Adress</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php   
                        $sql = 'SELECT * FROM usuarios ORDER BY id DESC';
                        foreach ($pdo->query($sql) as $row){
                            echo '<tr>';
                            echo '<td>'. $row['nome'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo '<td>'. $row['senha']. '</td>';
                            echo '<td width=250>';
                            echo '  <a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
                            echo '  <a class="btn btn-success" href="create.php?id='.$row['id'].'">Update</a>';
                            echo '  <a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                            echo '</td>';
                            echo '</tr>';           
                        }     
                    ?>

                </tbody>
            </table>

        </div>
    </div>
</body>
</html>

<?php 
    Database::disconnect();
?>