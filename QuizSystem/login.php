<?php
	include("connection.php");
	session_start();
	if(isset($_POST['login']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$email_search = "select * from user where email='$email' and password='$password'";
		$query = mysqli_query($con,$email_search);
		$email_count = mysqli_num_rows($query);

		if($email_count)
		{	
			while($result = mysqli_fetch_array($query))
			{
				$username = $result['username'];
			}
			$_SESSION["username"] = $username;
			$_SESSION["email"] = $email;
			
			$_SESSION['status'] = "Successfully Logged";
			$_SESSION['status_code']="success";
			header("refresh:2;url= userpanel.php");
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
		<title>Login page</title>
		<meta charset="utf-8">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">  
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

		<link rel="stylesheet" type="text/css" href="css/login.css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" type="text/css" />
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
            			<a class="nav-link" href="#">Login</a>
          			</li>
          			<li class="nav-item">
            			<a class="nav-link" href="contactus.php">ContactUs</a>
					</li>
				</ul>
      		</div>
    	</div>
  		</nav>

		
			<div class="col-lg-5 m-auto">
				<div class="card mt-5 bg-dark">
					<div class="card-title text-center mt-3">
						<img src="IMG/avatar.png" width="200px" height="130px">
					</div>
					<center><h4 style="color: darkkhaki">USER LOGIN</h4></center>
					<div class="card-body">
						<form method="POST" action="login.php">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-user"></i></span>
								</div>
								<input type="email" class="form-control" id="email" name="email" autocomplete="off" placeholder="EmailID">
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="fa fa-lock"></i>
									</span>
								</div>
								<input type="password" class="form-control" id="password" name="password" autocomplete="off" placeholder="password">
							</div>
							<input type="submit" value="Login" class="btn btn-success" id="login" name="login"><br>
								<a href="#" style="color: aqua">Forget Password?</a>
								<p class="float-right text-white"><input type="checkbox">Remember Me </p>
							<p class="text-center text-white">Not Registered? <a href="register.php"> Register </a></p>		
						</form>
					</div>
				</div>
			</div>
		<?php
		include('js/script1.php');
		?>
		
	</body>
</html>