<?php

    include_once 'application/source/controls/libraries.php';

    $html = new HtmlParser('index');

    $email = null;
    $messageError = null;

    if (!empty($_GET['email'])){
        $email = $_REQUEST['email'];    
    }

    if (!empty($_GET['error'])) {
        
        switch($_REQUEST['error']){
            case '1':
                $messageError = $html->text->errorLoginFailed;
                break;
            case '2':
                $messageError = $html->text->errorLoginEmpty;
                break;  
        }
        $html->setAlert('ERROR', $messageError);
    } 

    $html->setVisibility('ALERT', $messageError);

    $html->setValue('EMAIL', $email );

    echo $html->print();


