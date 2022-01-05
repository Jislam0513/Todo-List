<?php
session_start();
include("./models/connection.php");
include("./models/account_db.php");
include("./models/task_db.php");

if(!isset($_SESSION['id'])) {
    header("Location: ./account/index.php?action=login");
}
else{
    header("Location: ./mainTask/index.php");
}

