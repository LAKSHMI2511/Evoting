<?PHP
require 'util.php';
session_start();

$result= Array(); 
?>
<!DOCTYPE HTML>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #515C8E;
  color: white;
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
                                  <!--  <a href="index.php"><img src="images/logo.png" alt=" " /></a> -->
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
                                                       <li><a href="adminmain.php">Admin</a></li>
													   <li ><a href="adminreg.php">Add User</a></li>
                                                        <li ><a href="request.php">Request List</a></li>
                                                        <li ><a href="pubres.php">Publish Result</a></li>
                                                        <li class="act"><a href="election.php">Election</a></li>
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
            <form action="#" method="post">
		<div class="container">
			<h3 class="title">Request Voter List</h3>
			<p class="nihil">Vote For Real Government.</p>
			<table id="customers">

  <?php
 require 'util.php';
$sql = "SELECT * FROM voterinfo WHERE status = 'Pending'";
$res =$db->query($sql);
$no=$res->num_rows;

if($no == 0){
	?>
	
	<h2><center>No User Request</center></h2>
<?php	
}
else{
?>
  <tr>
    <th>pROFILE</th>
    <th>AADHAR</th>
    <th>NAME</th>
    <th>VOTER ID</th>
	<th>DOB</th>
	<th>AREA</th>
	<th>STATUS</th>
	
  </tr>
<?php
 while($row = $res->fetch_assoc()) {
  ?>
  <tr>
  <div class="popup">
    <td><img src=/An_OnlineVotingQR_User/voterImages/<?php echo $row["vimage"] ?>  width="100" height="100"></td>
	</div>
    <td><?php echo $row["vaadhar"] ?></td>
    <td><?php echo $row["vname"] ?></td>
    <td><?php echo $row["vid"] ?></td>
	<td><?php echo $row["dob"] ?></td>
	<td><?php echo $row["area"] ?></td>
	<?php
	echo "<td><a href=\"accept.php?id=".$row['ID']."\">Accept</a>&nbsp;&nbsp;&nbsp;<a href=\"reject.php?id=".$row['ID']."\">Reject</a></td>";
	?>
	  <?php
 }
  ?>

  </tr>
  <?php
}
  ?>

  
</table>
			</form>					<!-- /.row -->
		
		
			
		
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