<?php
require_once('../model/database.php');
require_once('../model/investor_db.php');
session_start();

$action = filter_input(INPUT_POST, 'action');
 
            
if ($action === NULL){
    if (isset($_SESSION['investor_email']) && $_SESSION['investor_email'] != ''){    
        $action = 'portfolio_info';
        $email = $_SESSION['investor_email'];
    } 
    else{
        $action = 'login_page';
    }
}

switch ($action){
    case 'login_page':
        include('login.php');
        break;
    
    case 'validate_login_info':
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        if ( empty($password) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            if (empty($password)) {
                $error = "password field is empty, Please enter the valid password and re-login it";
            }
            elseif (empty($email)){
                $error = "email field is empty, Please enter the valid email and re-login it";
            }
            elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Invalid email format, Please enter the valid email and re-login it ";
            }
            include('../errors/error.php');
           
        }
        else{
            $investor = get_investor_by_email_password($email,$password);
            if ($investor == NULL){
                $error = "Invalid investor email or password, please reverify and login.";
                include('../errors/error.php');
            }
            else{
              header("Location: ../login/clients.php");
              $_SESSION['investor_email'] = $email;
            }
           
        }
       
}
?>
