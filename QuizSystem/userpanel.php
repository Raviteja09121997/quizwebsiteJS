<?php
	include("connection.php");
?>
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
		  
		<link href="" rel="stylesheet" type="text/css" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" type="text/css" />
	</head>
	
	<body>
	
		<!--banner-->

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="navbar-brand" href="#"><img src="IMG/indexlogo3.png" >
			</div>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>

  			<div class="collapse navbar-collapse" id="navbarSupportedContent">
    			<ul class="nav navbar-nav mr-auto">
      				<li class="nav-item active">
        				<a class="nav-link" href="userpanel.php?q=1"><i class="fa fa-home"></i>&nbsp;Home<span class="sr-only">(current)</span></a>
      				</li>
      				<li class="nav-item">
        				<a class="nav-link" href="userpanel.php?q=2"><i class="fa fa-list-alt"></i>&nbsp;History</a>
      				</li>
					<li class="nav-item">
        				<a class="nav-link" href="userpanel.php?q=3"><i class="fa fa-signal"></i>&nbsp;Rank</a>
      				</li>
    			</ul>
				<ul class="nav navbar-nav mr-auto">
				<?php
 					include("connection.php");
					session_start();
					if(!(isset($_SESSION['email'])))
					{
						header("location:index.php");
					}
					else
					{
						$username = $_SESSION['username'];
						$email=$_SESSION['email'];

						include("connection.php");
						echo '<span style="color:#ff8c00;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Hello,'.$username.'</span>';
					}
				?>
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
        				<a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>&nbsp;Logout</a>
      				</li>
				</ul>
  			</div>
		</nav>
  		
		<!--Quiz-->		

		<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

								<!--dispaly & start quiz dashboard-->

								<?php 
                                    if(@$_GET['q']==1)
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



								<!--Start quiz display questions and options-->
								<?php
									if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) 
									{
										$eid=@$_GET['eid'];
										$sn=@$_GET['n'];
										$total=@$_GET['t'];
										$q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
										echo '<div class="panel" style="margin:5%"><div class="breadcrumb"><div class="col-sm-10">';
										while($result=mysqli_fetch_array($q) )
										{
											$qns=$result['qns'];
											$qid=$result['qid'];
											echo '<b>Question &nbsp;'.$sn.'&nbsp;::<br />'.$qns.'</div><div class="col-sm-2 bg-danger text-center text-light">';
								?>

									<!--- Timer ---->

									<span id="countdown" class="timer"></span>
									<script>
										var seconds = 2*60;
    									function secondPassed()
										{
											var remainingminutes=Math.floor(seconds/60); 
											var remainingSeconds = seconds % 60;
    										if (remainingSeconds < 10) 
											{
        										remainingSeconds = "0" + remainingSeconds; 
											}
											if (remainingminutes < 10) 
											{
        										remainingminutes = "0" + remainingminutes; 
    										}
    										document.getElementById('countdown').innerHTML = remainingminutes + ":" +    remainingSeconds;
    										if (seconds == 0) 
											{
        										clearInterval(countdownTimer);
        										document.getElementById("form1").submit();
    										}
											else
											{    
        										seconds--;
    										}
    									}
										var countdownTimer = setInterval('secondPassed()', 1000);
									</script>
										
								<?php
											echo '</div></div>';
										}
										$q=mysqli_query($con,"SELECT * FROM options WHERE qid='$qid' " );
										echo '<form action="update.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST"  class="form-horizontal" id="form1">
										<br />';

										while($result=mysqli_fetch_array($q) )
										{
											$option=$result['option'];
											$optionid=$result['optionid'];
											echo'<input type="radio" name="ans" value="'.$optionid.'">'.$option.'<br /><br />';
										}
										echo'<br /><button type="submit" class="btn btn-primary"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Submit</button></form></div>';
									}
									//--result--
									if(@$_GET['q']== 'result' && @$_GET['eid']) 
									{
										$eid=@$_GET['eid'];
										$q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error157');
										echo  '<div class="panel">
										<center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

										while($result=mysqli_fetch_array($q) )
										{
											$s=$result['score'];
											$w=$result['wrong'];
											$r=$result['sahi'];
											$qa=$result['level'];
											echo '<tr style="color:#66CCFF"><td>Total Questions</td><td>'.$qa.'</td></tr>
      										<tr style="color:#99cc32"><td>right Answer&nbsp;<i class="fa fa-check-circle-o" aria-hidden="true"></i></td><td>'.$r.'</td></tr> 
	  										<tr style="color:red"><td>Wrong Answer&nbsp;<i class="fa fa-times-circle-o" aria-hidden="true"></i></td><td>'.$w.'</td></tr>
	  										<tr style="color:#66CCFF"><td>Score&nbsp;<i class="fa fa-star" aria-hidden="true"></i></td><td>'.$s.'</td></tr>';
										}
										$q=mysqli_query($con,"SELECT * FROM rank WHERE  email='$email' " )or die('Error157');
										while($result=mysqli_fetch_array($q) )
										{
											$s=$result['score'];
											echo '<tr style="color:#990000"><td>Overall Score&nbsp;<i class="fa fa-signal" aria-hidden="true"></i></td><td>'.$s.'</td></tr>';
										}
										echo '</table></div>';

									}
								?>

								<!--History-->

								<?php
									if(@$_GET['q']== 2) 
									{
										$q=mysqli_query($con,"SELECT * FROM history WHERE email='$email' ORDER BY date DESC " )or die('Error197');
										echo  '<div class="panel title">
										<table class="table table-striped title1" >
										<tr style="color:red"><td><b>S.N.</b></td><td><b>Category</b></td><td><b>Questions Solved</b></td><td><b>Right</b></td><td><b>Wrong<b></td><td><b>Score</b></td>';
										$count=0;
										while($result=mysqli_fetch_array($q) )
										{
											$eid=$result['eid'];
											$s=$result['score'];
											$w=$result['wrong'];
											$r=$result['sahi'];
											$qa=$result['level'];
											$q23=mysqli_query($con,"SELECT category FROM category WHERE  eid='$eid' " )or die('Error208');
											while($result=mysqli_fetch_array($q23) )
											{
												$category=$result['category'];
											}
											$count++;
											echo '<tr><td>'.$count.'</td><td>'.$category.'</td><td>'.$qa.'</td><td>'.$r.'</td><td>'.$w.'</td><td>'.$s.'</td></tr>';
										}
										echo'</table></div>';
									}
								?>

								<!--rank-->

								<?php
									if(@$_GET['q']== 3) 
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


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	
	</body>
</html>
