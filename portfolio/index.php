<?php
require_once('../model/database.php');
require_once('../model/investor_db.php');

// Start the session
session_start();

$action = filter_input(INPUT_POST, 'action');



if ($action === NULL){
    if (isset($_SESSION['investor_email']) && $_SESSION['investor_email'] != ''){    
        $action = 'personal';
        $email = $_SESSION['investor_email'];
    } 
}

switch ($action){
    case 'nameUpdate':
        
        $id = filter_input(INPUT_POST, 'id');
        $name = filter_input(INPUT_POST, 'name');
        if (empty($name)){
            $error = "name field is empty, Please enter the details again!";
            include('../errors/error.php');
        }
        else{
            update_investor_name_by_id($id,$name);
            $email = $_SESSION['investor_email'];
            $investor = get_investor_by_email($email);
            include('profile.php');
        }
        break;

    case 'emailUpdate':
        $id = filter_input(INPUT_POST, 'id');
        $email = filter_input(INPUT_POST, 'email');
        if (empty($email)){
            $error = "email field is empty, Please enter the details again!";
            include('../errors/error.php');
        }
        else{
            update_investor_email_by_id($id,$email);
            setcookie('investor_email',$email,time()+3000 , "/");    
            $investor = get_investor_by_email($email);
            include('profile.php');
        }
        break;

    case 'genderUpdate':
        $id = filter_input(INPUT_POST, 'id');
        $gender = filter_input(INPUT_POST, 'gender');
        if (empty($gender)){
            $error = "gender field is empty, Please enter the details again!";
            include('../errors/error.php');
        }
        else{
            update_investor_gender_by_id($id,$gender);
            $email = $_SESSION['investor_email'];
            $investor = get_investor_by_email($email);
            include('profile.php');
        }
        break;

    case 'passwordUpdate':
        $id = filter_input(INPUT_POST, 'id');
        $password = filter_input(INPUT_POST, 'password');
        $cpassword = filter_input(INPUT_POST, 'cpassword');
        $npassword = filter_input(INPUT_POST, 'npassword');
        if (empty($password) || empty($npassword) || empty($cpassword)) {
            $error = "password field is empty, Please enter the details again!";
            include('../errors/error.php');
        }
        else if (strcasecmp($cpassword,$password)) {
            $error = "current password didn't match, Please enter the details again!";
            include('../errors/error.php');
        }
        else{
            update_investor_password_by_id($id,$npassword);
            $email = $_SESSION['investor_email'];
            $investor = get_investor_by_email($email);
            include('profile.php');
        }
        break;
    
    case 'personal':
        $investor = get_investor_by_email($email);
        include('profile.php');
        break;

    case 'logout':
        // Removing session data
        if(isset($_SESSION["investor_email"])){
            unset($_SESSION["investor_email"]);
        }
       header("Location: ../index.php");
       break;
    
    case 'enroll_course':
        $course_id = filter_input(INPUT_POST, 'course_id');
        $students = get_enrolled_students_by_course_id($course_id);
        include('classinfo.php');
        break;
    
    case 'updateGrade' :
        $course_id = filter_input(INPUT_POST, 'course_id');
        $student_id = filter_input(INPUT_POST,'student_id');
        $grade = filter_input(INPUT_POST,'grade');
        update_grade_by_course_id($course_id,$student_id,$grade);
        $students = get_enrolled_students_by_course_id($course_id);
        include('classinfo.php');
        break;
}

?>
