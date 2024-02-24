<?php
session_start();
$con=mysqli_connect("localhost","root","","vgec_php_task_1");
$getemailforupdate=$_SESSION["email"];
//to update data given by user from modal
$newid=$_REQUEST["ntid"];
$newhead=$_REQUEST["nth"];
$newdesc=$_REQUEST["ntd"];
$newdate=$_REQUEST["ntdt"];
$query="UPDATE `todo` SET `Task Heading`='$newhead',`Task Description`='$newdesc',`Task Date`='$newdate' WHERE `id`=$newid AND `Email`='$getemailforupdate'";
if(mysqli_query($con,$query))
{
    echo 1;
}
else
{
    echo 0;
}
?>