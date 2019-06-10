<?php 

    include_once 'application/source/controls/system.php';

    $html = file_get_contents('application/html/index.html');

    $language = new Language('en');
    $pageData = $language->loadLanguage('index.php');

    foreach ($pageData as $key => $value) {
        $html = str_replace('$'.strtoupper($key).'$',$value,$html);
    }

    $email = null;
    $messageError = null;

    if (!empty($_GET['email'])){
        $email = $_REQUEST['email'];    
    }

    if (!empty($_GET['error'])) {
        
        switch($_REQUEST['error']){
            case '1':
                $messageError = $pageData->errorLoginFailed;
                break;
            case '2':
                $messageError = $pageData->errorLoginEmpty;
                break;  
        }
        $html = str_replace('$MESSAGE_ERROR$',$messageError,$html);
    } 
    if (!empty($messageError)){
        $html = str_replace('$VISIBILITY$','none',$html);
    } else {
        $html = str_replace('$VISIBILITY$','hidden',$html);
    }

    echo $html;
?>

