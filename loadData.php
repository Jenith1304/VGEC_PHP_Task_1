<?php
// to get data from TODO Table
$con=mysqli_connect("localhost","root","","vgec_php_task_1");
$query="SELECT * FROM `TODO`";
$result=mysqli_query($con,$query);
$output="";
if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
        $output.="<tr><td>{$row["Task Heading"]}</td><td>{$row["Task Description"]}</td><td>{$row["Task Date"]}</td></tr>";
    }
    echo $output;
}
else{
    echo "<h2>No Record Found</h2>";
}


?>