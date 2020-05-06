<?PHP
require "util.php";

if(!isset($_SESSION['uname'])){
    header('Location: '.'./admin.php'); 
}
$ename;
$edate;
$etype;
$noofcandidates;
$cname;
$pname;
$psymbol;
$pflag;
$error = Array();
if(isset($_POST['submit'])){
    $ename=$_POST['ename'];
    $edate=$_POST['edate'];
    $etype=$_POST['etype'];
    $subtype=$_POST['subtype'];
    $etime = $_POST['etime'];
    $stime = $_POST['stime'];
    
 //   echo "$ename on $edate of $etype";
//echo $stime;
    if(!isset($stime) or $stime=="00.00.00"){
        $error['stime']="Please Select Start time";
    }
    
    $cname=$_POST['cname'];
  //  var_dump($cname);
//    $pname=$_POST['pname'];
    //$psymbol=$_POST['psymbol'];
    //$pflag=$_POST['pflag'];

$fileNamelist;
   //var_dump($_FILES);
for ($i = 0; $i < count($_FILES['psymbol']['name'])-1; $i++) {
// Loop to get individual element from the array
$j = 0;     // Variable for indexing uploaded image.
$target_path = "upImages/";     // Declaring Path for uploaded images.
$validextensions = array("jpeg", "jpg", "png");      // Extensions which are allowed.
$ext = explode('.', basename($_FILES['psymbol']['name'][$i]));   // Explode file name from dot(.)
$file_extension = end($ext); // Store extensions in the variable.
$fileNamelist[$i]=md5(uniqid()). "." . $ext[count($ext) - 1];
$target_path = $target_path . $fileNamelist[$i];      // Set the target path with a new name of image.
$j = $j + 1;      // Increment the number of uploaded images according to the files in array.
//echo "SS";
//echo $file_extension;
if (     // Approx. 100kb files can be uploaded.
 in_array($file_extension, $validextensions)) {
if (move_uploaded_file($_FILES['psymbol']['tmp_name'][$i], $target_path)) {
// If file moved to uploads folder.
//$error[$j]= '<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
} else {     //  If File Was Not Moved.
$error[$j]= '<span id="error">please try again!.</span><br/><br/>';
}
} else {     //   If File Size And File Type Was Incorrect.
$error[$j]= '<span id="error">***Invalid file Size or Type***</span><br/><br/>';
}
}

//echo implode($error);
    //echo $name==="";


       // echo count($error);


    if(sizeof($error)==0)
        {
        //echo count($cname);
        for ($i = 0; $i < count($cname)-1; $i++) {
            
        
          $sql="insert into electioninfo (ename,edate,etype,subtype,cname,flag,status,stime,etime)"
              . "values('".$ename."','".$edate."','".$etype."','".$subtype."','".$cname[$i]."','".$fileNamelist[$i]."','A','$stime','$etime')";
     // echo $sql;
      if($db->query($sql))
         {
       //     echo "OK<br>";
         }
       //  else echo "ERR<br>".$db->error;
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
    listitems += "<option value='" + key + "'>" + value + "</option>";
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
});



function chkForm(){


    if($("#etype").prop('selectedIndex')==0){
        alert("Please select Election type");
        return false;
    }
    if($("#subtype").prop('selectedIndex')==0){
        alert("Please select Constituency");
        return false;
    }

//cname=$(".cname");
psymbol=$(".psymbol");
err=0;
//alert('pp');
for(i=0;i<psymbol.length-1;i++){
//alert(psymbol[i].files[0]);
 if(psymbol[i].files[0]==null){
  err=1;
 }
}

if(err==1){
   alert("pls select a file");
   return false;
}
    return true;
}

    function readURL(input) {

            if (input.files && input.files[0]) {
                iimg=$(input).parent().next().children();
                console.log(iimg.prop("nodeName"));
                var reader = new FileReader();

                reader.onload = function (e) {
                    iimg
                        .attr('src', e.target.result)
                        .width(50)
                        .height(50);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

var ct = 1;
function new_link()
{
	ct++;
	var div1 = document.createElement('div');
	div1.id = ct;
	// link to delete extended form elements
	var delLink    = '<div style="text-align:right;margin-right;margin-top:-50px"><a href="javascript:delIt('+ ct +')" style="font-size: 30px;"><b>*</b></a></div>';
	a1=document.getElementById('newlinktpl').innerHTML;
	a1=a1.replace("arequire","required");
	div1.innerHTML = a1 + delLink;
	document.getElementById('newlink').appendChild(div1);
}
// function to delete the newly added set of elements
function delIt(eleId)
{
	d = document;
	var ele = d.getElementById(eleId);
	var parentEle = d.getElementById('newlink');
	parentEle.removeChild(ele);
}
</script>
<script>
$(document).ready(function() {
    $(".preferenceSelect").change(function() {
        // Get the selected value
        var selected = $("option:selected", $(this)).val();
        // Get the ID of this element
        var thisID = $(this).prop("id");
        // Reset so all values are showing:
        $(".preferenceSelect option").each(function() {
            $(this).prop("disabled", false);
        });
        $(".preferenceSelect").each(function() {
            if ($(this).prop("id") != thisID) {
                $("option[value='" + selected + "']", $(this)).prop("disabled", true);
            }
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
					<!--<a href="#"><img src="images/logo.png" alt=" " /></a> -->
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

<!--typography-page -->
	<div class="typo">
		<div class="container">
			<h3 class="title">Welcome For Online Voting</h3>
			<p class="nihil">Vote For Real Government.</p>
			<form action="#" method="post" enctype="multipart/form-data" onSubmit="return chkForm();">
			<div class="grid_3 grid_4">
				<h3 class="hdg">Election Details</h3>
				<div class="bs-example">
					<table class="table">
						<tbody>

							<tr>
                                                            <td><h4 id="h4.-bootstrap-heading"><b>Election Name</b></h4><input type="text" name="ename" style="border: none; border-bottom: 2px solid steelblue;width: 40%;height:50px" required/></td>

							</tr>

						    <tr>
                                                            <td><h4 id="h4.-bootstrap-heading"><b>Election Date</b></h4><input type="date" name="edate"  required data-date-inline-picker="true" style="border: none; border-bottom: 2px solid steelblue;width: 40%;height:50px"/></td>

							</tr>
  <tr>
                                                            <td><h4 id="h4.-bootstrap-heading"><b>Time</b></h4>Start &nbsp; <input type="time" name="stime"  required data-date-inline-picker="true" style="border: none; border-bottom: 2px solid steelblue;width:15%;height:50px"/>
                                                                End &nbsp; <input type="time" name="etime"  required data-date-inline-picker="true" style="border: none; border-bottom: 2px solid steelblue;width:15%;height:50px"/></td>

							</tr>                                                        
							<tr>
							<td><h4 id="h4.-bootstrap-heading"><b>Type Of Election</h4>
                                                            <select name="etype"  id="etype" style="border: none; border-bottom: 2px solid steelblue;width: 40%;height:50px" required>
							<option>-------CHOOSE Election-------</option>
							<option value="state">State Election</option>
						    <option value="central">Central Election</option>
						    <option value="local">Local Election</option>
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

							</table>
							<h3 class="hdg">Candidate Details</h3>
							<div id="newlink" >
							<div class="bs-docs-example">
				<table class="table">
					<thead>
						<tr>
							<th style="text-align: center">CANDIDATE NAME</th>
							<!--th style="text-align: center">PARTY NAME</th-->
							<th style="text-align: " colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PARTY SYMBOL</th>
							<!--th style="text-align: center" colspan="2">PARTY FLAG</th-->
						</tr>
						<tr><td></td></tr>

					</thead>
					<tbody>
						<tr>
                                                    
											    <td><select id = "pref1select" class="preferenceSelect" class="cname" style="border: none; border-bottom: 2px solid steelblue;width: 100%;height:50px" name="cname[]" required />
												  <option value="Select">Select</option> 
												  <?php
												 $sql="select vname  from voterinfo where status='Accepted'";
                                                 $ret = $db->query($sql);
												 while($row = $ret->fetch_assoc()) {
												  ?>
                                                 <option value="<?php echo $row['vname']; ?>"><?php echo $row['vname']; ?></option> 
												 <?php
												 }
												 ?>
									            <!--td><input type="text" style="border: none; border-bottom: 2px solid steelblue;width: 100%;height:50px" name="party[]"/></td-->
                                                <td><input type="file" style="border: none; border-bottom: 2px solid steelblue;width: 70%;height:50px" name="psymbol[]"  class="psymbol" onchange="readURL(this);"/></td>
                                                    <td><img src="./images/no-image.webp" id="parsym" style="width:50px;height:50px"></td>
                                                    <!--td><input type="file" style="border: none; border-bottom: 2px solid steelblue;width: 70%;height:50px" name="pflag[]" onchange="readURL(this);"/></td>
                                                    <td><img src="./images/no-image.webp" id="parflag" style="width:50px;height:50px"></td-->
						</tr>

					</tbody>
				</table>
			</div>


							</div>

<p id="addnew">
	<a href="javascript:new_link()"style="font-size: 20px">&nbsp;&nbsp;&nbsp;<b>+</b> </a>
</p>
<div id="newlinktpl" style="display: none">
<div class="bs-docs-example">
				<table class="table">
					<tbody>
						<tr>
							
							
							
							<td><select id = "pref2select" class="preferenceSelect" type="text" style="border: none; border-bottom: 2px solid steelblue;width: 100%;height:50px" name="cname[]"  class="cname" arequire />
							<option value="Select">Select</option> 
												  <?php
												 $sql="select vname  from voterinfo where status='Accepted'";
                                                 $ret = $db->query($sql);
												 while($row = $ret->fetch_assoc()) {
												  ?>
                                                 <option value="<?php echo $row['vname']; ?>"><?php echo $row['vname']; ?></option> 
												 <?php
												 }
												 ?>
							</td>
							
						
							<!--td><input type="text" style="border: none; border-bottom: 2px solid steelblue;width: 100%;height:50px" name="party[]" /></td-->
							<td><input type="file" style="border: none; border-bottom: 2px solid steelblue;width: 70%;height:50px" name="psymbol[]" onchange="readURL(this);" class="psymbol" /></td>
                                                        <td><img src="./images/no-image.webp" id="parsym" style="width:50px;height:50px"></td>
							<!--td><input type="file" style="border: none; border-bottom: 2px solid steelblue;width: 70%;height:50px" name="pflag[]" onchange="readURL(this);"/></td>
                                                        <td><img src="./images/no-image.webp" id="parflag" style="width:50px;height:50px"></td-->
						</tr>

					</tbody>
				</table>
			</div>

</div>




							<table class="table">
							<tbody>
							<tr>
								<td><br/><input type="submit" name="submit" value="Submit" style="border: 2px solid steelblue; width: 10%;height:50px;background-color: steelblue;color: white" /></td>

							</tr>


						  </tbody>
					       </table>


				</div>
			</div>
	</form>

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