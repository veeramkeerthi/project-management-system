<?php
include('../includes/connection.php');
$query="delete from task where tid=$_GET[id]";
$query_run=mysqli_query($connection,$query);
if($query_run){
    echo"<script type='text/javascript'>
    alert('task   deleted successfully...');
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



?>