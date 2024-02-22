<?php
$con=mysqli_connect("localhost","root","","vgec_php_task_1");
//retriving data from ToDO.php to insert
$task_head=$_REQUEST["task_head"];
$task_date=$_REQUEST["task_date"];
$task_desc=$_REQUEST["task_desc"];
$query="INSERT INTO `todo`( `Task Heading`, `Task Description`, `Task Date`) VALUES ('$task_head','$task_date','$task_desc')";
if(mysqli_query($con,$query))
{
    echo 1;
}
else
{
    echo 2;
}
?>