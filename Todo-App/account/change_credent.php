<?php
session_start();
include("../models/connection.php");
include("../models/task_db.php");
include "../view/header.php";
?>
<div>
    <form class="form1" action='./index.php' method="get">
        <input type="hidden" name="action" value="changeUsername">
        <h1> CHANGE USERNAME</h1>
        New Username:
        <input type = "username" name = "newUsername" required><br>
        Current Password:
        <input type = "password" name = "oldPassword" required><br>
        <input type="submit" value="Submit">
    </form>
</div>
<div>
    <form class="form1" action='./index.php' method="get">
        <input type="hidden" name="action" value="changePassword">
        <h1> CHANGE PASSWORD</h1>
        New Password:
        <input type = "username" name = "newPassword" required><br>
        Current Password:
        <input type = "password" name = "oldPassword" required><br>
        <input type="submit" value="Submit">
    </form>
</div>
<?php include "../view/footer.php";?>
