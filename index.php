<?php
	session_start();
	require 'dbconfig/config.php';

	if(isset($_SESSION['username']))
	{
		session_unset();
		session_destroy();
	}
	
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#7f8c8d">

	<div id = "main-wrapper">
		<center>
			<h2>Login Form</h2>
			<img src = "Images/loginImg.png" class = "LoginImage"/>
		</center>
	
	
	<form class="myform" action="index.php" method="post">
		<label><b>Username</b></label>
		<input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br>
		<label><b>Password</b></label>
		<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
		<input name="login" type="submit" id="signin_btn" value="Sign In"/><br>
		<a href="signup.php"><input type="button" id="signup_btn" value="Sign Up"/></a>
	</form>
	
	<?php
		if(isset($_POST['login']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$type = "";
			
			$query = "SELECT * FROM login WHERE username = '$username' AND password='$password'";
			$query_run = mysqli_query($con,$query);
			
			if ($query_run){
				while($row=mysqli_fetch_row($query_run))
				{
					$type = $row[8];
				}
			}
				
			
			if(mysqli_num_rows($query_run)>0)
			{
					$_SESSION['username']=$username;
					if($type=="Farmer")
					{
					header("location:view/farmer/home.php");
					}
					if($type=="Paddy Marketing Board" or $type=="Mill Owner" or $type=="Store Owner")
					{
					header("location:view/buyer/home.php");	
					}
					if($type=="Fertilizer Seller")
					{
					header("location:view/fertilizer/home.php");	
					}
					if($type=="Agrarian Service")
					{
					header("location:view/agrarianservicecenter/agrarianhome.php");	
					}
			}
			else
			{
				echo '<script type = "text/javascript">alert("Invalid Credentials.")</script>';
			}
		}
	?>
	</div>
</body>
</html>