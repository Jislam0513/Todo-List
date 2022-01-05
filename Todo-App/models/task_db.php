<?php
session_start();
include ("connection.php");
function get_task($taskID){
    global $conn;
    $query = 'SELECT * FROM projectTasks WHERE id = :id';
    $statement = $conn->prepare($query);
    $statement->bindValue(':id', $taskID);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results[0];
}
function incompletedTask($sort){
    global $conn;
    $query = 'SELECT * FROM projectTasks WHERE ownerid = :id AND isdone = 0';
    if($sort == "title"){
        $query.= " ORDER BY title ASC";
    }
    else if($sort == "duedate"){
        $query.= " ORDER BY duedate ASC";
    }
    else if($sort == "urgency"){
        $query.= " ORDER BY urgency DESC";
    }
    $statement = $conn->prepare($query);
    $statement->bindValue(':id', $_SESSION['id']);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}
function completedTask($sort){
    global $conn;
    $query = 'SELECT * FROM projectTasks WHERE ownerid = :id AND isdone = 1';
    if($sort == "title"){
        $query.= " ORDER BY title ASC";
    }
    else if($sort == "duedate"){
        $query.= " ORDER BY duedate ASC";
    }
    else if($sort == "urgency"){
        $query.= " ORDER BY urgency DESC";
    }
    $statement = $conn->prepare($query);
    $statement->bindValue(':id', $_SESSION['id']);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}
function deleteTask($taskID){
    global $conn;
    $query = 'DELETE FROM projectTasks WHERE id = :id';

    $statement = $conn->prepare($query);
    $statement->bindValue(':id', $taskID);
    $statement->execute();
    $statement->closeCursor();
}
function addTask($date, $title, $desc, $urgency, $comp){
    global $conn;
    $query = 'INSERT INTO projectTasks(ownerid, createddate, duedate, title ,message, isdone, urgency) VALUES (:idd,NOW(),:datee,:titlee,:messagee,:compp,:urgencyy)';
    $statement = $conn->prepare($query);
    $statement->bindValue(':idd', $_SESSION['id']);
    $statement->bindValue(':datee', $date);
    $statement->bindValue(':titlee', $title);
    $statement->bindValue(':messagee', $desc);
    $statement->bindValue(':urgencyy', $urgency);
    $statement->bindValue(':compp', intval($comp));
    $statement->execute();
}
function updateTask($taskID, $date, $title, $desc, $urgency, $comp){
    global $conn;
    $query = 'UPDATE projectTasks SET duedate= :datee, title= :titlee, message= :messagee, isdone=:compp,`urgency`= :urgencyy WHERE id = :idd';
    $statement = $conn->prepare($query);
    $statement->bindValue(':idd', $taskID);
    $statement->bindValue(':datee', $date);
    $statement->bindValue(':titlee', $title);
    $statement->bindValue(':messagee', $desc);
    $statement->bindValue(':urgencyy', $urgency);
    $statement->bindValue(':compp', intval($comp));
    $statement->execute();
}
function markComplete($taskID){
    global $conn;
    $query = 'UPDATE projectTasks SET isdone= 1 WHERE id = :id';
    $statement = $conn->prepare($query);
    $statement->bindValue(':id', $taskID);
    $statement->execute();
    $statement->closeCursor();
}
function markInComplete($taskID){
    global $conn;
    $query = 'UPDATE projectTasks SET isdone= 0 WHERE id = :id';
    $statement = $conn->prepare($query);
    $statement->bindValue(':id', $taskID);
    $statement->execute();
    $statement->closeCursor();
}

function veryImportant(){
    global $conn;
    $query = 'SELECT * FROM projectTasks WHERE ownerid = :id AND isdone = 0 AND urgency="Very Important"';
    $statement = $conn->prepare($query);
    $statement->bindValue(':id', $_SESSION['id']);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}
function important(){
    global $conn;
    $query = 'SELECT * FROM projectTasks WHERE ownerid = :id AND isdone = 0 AND urgency="Important"';
    $statement = $conn->prepare($query);
    $statement->bindValue(':id', $_SESSION['id']);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}
function normal(){
    global $conn;
    $query = 'SELECT * FROM projectTasks WHERE ownerid = :id AND isdone = 0 AND urgency="Normal"';
    $statement = $conn->prepare($query);
    $statement->bindValue(':id', $_SESSION['id']);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}
