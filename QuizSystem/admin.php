<?php
	include("connection.php");
	
	if(isset($_POST['signin']))
	{
		$email = $_POST['ademail'];
		$password = $_POST['password'];

		$email_search = "select * from admin where email='$email' and password='$password'";
		$query = mysqli_query($con,$email_search);
		$email_count = mysqli_num_rows($query);

		if($email_count)
		{	
			session_start();
			if(isset($_SESSION['email']))
			{
				session_unset();
			}
				$_SESSION["username"] = 'Admin';
				$_SESSION["key"] ='ravi09121997';
				$_SESSION["email"] = $email;	
			$_SESSION['status'] = "Successfully Logged";
			$_SESSION['status_code']="success";
			header("refresh:2;url= adminpanel.php");
		}
		else
		{
			$_SESSION['status'] = "Invalid Email or Password";
			$_SESSION['status_code']="error";
			header("refresh:0;location:register.php");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">  
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css2?family=Anton" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark">
    	<div class="container">
      		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        		<span class="navbar-toggler-icon"></span>
      		</button>
      		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  	<ul class="navbar-nav nav-flex-icons mr-auto">
          			<li class="nav-item">
            			<a href="index.php" class="nav-link border border-light rounded"><i class="fa fa-home"></i> EXAM TIME</a>
          			</li>
        		</ul>
        		<ul class="navbar-nav ml-auto">
          			<li class="nav-item active">
            			<a class="nav-link" href="#">Admin</a>
          			</li>
          			<li class="nav-item">
            			<a class="nav-link" href="contactus.php">ContactUs</a>
					</li>
				</ul>
      		</div>
    	</div>
  	</nav>

	<div class="backimg">
		<div class="loginForm">
			<h2> ADMIN LOGIN</h2>
			<div>
		 		<img src="IMG/adminicon.jpg">
		 	</div>
		 	<form method="POST" action="admin.php">
				<label> EmailID</label>
				<i class="fa fa-user"></i>
				<input type="text" name="ademail" id="ademail" autocomplete="off">
				 
				<label> Password </label>
				<i class="fa fa-key"></i>
				<input type="password" name="password" id="password" autocomplete="off">
				 
		 		<a href="#"> Forgot password? </a>
		 		<input type="submit" name="signin" value="signin" id="login">
		 	</form>
		</div>
	</div>
	<?php
		include('js/script1.php');
	?>
</body>
</html>