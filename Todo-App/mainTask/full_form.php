<?php
$incomplete = incompletedTask($sort);
$complete = completedTask($sort);
$urgency = incompletedTask("urgency");

echo "<h3>You have completed ".count($complete)." Tasks</h3>";
$display_string = "<div><form class='form1'><h1>INCOMPLETED TASKS</h1><table border='2px'>";
            $display_string .= "<tr>";
                $display_string .= "<th>Status</th>";
                $display_string .= "<th>Due Date</th>";
                $display_string .= "<th>Title</th>";
                $display_string .= "<th>Task</th>";
                $display_string .= "<th>Urgency</th>";
                $display_string .= "<th>Time Remaining</th>";
                $display_string .= "<th>Delete </th>";
                $display_string .= "<th>Edit</th>";
                $display_string .= "</tr>";
            echo $display_string;

            foreach ($incomplete as $product){
                $temp = "";
                if($product['urgency'] == 1){
                    $temp = "Normal";
                }
                else if($product['urgency'] == 2){
                    $temp = "Important";
                }
                else if($product['urgency'] == 3){
                    $temp = "Very Important";
                }
            $idd = $product['id'];
            $d = strtotime($product['duedate']);
            $now = new DateTime();
            $future_date = new DateTime($product['duedate']);
            $interval = $future_date->diff($now);

            //echo $interval->format("%a D, %h H, %i M, %s S");

                echo "<tr><td><form action='index.php' method='get'>";
                        echo "<input type='hidden' name='action' value='mark_complete'>";
                        echo "<input type='hidden' name='taskID' value='$idd'>";
                        echo "<input type='submit' value=' '>";
                        echo"</form></td>";
                echo "<td>".date("M-d-y h:ia", $d)."</td>";
                echo "<td>".$product['title']."</td>";
                echo "<td>".$product['message']."</td>";
                echo "<td>".$temp."</td>";
                echo "<td>".$interval->format("%a D, %h H, %i M, %s S")."</td>";
                echo "<td><form action='index.php' method='get'>";
                        echo "<input type='hidden' name='action' value='delete_task'>";
                        echo "<input type='hidden' name='taskID' value='$idd'>";
                        echo "<input type='submit' value='Delete'>";
                        echo"</form></td>";
                echo "<td><form action='edit_task_form.php' method='get'>";
                        echo "<input type='hidden' name='action' value='edit_task'>";
                        echo "<input type='hidden' id ='taskID1' name='taskID1' value='$idd'>";
                        echo "<input type='submit' value='Edit'>";

                        echo"</form></td>";
                echo"</tr>";
            }

            $display_string = "</table></form></div>";

echo $display_string;



$display_string = "<div><form class='form1'><h1>COMPLETED TASKS</h1><table border='2px'>";
$display_string .= "<tr>";
$display_string .= "<th>Status</th>";
$display_string .= "<th>Due Date</th>";
$display_string .= "<th>Title</th>";
$display_string .= "<th>Task</th>";
$display_string .= "<th>Urgency</th>";
$display_string .= "<th>Time Remaining</th>";
$display_string .= "<th>Delete </th>";
$display_string .= "<th>Edit</th>";
$display_string .= "</tr>";
echo $display_string;

foreach ($complete as $product){
    $temp = "";
    if($product['urgency'] == 1){
        $temp = "Normal";
    }
    else if($product['urgency'] == 2){
        $temp = "Important";
    }
    else if($product['urgency'] == 3){
        $temp = "Very Important";
    }
    $idd = $product['id'];
    $d = strtotime($product['duedate']);
    $now = new DateTime();
    $future_date = new DateTime($product['duedate']);
    $interval = $future_date->diff($now);

    //echo $interval->format("%a D, %h H, %i M, %s S");

    echo "<tr><td><form action='index.php' method='get'>";
    echo "<input type='hidden' name='action' value='mark_incomplete'>";
    echo "<input type='hidden' name='taskID' value='$idd'>";
    echo "<input type='submit' value=' '>";
    echo"</form></td>";
    echo "<td>".date("M-d-y h:ia", $d)."</td>";
    echo "<td>".$product['title']."</td>";
    echo "<td>".$product['message']."</td>";
    echo "<td>".$temp."</td>";
    echo "<td>".$interval->format("%a D, %h H, %i M, %s S")."</td>";
    echo "<td><form action='index.php' method='get'>";
    echo "<input type='hidden' name='action' value='delete_task'>";
    echo "<input type='hidden' name='taskID' value='$idd'>";
    echo "<input type='submit' value='Delete'>";
    echo"</form></td>";
    echo "<td><form action='edit_task_form.php' method='get'>";
    echo "<input type='hidden' name='action' value='edit_task'>";
    echo "<input type='hidden' id ='taskID1' name='taskID1' value='$idd'>";
    echo "<input type='submit' value='Edit'>";

    echo"</form></td>";
    echo"</tr>";
}

$display_string = "</table></form></div>";
echo $display_string;

$display_string = "<div><form class='form1'><h1>URGENT TASKS</h1><table border='2px'>";
$display_string .= "<tr>";
$display_string .= "<th>Status</th>";
$display_string .= "<th>Due Date</th>";
$display_string .= "<th>Title</th>";
$display_string .= "<th>Task</th>";
$display_string .= "<th>Urgency</th>";
$display_string .= "<th>Time Remaining</th>";
$display_string .= "<th>Delete </th>";
$display_string .= "<th>Edit</th>";
$display_string .= "</tr>";
echo $display_string;

foreach ($urgency as $product){
    $temp = "";
    if($product['urgency'] == 1){
        $temp = "Normal";
    }
    else if($product['urgency'] == 2){
        $temp = "Important";
    }
    else if($product['urgency'] == 3){
        $temp = "Very Important";
    }
    $idd = $product['id'];
    $d = strtotime($product['duedate']);
    $now = new DateTime();
    $future_date = new DateTime($product['duedate']);
    $interval = $future_date->diff($now);

    //echo $interval->format("%a D, %h H, %i M, %s S");

    echo "<tr><td><form action='index.php' method='get'>";
    echo "<input type='hidden' name='action' value='mark_complete'>";
    echo "<input type='hidden' name='taskID' value='$idd'>";
    echo "<input type='submit' value=' '>";
    echo"</form></td>";
    echo "<td>".date("M-d-y h:ia", $d)."</td>";
    echo "<td>".$product['title']."</td>";
    echo "<td>".$product['message']."</td>";
    echo "<td>".$temp."</td>";
    echo "<td>".$interval->format("%a D, %h H, %i M, %s S")."</td>";
    echo "<td><form action='index.php' method='get'>";
    echo "<input type='hidden' name='action' value='delete_task'>";
    echo "<input type='hidden' name='taskID' value='$idd'>";
    echo "<input type='submit' value='Delete'>";
    echo"</form></td>";
    echo "<td><form action='edit_task_form.php' method='get'>";
    echo "<input type='hidden' name='action' value='edit_task'>";
    echo "<input type='hidden' id ='taskID1' name='taskID1' value='$idd'>";
    echo "<input type='submit' value='Edit'>";

    echo"</form></td>";
    echo"</tr>";
}

$display_string = "</table></form></div>";
echo $display_string;

?>

