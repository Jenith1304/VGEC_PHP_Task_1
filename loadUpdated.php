<?php
// to get data from TODO Table in edit modal
$edit_id=$_REQUEST['eid'];
$con=mysqli_connect('localhost','root','','vgec_php_task_1');
$query="SELECT * FROM `TODO` where `id` = $edit_id";
$result=mysqli_query($con,$query);
$output='';
if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
        $output.=" 
      <div class='modal-body'>
        <p>Task Heading</p>
        <input type='text' class='form-control' id= 'taskHeadingEdit' name='txt_taskHeadingEdit' value='{$row["Task Heading"]}' required >
        <input type='hidden' id='taskid' value={$row["id"]}>
      </div>
      <div class='modal-body'>
        <p>Task Description</p>
        <input type='text' class='form-control' id= 'taskDescEdit' name='txt_taskDescEdit' value='{$row["Task Description"]}' required >
      </div>
      <div class='modal-body'>
        <p>Task Date</p>
        <input type='date' class='form-control' id='taskDateEdit' name='txt_taskDateEdit' value='{$row["Task Date"]}' required >
      </div>";
    }
    echo $output;
}
else{
    echo "<h2>No Record Found</h2>";
}


?>