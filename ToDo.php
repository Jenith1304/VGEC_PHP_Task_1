<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
if(!isset($_SESSION["login"]))
{
    ?><script> alert("You are not currently logged In,Please Log In and Try Again");window.location.href = "Login.php"</script> <?php
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>ToDo List</title>
</head>
<body>
    <!-- navbar -->
<?php include 'navbar.php'; ?>
    <!-- modal for edit -->
    <div class="modal" tabindex="-1" role="dialog" id="modaldisp">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class='modal-header'>
            <h5 class='modal-title'>ToDo List Edit</h5>
        </div>
        <div id="content"></div>
        <div class='modal-footer'>
        <button type='button' class='btn btn-primary'id ="btn_save">Save changes</button>
        <button type='button' class='btn btn-secondary' data-dismiss='modal' id='btn_close2'>Close</button>
      </div>
    </div>
    </div>
    </div>
<form id="formData">
    <div class="container mt-5 border border-dark rounded" style="max-width:620px">
                <div class="form-group mt-2">
                    <label >Task Heading</label>
                    <input type="text" class="form-control" id= "taskHeading" name="taskHeading"  required >
                 </div>
                 <div class="form-group mt-2">
                    <label >Task Description</label>
                    <input type="text" class="form-control" name="taskDesc" id="taskDesc"  required >
                 </div>
                 <div class="form-group mt-2">
                    <label >Date</label>
                    <input type="Date" class="form-control" name="taskDate"  id="taskDate">
                 </div>
                <div class="form-group mt-3 mb-2 ">
                <input type="submit" id="btn_Add" name="btn_Add" class="btn btn-success" value="ADD">
                </div>
    </div> 
</form>
<div id="error_message"></div>
<div id="success_message"></div>

<div class="table-responsive-md">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Heading</th>
      <th scope="col">Description</th>
      <th scope="col">Date</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody id="todoData">
  </tbody>
</table>
</div>

</body>
</html>
<script type="text/javascript">
    //Load Data From Database on Load of Page
    $(document).ready(function()
    {
        function loadData()
        {
            $.ajax({
            url:"loadData.php",
            type:"POST",
            success:function(data)
            {
                $("#todoData").html(data);
            }
        });   
        }
        loadData();

        //to insert data in database
        $("#btn_Add").on("click",function(e){
            e.preventDefault();
            var taskHeading=$("#taskHeading").val();
            var taskDesc=$("#taskDesc").val();
            var taskDate=$("#taskDate").val();
            if(taskHeading == ""|| taskDesc == "" || taskDate =="")
            {
                $("#error_message").html("All Fields Are Required").slideDown();
                $("#success_message").slideUp();
            }else
            {
            $.ajax({
                url:"insertData.php",
                type:"POST",
                data:{task_head:taskHeading,task_desc:taskDesc, task_date:taskDate},
                success:function(data)
                {
                    if(data==1)
                    {
                    loadData();
                    $("#success_message").html("ToDo Added Successfully").slideDown();
                     $("#error_message").slideUp();
                    //to clearform details
                    $("#formData").trigger("reset");
                    }
                    else
                    {    
                    $("#error_message").html("Can't Add ToDo").slideDown();
                     $("#success_message").slideUp();
                    }
                }    
                });
            }
        });
        // to delete Todo
        $(document).on("click",".btn_delete",function()
        {
            if(confirm("Do you really want to delete this record:"))
            {
            var todoId=$(this).data("id");
            var elmt= this;
            $.ajax({
                url:"deleteData.php",
                type:"POST",
                data:{id:todoId},
                success:function(data)
                {
                    if(data==1)
                    {
                        $(elmt).closest("tr").fadeOut();
                    }
                    else
                    {
                    $("#error_message").html("Can't  Delete  ToDo").slideDown();
                     $("#success_message").slideUp();
                    }
                }
            });
            }
        });
        //to display data from table in modal textboxes 
        $(document).on("click",".btn_edit",function()
        {
            $("#modaldisp").show();
            var editid=$(this).data("eid");
            $.ajax({
                url:"loadUpdated.php",
                type:"POST",
                data:{eid:editid},
                success:function(data)
                {
                    $("#content").html(data);
                }
            });

        });
        //to get data from edit modal to update
        $(document).on("click","#btn_save",function()
        {
            var newTaskid=$("#taskid").val();
            var newTaskHead=$("#taskHeadingEdit").val();
            var newTaskDesc=$("#taskDescEdit").val();
            var newTaskDate=$("#taskDateEdit").val();
            $.ajax({
                url:"updateData.php",
                type:"POST",
                data:{nth:newTaskHead,ntd:newTaskDesc,ntdt:newTaskDate,ntid:newTaskid},
                success:function(data)
                {
                    if(data == 1)
                    {
                        $("#modaldisp").hide();
                        loadData();
                    }
                }
            });
        });
        // to close edit modal
        $("#btn_close2").on("click",function()
        {
            $("#modaldisp").hide();
        });
    });  
    //prevent selection of previous dates
$(function(){
        var dtToday = new Date();
 
         var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
         var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
        day = '0' + day.toString();
    
        var maxDate = year + '-' + month + '-' + day;
        $('#taskDate').attr('min', maxDate);
});

 
</script>