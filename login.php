<?php
$user_name = "root";
$password = "";
$database = "log2";
$host_name = "localhost";

$con = mysqli_connect($host_name ,$user_name ,$password,$database) or die("Error " .       mysqli_error($con));
	if (isset($_POST['login']))
		{
			$username = mysqli_real_escape_string($con, $_POST['user']);
			$password = mysqli_real_escape_string($con, $_POST['pass']);
 
			$query 		= mysqli_query($con, "SELECT * FROM users WHERE username='$username' and password='$password'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
 
			if ($num_row > 0) 
				{			
					$_SESSION['user_id']=$row['user_id'];
					header('location:home.php');
 
				}
			else
				{
					echo 'Invalid Username and Password Combination';
				}
		}
  ?>