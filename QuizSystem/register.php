<?php
	include("connection.php");
	
	if(isset($_POST['register']))
	{
		$username		= mysqli_real_escape_string($con,$_POST['username']);
		$password		= mysqli_real_escape_string($con,$_POST['password']);
		$password2		= mysqli_real_escape_string($con,$_POST['password2']);
		$mobilenumber	= mysqli_real_escape_string($con,$_POST['mobilenumber']);
		$email			= mysqli_real_escape_string($con,$_POST['email']);
		
	
		$emailquery =" select * from user where email='$email' ";
		$query = mysqli_query($con,$emailquery);
		$sql = "INSERT INTO user( username, password, password2, mobilenumber, email) VALUES('$username', '$password', '$password2', '$mobilenumber', '$email')";
		$iquery =mysqli_query($con, $sql);
		$emailcount = mysqli_num_rows($query);
		if($emailcount>0)
		{
			session_start();
			$_SESSION["email"] = $email;
			$_SESSION["username"] = $username;

			$_SESSION['status'] = "Email Already Registered!!!";
			$_SESSION['status_code']="warning";
			header("refresh:0;location:register.php");
		}
		else
		{
			if($iquery)
			{
				$_SESSION['status'] = "Successfully Registered";
				$_SESSION['status_code']="success";
				header("refresh:2;url= login.php");
			}
			else
			{
				$_SESSION['status'] = "Not Registered";
				$_SESSION['status_code']="error";
				header("refresh:0;location: register.php");
			}
		}	
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Register page</title>
		<meta charset="utf-8">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		  
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

		<link rel="stylesheet" type="text/css" href="css\register.css">
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
            			<a class="nav-link" href="#">Register</a>
          			</li>
          			<li class="nav-item">
            			<a class="nav-link" href="contactus.php">ContactUs</a>
					</li>
				</ul>
      		</div>
    	</div>
  		</nav>

		<div class="login-page">
            <div class="form">
		
                <form class="register-form" id="form" name="form"  action="register.php" onSubmit="return validateForm()" method="post">
					<div class="form-control1">
						<label for="username">Username</label>
						<input type="text"  name="username" id="username" autocomplete="off" required>						
						<span id="usernameerror" style="color:red;font-size:15px;"></span>
					
						<label for="password">Password</label>
						<input type="password"  name="password" id="password"  autocomplete="off" required>
						<span id="passworderror" style="color:red;font-size:15px;"></span>
					
						<label for="password2">Confirm Password</label>
						<input type="password"  name="password2" id="password2"  autocomplete="off" required>
						<span id="password2error" style="color:red;font-size:15px;"></span>
					
						<label for="mobilenumber">Mobile Number</label>
						<input type="text"  name="mobilenumber" id="mobilenumber"  autocomplete="off" required >
						<span id="mobilenumbererror" style="color:red;font-size:15px;"></span>
					
						<label for="email">Email</label>
						<input type="text"  name="email" id="email" autocomplete="off" required>
					</div>
					<input type="submit" value="register" class="button" name="register" id="register">

					<p class="message">Already Registered? <a href="login.php"> Login </a> </p>		
				</form>

            </div>    
		</div>
		<script>
			function validateForm()
			{
				var username = document.form.username.value;
				var mobilenumber = document.form.mobilenumber.value;
				var password = document.form.password.value;
				var password2 = document.form.password2.value;
		
				var pattern = /^[A-Za-z]+$/;
				if (!username.match(pattern))
				{
					document.getElementById("usernameerror").innerHTML ="** Please use only characters **";
					return false;
				}
				if(isNaN(mobilenumber))
				{
					document.getElementById("mobilenumbererror").innerHTML ="** Please use only numbers **";
					return false;
				}
				if(mobilenumber.length<10)
				{
					document.getElementById("mobilenumbererror").innerHTML ="** Must enter 10 digits **";
					return false;
				}
				var x = document.form.email.value;
				var atpos = x.indexOf("@");
				var dotpos = x.lastIndexOf(".");
				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) 
				{
					alert("Not a valid e-mail address.");
					return false;
				}
				if(password.length<5 || password.length>25)
				{
					document.getElementById("passworderror").innerHTML ="** Passwords must be 5 to 25 characters long **";
					return false;
				}
				if(password != password2)
				{
					document.getElementById("password2error").innerHTML ="** Passwords must match **";
					return false;
				}	
			}	
		</script>
		
		<?php
		include('js/script1.php');
		?>
	</body>
</html>