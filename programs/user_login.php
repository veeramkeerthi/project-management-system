<?php
session_start();
include('includes/connection.php');
if(isset($_POST['userLogin'])){
    $query="select email,password,name,uid from user where email='$_POST[email]'AND password='$_POST[password]'";
    $query_run=mysqli_query($connection,$query);
    if(mysqli_num_rows($query_run)){
        while($row=mysqli_fetch_assoc($query_run)){
            $_SESSION['email']=$row['email'];
            $_SESSION['name']=$row['name'];
            $_SESSION['uid']=$row['uid'];
            
        }

        echo"<script type='text/javascript'>

        window.location.href='user_dashboard.php';
        </script>
        ";

    }
else{
    echo"<script type='text/javascript'>
        alert('please enter correct details');
        window.location.href='user_login.php';
        </script>
        ";

}
}
?>







<!DOCTYPE html>
<html>
    <head>
        <title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>pMS Login page </title>
            
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="row">
            <div class="col-md-3 m-auto " id="login_home_page">
                <center> <h3 style="background-color: #5a8f7b;padding: 4px; width: 15vw;">User Login</h3></center>
                <form action="" method="post"> 
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                    </div>
                    <div class="form-group">
                       <center> <input type="submit" name="userLogin" value="Login" class="btn btn-warning" ></center>
                    </div>
                </form>

                <center><a href="index.php" class="btn btn-danger"> Go to home</a></center>
            </div>
        </div>
    </body>
</html>