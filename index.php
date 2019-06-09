<?php 

    include_once 'application/source/control/authentication.php';
    $html = file_get_contents('application/html/index.html');
    $html = str_replace('$VISIBILITY$','hidden',$html);

    $email = null;
    $messageError = null;

    if (!empty($_GET['email'])){
        $email = $_REQUEST['email'];    
    }

    if (!empty($_GET['error'])) {
        switch($_REQUEST['error']){
            case '1':
                $messageError = $data->errorLoginFailed;
                break;
            case '2':
                $messageError = $data->errorLoginEmpty;
                break;
        }
    }
    echo $html;
?>

