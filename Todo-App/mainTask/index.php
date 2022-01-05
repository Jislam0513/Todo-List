<?php
session_start();
include ("../models/connection.php");
include("../models/account_db.php");
include("../models/task_db.php");
$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'login';
    }
}
if($action == "delete_task"){
    $taskID = filter_input(INPUT_GET, 'taskID');
    deleteTask($taskID);
    header("Location: ./index.php");
}
else if($action == "addTask"){
    $date = filter_input(INPUT_GET, 'duedate');
    $title = filter_input(INPUT_GET, 'tasktitle');
    $desc = filter_input(INPUT_GET, 'task');
    $urgency = filter_input(INPUT_GET, 'urgency');
    $comp = filter_input(INPUT_GET, 'completeness');
    addTask($date, $title, $desc, $urgency, $comp);
    header("Location: ./index.php");
}
else if($action == "edit_task"){
    $date = filter_input(INPUT_GET, 'duedate2');
    $taskID = filter_input(INPUT_GET, 'taskID2');
    $title = filter_input(INPUT_GET, 'tasktitle2');
    $desc = filter_input(INPUT_GET, 'task2');
    $urgency = filter_input(INPUT_GET, 'urgency2');
    $comp = filter_input(INPUT_GET, 'completeness2');
    updateTask($taskID, $date, $title, $desc, $urgency, $comp);
    //header("Location: ./index.php");
}
else if($action == "mark_complete"){
    $taskID = filter_input(INPUT_GET, 'taskID');
    markComplete($taskID);
    header("Location: ./index.php");
    echo "here";
}
else if($action == "mark_incomplete"){
    $taskID = filter_input(INPUT_GET, 'taskID');
    markInComplete($taskID);
    header("Location: ./index.php");
}


include("../view/header.php");
echo "<h1>Hello, ".$_SESSION['fname']." ".$_SESSION['lname']."</h1>";

include ("./add_task_form.php");

?>
<form class="form1" >
    <labal for="sort">Sort By: </labal>
    <select id="sort" onchange="ajaxFunction1()">
        <option value='duedate'>Due Date</option>
        <option value='title'>Title</option>
        <option value='urgency'>Urgency</option>
    </select>
</form>

<div id = 'ajaxDiv'><?php $sort="duedate";include("./full_form.php")?></div>
<br><br><br>
<?php
include("../view/footer.php");
?>