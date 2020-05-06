<!DOCTYPE HTML>
<html>
<head>
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
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/style.css">
<!---strat-slider---->
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/canvasjs.min.js"></script>
<script type="text/javascript" src="js/jquery.canvasjs.min.js"></script>

<!---//-slider---->

<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Election Result - 2018"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.00\"%\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: 79.45, label: "Party1"},
			{y: 7.31, label: "Party2"},
			{y: 7.06, label: "Party3"},
			{y: 4.91, label: "Party4"},
			{y: 1.26, label: "Party5"}
			
		]
	}]
});
chart.render();

}
</script>

</head>
<body>
<!-- header -->
	<div class="header_bg">
		<div class="container">
			<!-----start-header----->
			<div class="header">
				<div class="logo">
					<a href="#"><img src="images/logo.png" alt=" " /></a>
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
                                                        <li><a href="index.php">Home</a></li>
                                                        <li><a href="admin.php">Admin</a></li>
                                                        <li class="act"><a href="results.php">Results</a></li>
							<li><a href="#">Contact Us</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->	
					
				</nav>
			</div>
		</div>
	</div>
	<div class="header_bottom">
	</div>
<!-- //end-header -->

<!--typography-page -->
	<div class="typo">
		<div class="container">
			<h3 class="title">Welcome For Online Voting</h3>
			
			
			<div class="grid_3 grid_5">
				<h3>Winners Details</h3>
				<div class="col-md-6">
					<p>Add modifier classes to change the appearance of a badge.</p>
					<table class="table table-bordered">
						<thead>
							<tr>
							    <th>Candidate Name</th>
								<th>Party Name</th>
								<th>Votes</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>X</td>
								<td>Party1</td>
								<td><span class="badge">42</span></td>
							</tr>
							<tr>
								<td>Y</td>
								<td>Party2</td>
								<td><span class="badge badge-primary">1</span></td>
							</tr>
							<tr>
								<td>Z</td>
								<td>Party3</td>
								<td><span class="badge badge-success">22</span></td>
							</tr>
							<tr>
								<td>W</td>
								<td>Party4</td>
								<td><span class="badge badge-info">30</span></td>
							</tr>
							
						</tbody>
					</table>                    
				</div>
				<div class="col-md-6">
					<div id="chartContainer" style="height: 300px; width: 100%;">
					
					
					</div>
<!--				<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>-->
				</div>
			   <div class="clearfix"> </div>
			</div>	 
			
			
			
					
		
			
			
			
		</div>
	</div>
<!-- //typography-page -->

<!-- footer -->
	<div class="footer">
		<div class="container">
			
		    <div class="footer-copy">
				<p>&copy 2018 Election. All rights reserved | www.onlineelectionvoting.com</a></p>
			</div>
		</div>
	</div>
<!-- //footer -->
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