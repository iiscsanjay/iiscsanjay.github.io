<?php

function update_investor_name_by_id($id,$name){
    global $db;
    $query = 'UPDATE investors
              SET name = :name
              WHERE investor_id = :investor_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':investor_id', $id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    } 
}

function update_investor_gender_by_id($id,$gender){
    global $db;
    $query = 'UPDATE investors
              SET gender = :gender
              WHERE investor_id = :investor_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':gender', $gender);
        $statement->bindValue(':investor_id', $id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    } 
}

function update_investor_email_by_id($id,$email){
    global $db;
    $query = 'UPDATE investors
              SET email = :email
              WHERE investor_id = :investor_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':investor_id', $id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    } 
}

function update_investor_password_by_id($id,$password){
    global $db;
    $query = 'UPDATE investors
              SET password = :password
              WHERE investor_id = :investor_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':investor_id', $id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    } 
}

function update_investor_birthdate_by_id($id,$dob){
    global $db;
    $query = 'UPDATE investors
              SET birth_date = :birth_date
              WHERE investor_id = :investor_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':birth_date', $dob);
        $statement->bindValue(':investor_id', $id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    } 
}

function get_investor_by_email_password($email,$password){
    global $db;
    $query = 'SELECT * FROM investors
                where email = :email and password = :password';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $row;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
function get_investor_by_email($email){
    global $db;
    $query = 'SELECT * FROM investors
                where email = :email';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $row;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
function add_investor($name,$gender,$email,$password){
    global $db;
    $query = 'INSERT INTO investors
                 (name, gender, email, password)
              VALUES
                 (:name, :gender, :email, :password)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':gender', $gender);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

?>
