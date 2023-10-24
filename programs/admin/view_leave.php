<?php 
include('../includes/connection.php');
?>

<!DOCTYPE html>
<html>
<body>
<center> <h3> All leave applications</h3></center><br>
<table class="table" style="background-color: whitesmoke;width: 75vw;">
<tr><th>S.No</th>

<th>User</th>

<th>Subject</th>

<th>Message
</th>
<th>Status
</th>
<th>Action</th>
</tr>
<?php 
$sno=1;
$query = "SELECT * FROM `leaves`";
$query_run=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($query_run)){


    ?>
<tr>
    <td> <?php  echo $sno; ?></td>
    <?php 
    $query1="select name from user where uid=$row[uid]";
    $query_run1=mysqli_query($connection,$query1);
    while($row1=mysqli_fetch_assoc($query_run1)){
        ?>
        <td> <?php  echo $row1['name']; ?></td>
   
   <?Php
    }

    ?>
    <td> <?php  echo $row['subject']; ?></td>
    <td> <?php  echo $row['message']; ?></td>
    <td> <?php  echo $row['status']; ?></td>
    
    <td><a href="approve_leave.php?id=<?php echo $row['lid'];?>" >Approve</a> | <a href="reject_leave.php?id=<?php echo $row['lid'];?>" >Reject</a></td>
</tr>
<?Php
$sno=$sno+1;
}
?>
</table>
    </body>
</html>