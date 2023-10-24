<?php 
session_start();
include('includes/connection.php');

?>

<!DOCTYPE html>
<html>
    <head>
    
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        
    
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
<center> <h3> our task<br>
</h3></center>
<table class="table" style="background-color: whitesmoke;width: 75vw;">
    <tr>
        <th>S.No</th>
        <th>Task ID</th>
        <th>Description</th>
        <th>start_date</th>
        <th>end_date</th>
        <th>status</th>
        <th>Action</th>
    </tr>
    <?php 
    $sno=1;
    $query= "select * from task where uid =$_SESSION[uid]";
    $query_run=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($query_run)){
        ?>
    <tr>
    <td> <?php  echo $sno; ?> </td>
        <td> <?php echo $row['tid']; ?></td>
        <td><?php echo $row['description']; ?> </td>
        <td><?php echo $row['start_date']; ?> </td>
        <td><?php echo $row['end_date']; ?> </td>
        <td><?php echo $row['status']; ?> </td>
        <td> <a href="update_status.php?id=<?php echo$row['tid'];?>">Update</a></td>
    </tr>
    <?php
$sno = $sno + 1;
}

    ?>
</table>
    </body>