<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();

include_once 'connection.php';
	if (isset($_POST['save']))
	{	
// for sign up modal
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$age=$_POST['age'];
		$gender=$_POST['gender'];
		$user_name=$_POST['user_name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
// for post modal
		$category_id=$_POST['category_id'];
		$title=$_POST['title'];
		$content=$_POST['content'];
		$user_id=$_SESSION['user_id'];
		
		

		$sql = "INSERT INTO post (id,category_id,title,content,user_id) 
		VALUES (NULL,'$category_id','$title','$content','$user_id')";



		$sql1 = "INSERT INTO admin (id,first_name,last_name,age,gender,user_name,email,password) 
		VALUES (NULL, '$first_name','$last_name','$age','$gender','$user_name','$email','$password')";
		
		
		if (mysqli_query($conn, $sql)) {
			
			echo '<script>alert("data inserted successfully"); window.location.href="index.php";</script>';
		}else {
			echo ("error" .mysqli_error());
		}

		if (mysqli_query($conn, $sql1)) {
			
			echo '<script>alert("Account Created Successfully"); window.location.href="index.php";</script>';
		}else {
			echo ("error" .mysqli_error());
		}		

 
		
	}

?>