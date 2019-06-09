<?php 
    include_once "authentication.php";
    include_once 'systemInfo.php';

    $data = SystemInfo::loadLanguageData(basename(__FILE__)); 
    $username = Validate::checkLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo SystemInfo::getSystemName().$data->title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link   href="../html/css/bootstrap.min.css" rel="stylesheet">
    <script src="../html/js/bootstrap.min.js"></script>
    <link   href="../html/css/index.css" rel="stylesheet">
    <link   href="../html/css/panel.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="row">
            <h3><?php echo SystemInfo::getSystemName().$data->header; ?></h3>
        </div>
        
        
        <div class="row">
            
            
            <div class="horizontal-menu">
                <ul>
                    <li><a class="activeItemHorizontalMenu" href="#home"><?php echo $data->menuHome; ?></a></li>
                    <li><a href="#home"><?php echo $data->menuItems; ?></a></li>
                    <li><a href="#home"><?php echo $data->menuAccounts; ?></a></li>
                    <li><a href="#home"><?php echo $data->menuReports; ?></a></li>
                    <li><a href="#home"><?php echo $data->menuSettings; ?></a></li>
                    <li><a href="#home"><?php echo $data->menuFeedback; ?></a></li>
                    <li><a href="#home"><?php echo $data->menuAboutMe; ?></a></li>
                    <div class="userDataBoxMaster">
                        <div class="userDataBox">
                            <?php echo $data->userGreetings.$username; ?>! &nbsp;
                            <a class="btn btn-success" href="authentication.php?logoff=1">Logoff</a>
                        </div> 
                    </div>
                </ul>
            </div>

            
            
            <div class="vertical-menu">
                <a href="#" class="activeOption"><?php echo $data->menuHome; ?></a>
                <a href="#" class="inactiveOption"><?php echo $data->menuItems; ?></a>
                <a href="#" class="inactiveOption"><?php echo $data->menuAccounts; ?></a>
                <a href="#" class="inactiveOption"><?php echo $data->menuReports; ?></a>
                <a href="#" class="inactiveOption"><?php echo $data->menuSettings; ?></a>
                <a href="#" class="inactiveOption"><?php echo $data->menuFeedback; ?></a>
            </div>

            
        </div>
    </div>
</body>
</html>

<?php 
    Database::disconnect();
?>