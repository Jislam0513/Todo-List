<?php
session_start();
include ("../models/connection.php");
include ("../models/task_db.php");
$taskId = filter_input(INPUT_GET, 'taskID1');
$record = get_task($taskId);
include "../view/header.php";
$d = substr($record['duedate'], 0, 10).'T'.substr($record['duedate'], 11, 8);
?>
<form class="form1" action='./index.php' method="get">
    <h1>Edit Task</h1>
    <input type="hidden" name="action" value="edit_task">
    <input type="hidden" name="taskID2" value="<?php echo $taskId ?>">
    Due Date:
    <input type="datetime-local" id="duedate2" name="duedate2" value="<?php echo $d; ?>" required><br>
    Title:
    <input type="text" id="tasktitle2" name="tasktitle2" value="<?php echo $record['title']?>" required><br>
    Description:
    <input type = "text" id="task2" name="task2" value="<?php echo $record['message']?>" required><br>
    Urgency:
    <input type="radio" id="urgency2" name="urgency2" value="1" <?php if($record['urgency'] == 1) {echo "checked";}?>>
    <label for="normal">Normal</label>
    <input type="radio" id="urgency2" name="urgency2" value="2" <?php if ($record['urgency']== 2) {echo "checked";}?>>
    <label for="important">Important</label>
    <input type="radio" id="urgency2" name="urgency2" value="3" <?php if ($record['urgency']== 3) {echo "checked";}?>>
    <label for="very">Very Important</label><br>
    Completed or Incompleted:
    <input type="radio" id="completeness2" name="completeness2" value="0" <?php if($record['isdone'] == 0) {echo "checked";}?>>
    <label for="incomplete">Incomplete</label>
    <input type="radio" id="completeness2" name="completeness2" value="1" <?php if($record['isdone'] == 1) {echo "checked";}?>>
    <label for="complete">Completed</label><br>
    <input type = 'submit' value = 'Submit'>
</form>
<?php include "../view/footer.php";?>
