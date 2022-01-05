<form class="form1" action='index.php' method="get">
    <h1>Add Task</h1>
    <input type="hidden" name="action" value="addTask">
    Due Date:
    <input type="datetime-local" id="duedate" name="duedate" required><br>
    Title:
    <input type="text" id="tasktitle" name="tasktitle" required><br>
    Description:
    <input type = "text" id="task" name="task" required><br>
    Urgency:
    <input type="radio" id="urgency" name="urgency" value="1" checked>
    <label for="normal">Normal</label>
    <input type="radio" id="urgency" name="urgency" value="2">
    <label for="important">Important</label>
    <input type="radio" id="urgency" name="urgency" value="3">
    <label for="very">Very Important</label><br>
    Completed or Incompleted:
    <input type="radio" id="completeness" name="completeness" value="0" checked>
    <label for="incomplete">Incomplete</label>
    <input type="radio" id="completeness" name="completeness" value="1">
    <label for="complete">Completed</label><br>
    <input type = 'submit' value = 'Submit'>
</form>