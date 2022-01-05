
<?php
    session_start();
    include("../models/account_db.php");
    include("../view/header.php");
    $action = filter_input(INPUT_GET, 'action');
    // echo $_SESSION['id'];
    if($action == "login"){
        include ("login_page.php");
    } else if($action == "signup"){
        include ("signup_page.php");
    } else if($action == "checkLogin") {
        $username = filter_input(INPUT_GET, 'username');
        $password = filter_input(INPUT_GET, 'password');
        if(!checkLogin($username, $password)){
            header("Location: index.php?action=login");
        }else {
            header("Location: ../mainTask/index.php");
        }

    } else if($action == "createAccount"){
        $firstName = filter_input(INPUT_GET, 'firstname');
        $lastName = filter_input(INPUT_GET, 'lastname');
        $email = filter_input(INPUT_GET, 'email');
        $user = filter_input(INPUT_GET, 'username');
        $pass = filter_input(INPUT_GET, 'password');
        if(!createAccount($firstName, $lastName, $email, $user, $pass)){
            header("Location: ./index.php?action=signup");
        }else {
            header("Location: ./index.php?action=login");
        }
    } else if($action == "changeUsername"){
        $username = filter_input(INPUT_GET, 'newUsername');
        $password = filter_input(INPUT_GET, 'oldPassword');
        if(!changeUsername($username, $password)){
            header("Location: ./change_credent.php");
        }else {
            header("Location: ../mainTask/index.php");
        }

    } else if($action == "changePassword"){
        $newPassword = filter_input(INPUT_GET, 'newPassword');
        $oldPassword = filter_input(INPUT_GET, 'oldPassword');
        if(!changePassword($newPassword, $oldPassword)){
            header("Location: ./change_credent.php");
        }else {
            header("Location: ../mainTask/index.php");
        }
    }

    include("../view/footer.php");


    ?>


