<?php
$con=mysqli_connect("localhost","root","","vgec_php_task_1");
$delTodo=$_REQUEST["id"];
$query="DELETE FROM `todo` WHERE `id`=$delTodo";
if(mysqli_query($con,$query))
{
    echo 1;
}
else
{
    echo 0;
}
?>