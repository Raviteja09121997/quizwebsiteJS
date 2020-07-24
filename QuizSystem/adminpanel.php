<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/adminpanel.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <aside  class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="adminpanel.php?q=0">Dashboard</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="./"><i class="menu-icon fa fa-home"></i>Home</a></li>
                    <li><a href="adminpanel.php?q=1"><i class="menu-icon fa fa-dashboard"></i>User</a></li>
                    <li><a href="adminpanel.php?q=2"><i class="menu-icon fa fa-dashboard"></i>Rank</a></li>
                    <li><a href="adminpanel.php?q=4"><i class="menu-icon fa fa-plus"></i>Add Category</a></li>
                    <li><a href="adminpanel.php?q=5"><i class="menu-icon fa fa-minus"></i>Remove Category</a></li>
                </ul>
            </div>
        </nav>
    </aside>

    <div id="right-panel" class="right-panel">

        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                <?php
                    include("connection.php");
                    session_start();
                    $email=$_SESSION['email'];
                    if(!(isset($_SESSION['email'])))
                    {
                        header("location:index.php");
                    }
                    else
                    {
                        $username = $_SESSION['username'];
                        include("connection.php");
                        echo '<span class="pull-right top title1" ><span class="log1"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="userpanel.php" class="log log1">'.$username.'</a></span>';
                    }
                ?>

                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img class="user-avatar rounded-circle" src="IMG/adminicon.jpg" style="width:50px;height:50px">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="adminlogout.php" style="color:red"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <!-- Dashboard -->

                                <?php 
                                    if(@$_GET['q']==0)
                                    {
                                        $category_search = "SELECT * FROM category ORDER BY date DESC";
                                        $query1 = mysqli_query($con,$category_search) or die('Error');
                                        echo  '<table class="table table-striped title1">
                                        <tr><td><center><b>S.N.</b></center></td><td><center><b>Category</b></center></td><td><center><b>Total questions</b></center></td><td><center><b>Marks</b></center></td><td><center><b>Time limit</b></center></td><td></td></tr>';
                                        $count=1;
                                        while($result = mysqli_fetch_array($query1)) 
                                        {
                                        	$eid = $result['eid'];
	                                    	$category = $result['category'];
	                                    	$total = $result['total'];
	                                    	$sahi = $result['sahi'];
											$time = $result['time'];
											$query2 = mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
											$rowcount=mysqli_num_rows($query2);
											if($rowcount == 0)
											{
	                                    		echo '<tr><td><center>'.$count++.'</center></td><td><center>'.$category.'</center></td><td><center>'.$total.'</center></td><td><center>'.$sahi*$total.'</center></td><td><center>'.$time.'&nbsp;min</center></td>
												<td><b><a href="update.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;<span class="title1"><b>Start</b></span></a></b></td></tr>';
											}
											else
											{
												echo '<tr style="color:#99cc32"><td><center>'.$count++.'</center></td><td><center>'.$category.'&nbsp;<i class="fa fa-check" aria-hidden="true"></i></center></td><td><center>'.$total.'</center></td><td><center>'.$sahi*$total.'</center></td><td><center>'.$time.'&nbsp;min</center></td>
												<td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:red"><i class="fa fa-repeat" aria-hidden="true"></i>&nbsp;<span class="title1"><b>Restart</b></span></a></b></td></tr>';
											}
                                        }
                                    	$count=0;
                                    	echo '</table>';
                                    }
                                ?>

                                <!--display & delete users-->

                                <?php 
                                    if(@$_GET['q']==1) 
                                    {
                                        $user_search = "SELECT * FROM user ORDER BY username ASC";
                                        $query = mysqli_query($con,$user_search);
                                        echo  '<table class="table table-striped title1">
                                        <tr><td><center><b>S.N</b></center></td><td><center><b>Name</b></center></td><td><center><b>Email</b></center></td><td><center><b>Mobile</b></center></td><td><center><b>Action</b></center></td></tr>';
                                        $count=1;
                                        while($result = mysqli_fetch_array($query)) 
                                        {
                                            $name = $result['username'];
                                            $email = $result['email'];
                                            $mobile = $result['mobilenumber'];
                                            echo '<tr><td><center>'.$count++.'</center></td><td><center>'.$name.'</center></td><td><center>'.$email.'</center></td><td><center>'.$mobile.'</center></td><td><center><a href="update.php?demail='.$email.'"><i class="fa fa-trash fa-lg"></i></a></center></td></tr>';
                                        }
                                        $count=0;
                                        echo '</table>';
                                    }
                                ?>

                                <!--rank-->

                                <?php
									if(@$_GET['q']== 2) 
									{
										$q=mysqli_query($con,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
										echo  '<div class="panel title"><div class="table-responsive">
										<table class="table table-striped title1" >
										<tr style="color:red"><td><b>Rank</b></td><td><b>Name</b></td><td><b>Score</b></td></tr>';
										$count=0;
										while($result=mysqli_fetch_array($q) )
										{
											$e=$result['email'];
											$s=$result['score'];
											$q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error231');
											while($result=mysqli_fetch_array($q12) )
											{
												$username=$result['username'];
											}
											$count++;
											echo '<tr><td style="color:#99cc32"><b>'.$count.'</b></td><td>'.$username.'</td><td>'.$s.'</td><td>';
										}
										echo '</table></div></div>';
									}
								?>

                                <!-- add category -->

                                <?php
                                    if(@$_GET['q']==4)
                                    {
                                        echo 
                                       '<div class="row">
                                        <span style="margin-left:40%;font-size:30px;">
                                        <b>Enter New Category</b></span>
                                        <div class="col-md-3">
                                        </div>
                                        <div class="col-md-6">
                                            <form class="form-horizontal title1" name="categoryform" action="update.php?q=addcategory"  method="POST">
                                            
                                                <div class="form-group">
                                                    <label class="col-md-12 control-label" for="category"></label>
                                                    <div class="col-md-12">
                                                        <input id="category" name="category" placeholder="Category Title" autocomplete="off" class="form-control input-md" type="text">
                                                    </div>
                                                </div> 
                                            
                                                <div class="form-group">
                                                    <label class="col-md-12 control-label" for="total"></label>  
                                                    <div class="col-md-12">
                                                        <input id="total" name="total" placeholder="Total no of questions" autocomplete="off" class="form-control input-md" type="number">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-12 control-label" for="right"></label>  
                                                    <div class="col-md-12">
                                                        <input id="right" name="right" placeholder="Marks on right answer" autocomplete="off" class="form-control input-md" min="0" type="number">    
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-12 control-label" for="wrong"></label>  
                                                    <div class="col-md-12">
                                                        <input id="wrong" name="wrong" placeholder="Minus marks on wrong answer" autocomplete="off" class="form-control input-md" min="0" type="number">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-12 control-label" for="time"></label>  
                                                    <div class="col-md-12">
                                                        <input id="time" name="time" placeholder="Time in minutes" class="form-control input-md" min="1" type="number">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-12 control-label"></label>
                                                    <div class="col-md-12"> 
                                                        <input  type="submit" style="margin-left:45%" class="btn btn-success" value="Add" name="addcategory">
                                                    </div>
                                                </div>
                                            
                                            </form>
                                        </div>';
                                    }
                                ?>

                                <!-- add questions -->

                                <?php
                                    if(@$_GET['q']==4 && (@$_GET['step'])==2 ) 
                                    {
                                        echo 
                                        '<div class="row">
                                            <br />
                                            <span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span>
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal title1" name="quetionsform" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">';
                                                    for($i=1;$i<=@$_GET['n'];$i++)
                                                    {
                                                        echo 
                                                        '<b>Question number&nbsp;'.$i.'&nbsp;:</><br />
                                                        <div class="form-group">
                                                            <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
                                                            <div class="col-md-12">
                                                                <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>  
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12 control-label" for="'.$i.'1"></label>  
                                                            <div class="col-md-12">
                                                                <input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option a" class="form-control input-md" type="text">  
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12 control-label" for="'.$i.'2"></label>  
                                                            <div class="col-md-12">
                                                                <input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12 control-label" for="'.$i.'3"></label>  
                                                            <div class="col-md-12">
                                                                <input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12 control-label" for="'.$i.'4"></label>  
                                                            <div class="col-md-12">
                                                                <input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text">
                                                            </div>
                                                        </div>
                                                        <br />
                                                        <b>Correct answer</b>:<br />
                                                        <select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" >
                                                            <option value="a">Select answer for question '.$i.'</option>
                                                            <option value="a">option a</option>
                                                            <option value="b">option b</option>   
                                                            <option value="c">option c</option>
                                                            <option value="d">option d</option>
                                                        </select><br /><br />'; 
                                                    }
                                                    echo 
                                                    '<div class="form-group">
                                                        <label class="col-md-12 control-label" for=""></label>
                                                        <div class="col-md-12"> 
                                                            <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Add">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>';
                                    }
                                ?>

                                <!--display & delete Category -->

                                <?php 
                                    if(@$_GET['q']==5)
                                    {
                                        $category_search = "SELECT * FROM category ORDER BY date DESC";
                                        $query = mysqli_query($con,$category_search) or die('Error');
                                        echo  '<table class="table table-striped title1">
                                        <tr><td><center><b>S.N.</b></center></td><td><center><b>Category</b></center></td><td><center><b>Total questions</b></center></td><td><center><b>Marks</b></center></td><td><center><b>Time limit</b></center></td><td></td></tr>';
                                        $count=1;
                                        while($result = mysqli_fetch_array($query)) 
                                        {
                                        $eid = $result['eid'];
	                                    $category = $result['category'];
	                                    $total = $result['total'];
	                                    $sahi = $result['sahi'];
                                        $time = $result['time'];
	                                    echo '<tr><td><center>'.$count++.'</center></td><td><center>'.$category.'</center></td><td><center>'.$total.'</center></td><td><center>'.$sahi*$total.'</center></td><td><center>'.$time.'&nbsp;min</center></td>
	                                    <td><b><a href="update.php?q=dcategory&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
                                        }
                                    $count=0;
                                    echo '</table>';

                                    }
                                ?>

                                
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <?php
		include('js/script1.php');
	?>
</body>
</html>