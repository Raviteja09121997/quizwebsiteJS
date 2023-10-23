<!doctype html>
<html>
	<head>
		<title>EXAM_TIME</title>
		
		<meta charset="utf-8">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
		
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

        <link href="css\index.css" rel="stylesheet" type="text/css" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css2?family=Candal&display=swap" rel="stylesheet" type="text/css" />
	</head>
    <body>

        <!--Navbar-->

        <nav class="navbar navbar-expand-sm navbar-dark">
            <a class="navbar-brand" href="#"><img src="IMG/indexlogo3.png" ></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <i class="fa fa-home"><span>&nbsp; Home</span></i>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">login</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="admin.php"><i class="fa fa-user-circle fa-lg" style="color:dodgerblue"></i>Admin</a>
                            <a class="dropdown-item" href="login.php"><i class="menu-icon fa fa-user fa-lg" style="color:darkslategrey"></i>user</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactuspage.php">ContactUs</a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <!--Image Slideshow-->
        
        <div id="demo" class="carousel slide  carousel-fade" data-ride="carousel" data-interval="2000">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
                <li data-target="#demo" data-slide-to="3"></li>
            </ul>
            <!-- The slideshow -->
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <center><img src="IMG/bg2.jpg" class="d-block img-fluid" >
                </div>
                <div class="carousel-item">
                    <center><img src="IMG/bg3.jpg" class="d-block img-fluid">
                </div>
                <div class="carousel-item">
                    <center><img src="IMG/bg1.jpg" class="d-block img-fluid">
                </div>
                <div class="carousel-item">
                    <center><img src="IMG/bg4.jpg" class="d-block img-fluid">
                </div>
            </div>
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>

        <h1>Welcome To Our Website</h1>

        <!--Books slider-->
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 ">
                <div id="demo1" class="carousel slide" data-ride="carousel">
                    <!-- Left and right controls -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 mb-4">
                                <a class="carousel-control-prev" href="#demo1" data-slide="prev" role="button"><span class="carousel-control-prev-icon"></span></a>
                                <a class="carousel-control-next" href="#demo1" data-slide="next" role="button"><span class="carousel-control-next-icon"></span></a>
                            </div>
                        </div>
                    </div>
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <!--1st slide-->
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="row">
                                
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="card">
                                            <div class="card-img-top card-img-top-250">
                                                <img src="IMG\b1.jpg" class="img-fluid" >
                                            </div>
                                            <div class="card-header"><h3>Database System</h3></div>
                                            <div class="card-block">
                                                <i class="fas fa-user" style="color: red">Codd.Edgar Frank</i>  &nbsp;  <i class="fas fa-calendar" style="color: darkcyan"> Mar 8,1960</i>
                                                <a href="https://en.wikipedia.org/wiki/Database#:~:text=A%20database%20is%20an%20organized,electronically%20from%20a%20computer%20system.&text=The%20database%20management%20system%20(DBMS,capture%20and%20analyze%20the%20data." class="btn btn-primary">click here</a>
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="card">
                                            <div class="card-img-top card-img-top-250">
                                                <img src="IMG\b4.jpg" class="img-fluid" >
                                            </div>
                                            <div class="card-header"><h3>Java</h3></div>
                                            <div class="card-block">
                                                <i class="fas fa-user" style="color: red">James Gosling</i>  &nbsp;  <i class="fas fa-calendar" style="color: darkcyan"> May 23,1995</i>
                                                <a href="https://en.wikipedia.org/wiki/Java_(programming_language)" class="btn btn-primary">click here</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <div class="card">
                                            <div class="card-img-top card-img-top-250">
                                                <img src="IMG\b3.jpg" class="img-fluid" >
                                            </div>
                                            <div class="card-header"><h3>Python</h3></div>
                                            <div class="card-block">                       
                                                <i class="fas fa-user" style="color: red">Guido van Rossum</i>  &nbsp;  <i class="fas fa-calendar" style="color: darkcyan"> Dec 12,1989</i>
                                                <a href="https://en.wikipedia.org/wiki/Python_(programming_language)" class="btn btn-primary">click here</a>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                        <!--2nd slide-->
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row">
                                    
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="card">
                                            <div class="card-img-top card-img-top-250">
                                                <img src="IMG\b5.jpg" class="img-fluid" >
                                            </div>
                                            <div class="card-header"><h3>C</h3></div>
                                            <div class="card-block">
                                                <i class="fas fa-user" style="color: red">Dennis M.Ritchie</i>  &nbsp;  <i class="fas fa-calendar" style="color: darkcyan"> July 9,1972</i>
                                                <a href="https://en.wikipedia.org/wiki/C_(programming_language)" class="btn btn-primary">click here</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <div class="card">
                                            <div class="card-img-top card-img-top-250">
                                                <img src="IMG\b6.jpg" class="img-fluid" >
                                            </div>
                                            <div class="card-header"><h3>C++</h3></div>
                                            <div class="card-block">        
                                                <i class="fas fa-user" style="color: red">Bjrne Stroustrup</i>  &nbsp;  <i class="fas fa-calendar" style="color: darkcyan"> Mar 8,1960</i>
                                                <a href="https://en.wikipedia.org/wiki/C%2B%2B" class="btn btn-primary">click here</a>
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="card">
                                            <div class="card-img-top card-img-top-250">
                                                <img src="IMG\b7.jpg" class="img-fluid" >
                                            </div>
                                            <div class="card-header"><h3>Go Lang </h3></div>
                                            <div class="card-block">    
                                                <i class="fas fa-user" style="color: red">Robert Griesemer</i>  &nbsp;  <i class="fas fa-calendar" style="color: darkcyan"> May 23,1995</i>
                                                <a href="https://en.wikipedia.org/wiki/Go_(programming_language)#:~:text=Go%20is%20a%20statically%20typed,%2C%20and%20CSP%2Dstyle%20concurrency." class="btn btn-primary">click here</a>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>            
        </div>
        </div>
        <br><br>
        <!--footer-->

        <footer id="footer">

            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 footer-info">
                            <h3>ExamTime</h3>
                            <p>This website will provide you to take exam online and thus saves your time to go far away.There are different kinds of
						        subjects provided for exam purpose. Candidate can select any subject and take exam.System provides the facility to check attempted papers and shows 
						        result after submitting.
                            </p>
                        </div>

                        <div class="col-lg-4 col-md-6 footer-links">
                            <h2>Quick links</h2>
					        <ul>
						        <li><a href="#">Events</a></li>
						        <li><a href="#">Developers</a></li>
						        <li><a href="#">Questions</a></li>
						        <li><a href="#">Gallery</a></li>
						        <li><a href="#">Schedules</a></li>
					        </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-contact">
                            <span><i class="fas fa-phone" style="color:limegreen"></i> &nbsp; 123-456-789</span><br>
                            <span><i class="fas fa-envelope" style="color: yellow"></i> &nbsp; info@examtime.com</span>
                            <div class="social">
							    <a href="#" style="color: dodgerblue"><i class="fab fa-facebook fa-lg"></i></a>&nbsp;
							    <a href="#" style="color:crimson"><i class="fab fa-instagram fa-lg"></i></a>&nbsp;
							    <a href="#" style="color: cyan"><i class="fab fa-twitter fa-lg"></i></a>&nbsp;
							    <a href="#" style="color: red"><i class="fab fa-youtube fa-lg"></i></a>&nbsp;
						    </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="copyright">
                    &copy; Examtime.com | Designed by Raviteja
                </div>
            </div>

        </footer>

    </body>
</html>
