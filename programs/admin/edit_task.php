
<?php  
include('../includes/connection.php');
if(isset($_POST['edit_task'])){
    $query="update task set uid=$_POST[id],description='$_POST[description]',start_date='$_POST[start_date]',end_date='$_POST[end_date]'where tid =$_GET[id]";
    $query_run=mysqli_query($connection,$query);
    if($query_run){
        echo"<script type='text/javascript'>
    alert('task   updated successfully...');
    window.location.href='admin_dashboard.php';
    </script>
    ";
    }

else{
    echo"<script type='text/javascript'>
    alert(' Error please try again..');
    window.location.href='admin_dashboard.php';
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
        <title> etms</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <div class="row" id="header">
            <div class="col-md-12">
                <h3 ><i class="fa fa-solid fa-list" style="padding-right: 15px;"></i> Task management system</h3>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4 m-auto" style="color: white;"><br>
                <h3 style="color: white;"> Edit the task</h3><br>
                <?php  
                $query="select * from task where tid=$_GET[id]";
                $query_run=mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($query_run)){
                    ?>
                
                
            
                <form action="" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" value="" required>
                
                    </div>
                    <div class="form-group">
                            <label>select user:</label>
                            <select class="form-control" name="id" required>
                                <option> -Select-</option>
                                <?php
                                include('../includes/connection.php');
                                $query1="select uid,name from user";
                                $query_run1=mysqli_query($connection,$query1);
                                if(mysqli_num_rows($query_run1)){
                                while($row1=mysqli_fetch_assoc($query_run1)){
                                ?>
                                <option value="<?php echo $row1['uid']?>">
                            <?php  echo $row1['name'];?> 
                             </option>
                             <?php
                                }    
                                }
                        ?>
                                
                               
                            </select>

                        </div>
    <div class="form-group">
<label> Description</label>
<textarea class="form-control" rows="3" cols="50" name="description" required> <?php echo $row['description']; ?></textarea>
</div>
<div class="form-group">
    <label> Start date:</label>
   <input type="date" class="form-control" name="start_date" value="<?php  echo $row['start_date'];?>" required>

</div>
<div class="form-group">
    <label> End date:</label>
   <input type="date" class="form-control" name="end_date"  value="<?php  echo $row['end_date'];?>" required>

</div>
<input type="submit" class="btn btn-warning" name="edit_task" value="update" >
                    </form>
                    <?php 
                }
                    ?>
                </div>
            </div>
                
    </body>
</html>