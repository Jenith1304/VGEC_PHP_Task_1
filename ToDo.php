<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>ToDo List</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
         <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">To Do List </span>
        </div>
    </nav>

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
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Headind</th>
      <th scope="col">Description</th>
      <th scope="col">Date</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody id="todoData">
  </tbody>
</table>
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
            $.ajax({
                url:"insertData.php",
                type:"POST",
                data:{task_head:taskHeading,task_desc:taskDesc, task_date:taskDate},
                success:function(data)
                {
                    if(data==1)
                    {
                    loadData();
                    }
                    else
                    {
                        alert("Can't Save Record");
                    }
                }    
                });
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