<?php
session_start();
include ("connection.php");

function checkLogin($username, $password){
    global $conn;
    $query = 'SELECT * FROM projectAccounts WHERE username = :username';
    $statement = $conn->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $results = $statement->fetch();
    $statement->closeCursor();
    if($password == $results['password']){
        $_SESSION['id'] = $results['id'];
        $_SESSION['fname'] = $results['fname'];
        $_SESSION['lname'] = $results['lname'];
        return true;
    }

    return false;
}
function createAccount($firstName, $lastName, $email, $user, $pass){
    global $conn;
    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    if (!preg_match($regex, $email)) {
        echo "email";
        return false;
    }
    else if (preg_match('/\d/', $firstName) || preg_match('/\d/', $lastName)){
        echo '<script type="text/javascript">', 'alert("Username Does Not Exsit");', 'location.replace("loginpage.php")', '</script>';
        return false;
    }
    else if (preg_match('/[&+_\'+,]/', $user) && preg_match('/\.\./', $user)){
        echo "usename";
        return false;
    }
    else if (!preg_match('/[a-z]/', $pass) && !preg_match('/[A-Z]/', $pass) && !preg_match('/[0-9]/', $pass)) {
        echo "password";
        if (strlen($pass) < 8 || strlen($pass) > 30) {
            return false;
        }
    }

    $query = 'SELECT username FROM projectAccounts WHERE username = :username';
    $statement = $conn->prepare($query);
    $statement->bindValue(':username', $user);
    $statement->execute();
    $results = $statement->fetch();
    $statement->closeCursor();
    if($results['username'] != NULL){
        return false;
    }
    $query = 'INSERT INTO projectAccounts(fname, lname, email, username, password) VALUES (:f,:l,:mail,:usernamee,:passs)';
    $statement = $conn->prepare($query);
    $statement->bindValue(':f', $firstName);
    $statement->bindValue(':l', $lastName);
    $statement->bindValue(':mail', $email);
    $statement->bindValue(':usernamee', $user);
    $statement->bindValue(':passs', $pass);
    $statement->execute();
    return true;
}
function changeUsername($username, $password){
    global $conn;
    $query = 'SELECT * FROM projectAccounts WHERE id = :id';
    $statement = $conn->prepare($query);
    $statement->bindValue(':id', $_SESSION['id']);
    $statement->execute();
    $results = $statement->fetch();
    $statement->closeCursor();
    if($password != $results['password']){
        return false;
    }

    if (preg_match('/[&+_\'+,]/', $username) && preg_match('/\.\./', $username)){
        return false;
    }
    $query = 'UPDATE projectAccounts SET username = :username WHERE id = :idd';
    $statement = $conn->prepare($query);
    $statement->bindValue(':idd', $_SESSION['id']);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $statement->closeCursor();
    return true;


}
function changePassword($newPassword, $oldPassword){
    global $conn;
    $query = 'SELECT * FROM projectAccounts WHERE id = :id';
    $statement = $conn->prepare($query);
    $statement->bindValue(':id', $_SESSION['id']);
    $statement->execute();
    $results = $statement->fetch();
    $statement->closeCursor();
    if($oldPassword != $results['password']){
        return false;
    }

    else if (!preg_match('/[a-z]/', $newPassword) && !preg_match('/[A-Z]/', $newPassword) && !preg_match('/[0-9]/', $newPassword)) {
        echo "password";
        if (strlen($newPassword) < 8 || strlen($newPassword) > 30) {
            return false;
        }
    }

    $query = 'UPDATE projectAccounts SET password = :password WHERE id = :idd';
    $statement = $conn->prepare($query);
    $statement->bindValue(':idd', $_SESSION['id']);
    $statement->bindValue(':password', $newPassword);
    $statement->execute();
    $statement->closeCursor();
    return true;


}


?>