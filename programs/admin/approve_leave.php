<?php
include('../includes/connection.php');
$query = "UPDATE `leaves` SET status = 'Approved' WHERE lid = '$_GET[id]'";
$query_run=mysqli_query($connection,$query);
if($query_run){
    echo"<script type='text/javascript'>
        alert('Leave status updated sucessfully');
        window.location.href='admin_dashboard.php';
        </script>
        ";
}
else{
    echo"<script type='text/javascript'>
        alert('Please try again');
        window.location.href='admin_dashboard.php';
        </script>
        ";
}
?>