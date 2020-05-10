<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
 session_start();
include_once 'connection.php';

        if (isset($_POST['login'])) {
          
          $email=$_POST['email'];  
          $pass=$_POST['pwd'];

            $record = mysqli_query($conn,"SELECT * FROM admin WHERE email='".$email."' and password='".$pass."'");
            $data = mysqli_fetch_array($record);
              
              $db_id=$data['id'];
              $db_uname=$data['user_name'];
              $db_email=$data['email'];
              $db_pass=$data['password'];

            
            if ($email == $db_email && $pass == $db_pass) {

              $_SESSION['user_id']=$db_id;
              $_SESSION['u_name']=$db_uname;
            	$_SESSION['username']=$db_email;
            	header("location:index.php");

            	 } else {
              echo '<script>alert("Invalid Username or Password.!"); window.location.href="index.php";</script>';
              
            }
            }
            if (isset($_GET['logout'])) {

              unset($_SESSION['user_id']);
            	unset($_SESSION['username']);
            	
              		session_destroy();
            	
              header("location:index.php");
          }
?>