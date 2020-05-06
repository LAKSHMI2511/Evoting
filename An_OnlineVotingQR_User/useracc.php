<!DOCTYPE HTML>
<?php
require 'util.php';
//session_start();
if(!isset($_SESSION['username'])){
    header('Location: '.'./admin.php'); 
}
$test = $_SESSION['username'];

$sql = "select * from voterinfo where vname='".$test."'";
//echo $sql; 
$res = $db->query($sql);
 while($row = $res->fetch_assoc()) {
	 $status = $row["status"];
 }

?>
<html>
<head>
<style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<title>Election a Society and People Category </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Election Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!--<link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>-->
<!--<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>-->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!---strat-slider---->
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<!---//-slider---->
</head>
<body>
<!-- header -->
	<div class="header_bg">
		<div class="container">
			<!-----start-header----->
			<div class="header">
				<div class="logo">
                                   <!-- <a href="index.php"><img src="images/logo.png" alt=" " /></a> -->
				</div>
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                                                        <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                                                       
                                                        <li ><a href="logout.php">Logout</a></li>


						</ul>
					</div><!-- /.navbar-collapse -->

				</nav>
			</div>
		</div>
	</div>
	<div class="header_bottom">
	</div>
<!-- //end-header -->
<!-- banner1 -->

<!-- //banner1 -->
<!--typography-page -->
	<div class="typo">

		<div class="container">
			<h3 class="title">Welcome for Online Voting</h3>
			<p class="nihil">Vote For Real Government.</p>
			
			<?php
			if($status == "Pending"){
			?>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<h2><center>Your Request Is Still Under Verification Process</center><h2>
			<?php
			}
			else if($status == "Accepted"){				
			?>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<h2><center>Your Account Has Been Successfully Verified</center><h2>
			<?php
			}
			else
			{
			?>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<h2><center>Your Request Has Been Rejected Please Submit Your detail Again</center><h2>
			<br/>
			<br/>
			<br/>
			<center><div style="background-color: steelblue;color: white;width: 20%;font-size: 30px;text-align: center;height: 50px;">

                          <a href="votersupdate.php" style="color: white">Update detail</a>

                        </div></center>
			<?php
			}
			?>

                        



			</div>



 

		</div>
	</div>
<!-- //typography-page -->

		<!-- scroll_top_btn -->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
	    <script type="text/javascript">
			$(document).ready(function() {

				var defaults = {
		  			containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear'
		 		};


				$().UItoTop({ easingType: 'easeOutQuart' });

			});
		</script>
		 <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
		<!--end scroll_top_btn -->
<!-- for bootstrap working -->
	 <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
</body>
</html>