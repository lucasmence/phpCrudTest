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
            <p>
                <a  href="create.php" class="btn btn-success">Create</a>
            </p>
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
                        include 'database.php';
                        $pdo = Database::connect();
                        $sql = 'SELECT * FROM usuarios ORDER BY id DESC';
                        foreach ($pdo->query($sql) as $row){
                            echo '<tr>';
                            echo '<td>'. $row['nome'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo '<td>'. $row['senha']. '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                    ?>

                </tbody>
            </table>

        </div>
    </div>
</body>
</html>