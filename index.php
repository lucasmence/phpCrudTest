<?php
    include_once 'database.php';

    $connection = Database::connect();

    $sql = 'SELECT id, username, email, password FROM commercial_users';
    
    /*$query = $connection->prepare($sql);

    $query->execute();

    $data = $query->fetch();*/

    $tableData = null;

    foreach($connection->query($sql) as $row) 
    {
        $tableData = $tableData . '<tr>';
        $tableData = $tableData . '<td>' . $row['id'] . '</td>';
        $tableData = $tableData . '<td>' . $row['username'] . '</td>';
        $tableData = $tableData . '<td>' . $row['email'] . '</td>';
        $tableData = $tableData . '<td>' . $row['password'] . '</td>';
        $tableData = $tableData . '</tr>';
    }

    Database::disconnect();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Sys - Panel</title>
</head>
<body>
    <div class='conteudo'>

        <div class='header'>
            <h1>Sys - Panel</h1>
        </div>

        <div class='user'>
            <p>Hello <?php echo $username; ?></p>
            <a>Change Password</a><br>
            <a>Logoff</a><br>
        </div>

        <div class='data'>
            <br><br>
            <table>
                <tr style='font-weight: bold;'>
                    <td>ID</td>
                    <td>Username</td>
                    <td>Email</td>
                    <td>Password</td>
                </tr>
                <?php echo $tableData; ?>
            </table>

        </div>

    </div>
</body>
</html>