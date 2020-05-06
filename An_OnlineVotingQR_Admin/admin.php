<?PHP
require 'util.php';
session_start();

$name;
$password;
$error = Array();
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $pass=$_POST['password'];
           
     if(!isset($name) ||  $name=='' ){
     //    echo "SSSS";
        $error['name']='Please Enter the Name';
    }
        
     if(!isset($pass) ||  $pass=='' ){
     
        $error['pass']='Please Enter the Password';
    }
    if(sizeof($error)==0){
        
        $sql = "select * from admininfo where name='".$name."' and password='".$pass."'";
         
        $res = $db->query($sql);
		//echo($db->connect_errno);
        //echo($sql);
         if($res->fetch_assoc() ) {
             $_SESSION["type"] = 'admin';
             $_SESSION["uname"] = $name;
            header('Location: '.'./adminmain.php'); 
            die();
         }
         else{
             $error['invalid']='User Name Password Invalid';
         }
    
    }
}
?>
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
                                                        <li><a href="index.php">Home</a></li>
                                                        <li class="act"><a href="admin.php">Login</a></li>
                                                        <!--<li><a href="results.php">Results</a></li>-->
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
<!-- banner1 -->
	
<!-- //banner1 -->
<!--typography-page -->
	<div class="typo">
            <form action="#" method="post">
		<div class="container">
			<h3 class="title">Welcome for Online Voting</h3>
			<p class="nihil">Vote For Real Government.</p>
			<div class="grid_3 grid_4">
				<h3 class="hdg">Admin Login</h3>
				<div class="bs-example">
                                    <?php
                                    foreach ($error as $key ) {
                                        //$err=$error[$key];
                                    ?>
                                    <span style="color:red"><?php echo $key ?></span><br/>
                                     <?php 
                                    }
                                     ?>
					<table class="table">
						<tbody>
							
							<tr>
                                                            <td><h4 id="h4.-bootstrap-heading"><b>Admin Name</b></h4><input type="text" name="name" style="border: none; border-bottom: 2px solid steelblue;width: 40%;height:50px" /></td>
								
							</tr>
								<tr>
                                                                    <td><h4 id="h4.-bootstrap-heading"><b>Admin Password</b></h4><input type="password" name="password" style="border: none; border-bottom: 2px solid steelblue;width: 40%;height:50px"/></td>
								
							</tr>
							
						</tbody>
					</table>
				</div>
			</div>
			
			
                        <p class="one">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Login" style="background-color:steelblue;color:white ;height: 50px;width: 15%;border: 2px solid steelblue;"></p>
		          <!--a href="adminreg.php">  Not Yet Registred? Create An Account</a-->

			</div>	
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