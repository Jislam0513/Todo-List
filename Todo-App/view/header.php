<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TO DO APP</title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">
    <link type="text/css" href="../styles.css" rel="stylesheet">
    <script src="../jsfile.js"></script>

</head>
<body class="backgroundColor" >
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="regNav">
    <a class="nav-link" href="../index.php"><h1 class="title" ><u><strong>TO DO APP</strong></u></h1></a>
    <?php
    if(isset($_SESSION['id'])) {
        echo '<a class="btn btn-success" href="../logout.php" id="login" role="button">Log Out</a>';
    }
    ?>
    <?php
    if(isset($_SESSION['id'])) {
        echo '<a class="btn btn-success borderOutline" href="../account/change_credent.php" id="login" role="button">Change Credentials</a>';
    }
    ?>
</nav>
<div class="container">
    <div class="row center">
        <br>