<?PHP
require "util.php";

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
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/style.css">
<!---strat-slider---->
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<!---//-slider---->
<script>
/*
This script is identical to the above JavaScript function.
*/
$(document).ready(function(){
    $('#etype').on('change', function() {
  if(this.value!="-------CHOOSE Election-------"){
 $.getJSON( "./getlist.php?type="+this.value, function( data ) {
  var listitems = '';
$.each(data, function(key, value){
    listitems += '<option value=' + key + '>' + value + '</option>';
});
$("#subtype").find('option').remove();
$("#subtype").append('<option >CHOOSE Constituency</option>');
$("#subtype").append(listitems);
});
  }
  else{
    $("#subtype").find('option').remove();
$("#subtype").append('<option >CHOOSE Constituency</option>');
  }
});

    $('#search').on('click', function() {
    etype=$("#etype").val();
    stype=$("#subtype").val();
  $.getJSON("./fetchElectionList.php?etype="+etype+"&subtype="+stype , function(data) {
    var tbl_body = document.createElement("tbody");
    var odd_even = false;
     $("#target_table_id tbody tr").remove();
    $.each(data, function() {
        var tbl_row = tbl_body.insertRow();
        tbl_row.className = odd_even ? "odd" : "even";
        $.each(this, function(k , v) {
            var cell = tbl_row.insertCell();
            cell.appendChild(document.createTextNode(v.toString()));
        })        
        odd_even = !odd_even;               
    })
    $("#target_table_id").append(tbl_body);
});

});




});



</script>
<style>

</style>
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
                                                        <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                                                        <li><a href="adminmain.php">Admin</a></li>
                                                        <li ><a href="voters.php">Add Voters</a></li>
                                                        <li class="act"><a href="election.php">Create Election</a></li>
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
			<!--h3 class="title">Welcome For Online Voting</h3>
			<p class="nihil">Vote For Real Government.</p-->
			<form action="#" method="post" enctype="multipart/form-data" onSubmit="return chkForm();">
			<div class="grid_3 grid_4">
				<h3 class="hdg">List Election</h3>
				<div class="bs-example">
                                   <table class="table">
						<tbody>
							<tr>
							<td><h4 id="h4.-bootstrap-heading"><b>Type Of Election</h4>
                                                            <select name="etype"  id="etype" style="border: none; border-bottom: 2px solid steelblue;width: 40%;height:50px" required>
							<option>-------CHOOSE Election-------</option>
							<option value="STATE">State Election</option>
						    <option value="LOK">Central Election</option>
						    <option value="MLC">Local Election</option>
						    <!--option value="Alandur">By Election</option-->
							</select></td>
							</tr>
							<tr>
                                                            <td><h4 id="h4.-bootstrap-heading"><b>Constituency</b></h4>
                                                                <!--input type="text" name="noofcandidates" style="border: none; border-bottom: 2px solid steelblue;width: 40%;height:50px"/-->
                                                             <select name="subtype" id="subtype" style="border: none; border-bottom: 2px solid steelblue;width: 40%;height:50px" required>
							<option>-------CHOOSE HERE-------</option>

						    <!--option value="Alandur">By Election</option-->
							</select>
                                                            </td>

							</tr>
                                                        <tr><td colspan="2"><input type="button" value="Search" id="search" ></td></tr>

							</table>
                                    <table id="target_table_id" class="table table-striped">
                                        <thead>
    
      
      <th scope="col">Election Name </th>
      <th scope="col">Election Type </th>
      <th scope="col">Date</th>
      <th scope="col">Constituency</th>
    
  </thead>
                                    </table>

				</div>
			</div>
	</form>

		</div>

	</div>
<!-- //typography-page -->

<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-copy">
				<p>&copy 2018 Election. All rights reserved | www.onlineelectionvoting.com</p>
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