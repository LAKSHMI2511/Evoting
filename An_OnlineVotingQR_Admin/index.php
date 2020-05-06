<!DOCTYPE HTML>
<html>
<head>
<title>Election a Society and People</title>
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
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<!---strat-slider---->
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<!--script type="text/javascript" src="isInViewport.jquery.js"></script-->
<!---//-slider---->
<style>
.throw-confetti{
background:#ffbbff;
}
</style>
<script>
$(document).ready(function(){

$.fn.isInViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
};

});
$(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
//    console.log(scroll);
     if ($('#abcd1').isInViewport()) {
	        console.log("SSS middle");
//	         $(this).addClass('throw-confetti');
//alert("middle");
	    }
	         if ($('#footer').isInViewport()) {
			        console.log("SSS footer");
		//	         $(this).addClass('throw-confetti');
//                alert("footer");
			    }
			         if ($('#GRID1').isInViewport()) {
					        console.log("SSS menu");
//                                                alert("menu");
				//	         $(this).addClass('throw-confetti');
					    }


});


$(".BLAST").isInViewport(function (status) {
 console.log("SDSD");
  if (status === 'entered') {
    $(this).addClass('throw-confetti');

  }

  if (status === 'leaved') {
    $(this).removeClass('throw-confetti');
  }
});

</script>
</head>
<body>
<!-- header -->
	<div class="header_bg">
		<div class="container">
			<!-----start-header----->
			<div class="header">
				<div class="logo">
                                    <!--<a href="index.php"><img src="images/logo.png" alt=" " /></a> -->
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
							
                                                        <li class="act"><a href="index.php">Home</a></li>
                                                        <li><a href="admin.php">Admin Login</a></li>
														
                                                        <!--<li><a href="voting.php">Voting</a></li>
                                                        <li><a href="results.php">Results</a></li> -->
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
<!-- banner -->
	<div class="banner  BLAST">
		<div class="container">
				<section class="slider">
					<div class="flexslider">
						<ul class="slides">
							<li>
								<div class="banner-info">
									<div class="dummy_text">
										<h1>Utilize your vote for choosing a best leader</h1>
										</h1>
									</div>
								</div>
							</li>
							<li>
								<div class="banner-info">
									<div class="dummy_text">
										<h1>Don't forget to vote..your vote only decides a leader</h1>
									</div>
								</div>
							</li>
							<li>
								<div class="banner-info">
									<div class="dummy_text">
										<h1>Don't belive fake politicians....Always trust true politician who works for people
										</h1>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</section>
			</div>
			<!-- FlexSlider -->
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
										$(window).load(function(){
										  $('.flexslider').flexslider({
											animation: "slide",
											start: function(slider){
											  $('body').removeClass('loading');
											}
										  });
										});
									  </script>
			<!-- //FlexSlider -->
	</div>
<!-- //banner -->
<!-- banner-bottom1 -->
	<div class="banner-bottom1  BLAST">
		<div class="banner-bottom1-grids">
			<div class="col-md-4 banner-bottom1-left banner-bottom1-left1">
				<div class="banner-bottom1-lft">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					<h3>Admin<a href="results.html" style="color: white"></a></h3>
					<p>Lorem Ipsum is therefore always free.</p>
				</div>
			</div>
			<div class="col-md-4 banner-bottom1-left"  id="GRID1">
				<div class="banner-bottom1-lft">
					<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
					<h3>Voters</h3>
					<p>Lorem Ipsum is therefore always free.</p>
				</div>
			</div>
			<div class="col-md-4 banner-bottom1-left banner-bottom1-left2">
				<div class="banner-bottom1-lft">
					<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
					<h3>Election</h3>
					<p>Lorem Ipsum is therefore always free.</p>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //banner-bottom1 -->

<!-- body_grids -->
	<div class="wlcome">
		<div class="container">
			<div class="wlcome-grids">
				<div class="col-md-7 wlcome-grid-left">
					<div class="election_grid">
						<h3>Welcome To Election !</h3>
						<p class="nihil">Vote For Real Government.</p>
						<div class="wlcome-grid-left-grid">
							<div class="col-xs-8 wlcome-grid-left-grid BLAST">
								<h4 id="abcd1">General Elections</h4>
								<p>These elections are conducted for electing the members of Lok Sabha. The members elected during these elections are called MP (Member of Parliament). General elections are held in every 5 years.</p>
								<h4>Assembly Elections</h4>
								<p>The State Assembly elections in India are the elections in which the Indian voters choose the members of the Vidhan Sabha (or State/Legislative Assembly). These elections are held every 5 years and the chosen members are called MLAs.</p>
							</div>
							<div class="col-xs-4 wlcome-grid-left-grid">
								<img src="images/p1.jpg" alt=" " class="img-responsive">
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="wlcome-grid-left-grid">
							<div class="col-xs-8 wlcome-grid-left-grid  BLAST">
								<h4>Rajya Sabha Elections</h4>
<p>The members of Rajya Sabha are elected by the governing body of each state and union territory. There are 250 members in Rajya Sabha, out of which 12 are selected by the President of India. Out of 250, 238 are indirectly elected by the legislature of the each state and union territory.</p>
								<h4>President Elections</h4>
								<p>Elected members of the houses (Lok Sabha and Rajya Sabha), state legislatures (Vidhan Sabha), are assigned the task of electing the President of India. President serves for a period of five years.
								</p>

							</div>
							<div class="col-xs-4 wlcome-grid-left-grid fgh">
								<img src="images/p2.jpg" alt=" " class="img-responsive">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
									</div>
				<div class="col-md-5 wlcome-grid-right">
					<div class="sap_tabs">
						<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
							  <ul class="resp-tabs-list">
								  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  <li class="resp-tab-item grid1 resp-tab-active" aria-controls="tab_item-0" role="tab"><span>2018 Elections</span></li>
								  <div class="clear"></div>
							  </ul>
								<div class="resp-tabs-container">
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
										<div class="facts">
										  <div class="tab_list">
											<img src="images/tn.jpg" alt=" " class="img-responsive">
										  </div>
										  <div class="tab_list1">
											<a href="#">Tamil Nadu Elections</a>
											<p>October 3,2015 <span>Nam libero tempore, cum soluta nobis.</span></p>
										  </div>
										  <div class="clearfix"> </div>
										</div>
										<div class="facts">
										   <div class="tab_list">
												<img src="images/ap.jpg" alt=" " class="img-responsive">
										  </div>
										  <div class="tab_list1">
											<a href="#">Andhra Pradesh Elections</a>
											<p>October 1,2018<span>Nam libero tempore, cum soluta nobis.</span></p>
										  </div>
										  <div class="clearfix"> </div>
										</div>
										<div class="facts">
										   <div class="tab_list">
												<img src="images/kerala.jpg" alt=" " class="img-responsive">
										  </div>
										  <div class="tab_list1">
											<a href="#">Kerala Elections</a>
											<p>October 15,2018<span>Nam libero tempore, cum soluta nobis.</span></p>
										  </div>
										  <div class="clearfix"> </div>
										</div>
									</div>
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
										<div class="facts">
										  <div class="tab_list">
												<img src="images/4.jpg" alt=" " class="img-responsive">
										  </div>
										  <div class="tab_list1">
											<a href="#">excepturi sint occaecati</a>
											<p>October 23,2018<span>Nam libero tempore, cum soluta nobis.</span></p>
										  </div>
										  <div class="clearfix"> </div>
										</div>
										<div class="facts">
										   <div class="tab_list">
												<img src="images/1.jpg" alt=" " class="img-responsive">
										  </div>
										  <div class="tab_list1">
											<a href="#">excepturi sint occaecati</a>
											<p>October 28,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
										  </div>
										  <div class="clearfix"> </div>
										</div>
										<div class="facts">
										   <div class="tab_list">
												<img src="images/2.jpg" alt=" " class="img-responsive">
										  </div>
										  <div class="tab_list1">
											<a href="#">excepturi sint occaecati</a>
											<p>October 31,2015<span>Nam libero tempore, cum soluta nobis.</span></p>
										  </div>
										  <div class="clearfix"> </div>
										</div>
									</div>
								</div>
							 <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
								<script type="text/javascript">
									$(document).ready(function () {
										$('#horizontalTab').easyResponsiveTabs({
											type: 'default', //Types: default, vertical, accordion
											width: 'auto', //auto or any width like 600px
											fit: true   // 100% fit in a container
										});
									});
								   </script>
						</div>
					</div>
									</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //body_grids -->


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