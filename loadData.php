<?php
// to get data from TODO Table
session_start();
$getemail=$_SESSION["email"];
$con=mysqli_connect("localhost","root","","vgec_php_task_1");
$query="SELECT * FROM `TODO` WHERE `Email`='$getemail'";
$result=mysqli_query($con,$query);
$output="";
if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
        $output.="<tr><td>{$row["Task Heading"]}</td><td>{$row["Task Description"]}</td><td>{$row["Task Date"]}</td><td><input type='button' value='Edit' class='btn btn-info text-white btn_edit' data-eid={$row["id"]}></td><td><input type='button' value='Delete' class='btn btn-danger btn_delete' data-id={$row["id"]}></td></tr>";
    }
    echo $output;
}
else{
    echo "<h2>No Record Found</h2>";
}


?>