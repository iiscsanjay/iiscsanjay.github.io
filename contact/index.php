<?php
$action = filter_input(INPUT_POST, 'action');

if ($action === NULL){
    if (isset($_SESSION['investor_email']) && $_SESSION['investor_email'] != ''){
        $email = $_SESSION['investor_email'];
    } 
    else{
        $action = 'display';
    }
}

switch ($action){
    case 'display':
        include('contactus.php');
        break;
    
    case 'home':
        include('../index.php');
        break;
}

?>
