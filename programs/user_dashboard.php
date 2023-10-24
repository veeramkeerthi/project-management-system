<?php 
    session_start();
    if(isset($_SESSION['email'])){

    
    include('includes/connection.php');
    if(isset($_POST['submit_leave'])){

        $query=" insert into leaves values(null,$_SESSION[uid],'$_POST[subject]','$_POST[message]','No Action')";

       
        $query_run=mysqli_query($connection,$query);
        if($query_run){

            echo"<script type='text/javascript'>
            alert('Form updated successfully...');
            window.location.href='user_dashboard.php';
            </script>
            ";
            }
        
        else{
            echo"<script type='text/javascript'>
            alert(' error ...please try again..');
            window.location.href='user_dashboard.php';
            </script>
            ";
        
        }
        
    }
?>

<!DOCTYPE html>
<html>
    <head>
    
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>User Dashboard</title>
    
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#manage_task").click(function(){
                $("#right_sidebar").load("task.php");
            });
        });
        $(document).ready(function(){
            $("#manage_task").click(function(){
                $("#right_sidebar").load("manage_task.php");
            });
        });
        $(document).ready(function(){
            $("#apply_leave").click(function(){
                $("#right_sidebar").load("leaveform.php");
            });
        });
        $(document).ready(function(){
            $("#leave_status").click(function(){
                $("#right_sidebar").load("leave_status.php");
            });
        });

    </script>
    </head>
    <body>
<div class="row" id="header">
    <div class="col-md-12">
        <div class="col-md-4" style="display: inline-block;">
            <h3>Project Mangement System</h3>
        </div>
            <div class="col-md-6" style="display: inline-block; text-align:right">
                <b>Email:</b> <?php  echo $_SESSION['email'];?>
                <span style="margin-left: 25px;"><b> Name: </b> <?php  echo $_SESSION['name'];?></span>
            

            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-2" id="left_sidebar">
        <table class="table"> 
            <tr>
            <td style="text-align: center;">
          <a href="user_dashboard.php" type="button" id="logout_link">Dashboard</a>
        </td> 
    </tr>
    <tr>
            <td style="text-align: center;">
          <a  type="button" class="link" id="manage_task">Update task</a>
        </td> 
    </tr>
    <tr>
            <td style="text-align: center;">
          <a type="button" class="link" id="apply_leave" >Apply leave</a>
          
        </td> 
    </tr>
    <tr>
            <td style="text-align: center;">
          <a type="button" class="link" id="leave_status">Leave status</a>
        </td> 
    </tr>
    <tr>
            <td style="text-align: center;">
          <a href="logout.php" type="button" id="logout_link">Logout</a>
        </td> 
    </tr>
</table>
    </div>
    <div class="col-md-10" id="right_sidebar">
        <h4> Instructions for Employees</h4>
        <ul style="line-height: 3em;font-size: 1.2em;list-style-type: none;">
            <li>1. All the employee should mark their attendance daily.</li>
            <li>2. Everyone must complete the task assigned to them.</li>
            <li>3. Kindly maintain decorum of the office.</li>
            <li>4. Keep office and yours area neat and clean.</li>

        </ul>

    </div>
</div>
</body>
</html>
<?php 
}
else{
    header('Location:user_login.php');
}
?>
