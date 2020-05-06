<?PHP
require "util.php";

if(!isset($_SESSION['username'])){
    header('Location: '.'./admin.php'); 
}

$test = $_SESSION['username'];
$pass = $_SESSION['userpass'];

$image;
$aadhar;
$name;
$mobile;
$dob;
$check;
$number;
$status="Pending";
$password;
$error = Array();
if(isset($_POST['submit'])){
   // $image=$_POST['vimage'];
    $aadhar=$_POST['vaadhar'];
    //$name=$_POST['vname'];
    $id=$_POST['vid'];
    $dob=$_POST['dob'];
    $fpstr=$_POST['b64img'];
    $area=$_POST['area'];
	//$password = $_POST['password'];
    $check = strlen($aadhar);
	$ids = strlen($id);
	
//    echo "SASDASD ";
//    echo $area;
    //echo $name==="";
    if(!isset($image) ||  $image=='' ){
     //   echo "Says";
     //   $error['image']='Please Upload an image';
    }
    if(!isset($aadhar) || $aadhar=='' ){
        $error['aadhar']='Please Enter the Aadhar Id';
    }
	 
	 if($check<12 || $check>12 || !is_numeric($aadhar)){
        $error['aadhar']='Please Enter valid the Aadhar Id';
    }
	if($ids>10 || $ids<10 || !is_numeric($id)){
		$error['id']='Plese Enter valid Voter Id';
	}
    
      if(!isset($id) || $id=='' ){
        $error['id']='Please Enter the Voter ID';
    }
    if($dob<18)
    {
     $error['dob']='18 plues aged people are only eligible for elections';  
	 
    }
	
    
    for ($i = 0; $i < count($_FILES['vimage']['name']); $i++) {
// Loop to get individual element from the array
$j = 0;     // Variable for indexing uploaded image.
$target_path = "voterImages/";     // Declaring Path for uploaded images.
$validextensions = array("jpeg", "jpg", "png");      // Extensions which are allowed.
$ext = explode('.', basename($_FILES['vimage']['name'][$i]));   // Explode file name from dot(.)
$file_extension = end($ext); // Store extensions in the variable.
$fileNamelist[$i]=md5(uniqid()). "." . $ext[count($ext) - 1];
$target_path = $target_path . $fileNamelist[$i];      // Set the target path with a new name of image.
$j = $j + 1;      // Increment the number of uploaded images according to the files in array.
//echo "SS";
//echo $file_extension;
if (     // Approx. 100kb files can be uploaded.
 in_array($file_extension, $validextensions)) {
if (move_uploaded_file($_FILES['vimage']['tmp_name'][$i], $target_path)) {
// If file moved to uploads folder.
//$error[$j]= '<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
} else {     //  If File Was Not Moved.
$error[$j]= '<span id="error">please try again!.</span><br/><br/>';
}
} else {     //   If File Size And File Type Was Incorrect.
$error[$j]= '<span id="error">Photo Empty!</span><br/><br/>';
}
}
$fpbasepath="fpimages/";
$fingerimage=md5(uniqid()). ".png";
$fpath=$fpbasepath.$fingerimage;

//echo "TARGEYT ".$target_path;

    if(sizeof($error)==0)
        {
	 
  $ret11=  file_put_contents($fpath, base64_decode($fpstr));
  //echo "REATEE ".$ret11;
  //echo "<br>".$fpath;

        $sql="UPDATE voterinfo SET vimage='".$fileNamelist[0]."',vaadhar='".$aadhar."',password='".$pass."',vid='".$id."',dob='".$dob."',area='$area',status='".$status."',finger='".$fingerimage."', vname='".$test."' WHERE vname='".$test."'";
        //  $sql="insert into voterinfo (vimage,vaadhar,vname,password,vid,dob,area,status,finger)"
             // . "values('".$fileNamelist[0]."','".$aadhar."','".$name."','".$password."','".$id."','".$dob."','$area','".$status."','".$fingerimage."')";
			   header('Location: '.'./votersupdate.php'); 
      
      if($db->query($sql)){
         }
      else{
          $er = $db->error;
          //echo $er;
           unlink($fpath);
          unlink( $target_path);
          if(strpos($er, 'key 3') !== false){
              $error['ER_EM']='Voter id already registered';
          }
          elseif ((strpos($er, 'key 2') !== false)) {
           $error['ER_EM']='Aadhar id already registered';
      }
      else{
          $error['ER_EM']=$er;;
      }
 
       }


    }
    }
    else{
        $error=[];
    }

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Election a Society and People Category </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>

<script type="text/javascript" src="./js/adapter.min.js"></script>
<script type="text/javascript" src="./js/vue.min.js"></script>
<script type="text/javascript" src="./js/instascan.min.js"></script>

<script src="mfs100-9.0.2.6.js"></script>


<script language="javascript" type="text/javascript">
    function processResult(str){
    //alert(str);
    $xmlDoc = $.parseXML( str );
  
  
  uid = $xmlDoc.children[0].getAttribute('uid');
  $("#aid").val(uid);
  uid = $xmlDoc.children[0].getAttribute('name');
  $("#vname").val(uid);
  uid = $xmlDoc.children[0].getAttribute('dob');
  var parts =uid.split('/');
  var mydate = new Date(parts[2], parts[1] - 1, parts[0]); 
  $("#dob").val(mydate);
  
    }
        var flag =0;
        var quality = 60; //(1 to 100) (recommanded minimum 55)
        var timeout = 10; // seconds (minimum=10(recommanded), maximum=60, unlimited=0 )

//function to capture the finger prints.

        function Capture() {
            try {
                //document.getElementById('txtStatus').value = "";
                document.getElementById('imgFinger').src = "data:image/bmp;base64,";
/*                document.getElementById('txtImageInfo').value = "";
                document.getElementById('txtIsoTemplate').value = "";
                document.getElementById('txtAnsiTemplate').value = "";
                document.getElementById('txtIsoImage').value = "";
                document.getElementById('txtRawData').value = "";
                document.getElementById('txtWsqData').value = "";
*/
                var res = CaptureFinger(quality, timeout);
                if (res.httpStaus) {
                      flag = 1;
//                    document.getElementById('txtStatus').value = "ErrorCode: " + res.data.ErrorCode + " ErrorDescription: " + res.data.ErrorDescription;

                    if (res.data.ErrorCode == "0") {
                        document.getElementById('imgFinger').src = "data:image/bmp;base64," + res.data.BitmapData;
                        document.getElementById('b64img').value = res.data.BitmapData;
/*                        var imageinfo = "Quality: " + res.data.Quality + " Nfiq: " + res.data.Nfiq + " W(in): " + res.data.InWidth + " H(in): " + res.data.InHeight + " area(in): " + res.data.InArea + " Resolution: " + res.data.Resolution + " GrayScale: " + res.data.GrayScale + " Bpp: " + res.data.Bpp + " WSQCompressRatio: " + res.data.WSQCompressRatio + " WSQInfo: " + res.data.WSQInfo;
 						document.getElementById('b64img').value = res.data.BitmapData;
                        document.getElementById('txtImageInfo').value = imageinfo;
                        document.getElementById('txtIsoTemplate').value = res.data.IsoTemplate;
                        document.getElementById('txtAnsiTemplate').value = res.data.AnsiTemplate;
                        document.getElementById('txtIsoImage').value = res.data.IsoImage;
                        document.getElementById('txtRawData').value = res.data.RawData;
                        document.getElementById('txtWsqData').value = res.data.WsqImage;
                        */
                    }
                }
                else {
                    alert(res.err);
                }
            }
            catch (e) {
                alert(e);
            }
            return false;
        }

    </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!--<link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>-->
<!--<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>-->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!---strat-slider---->
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<!---//-slider---->
<script>
    var _MS_PER_DAY = 1000 * 60 * 60 * 24;
function chkForm(){
    var a    = new Date();
    dateStr = document.getElementById("dob").value;
    //alert(dateStr);
//    console.log(dateStr);
  //  const [day, month, year] = dateStr.split("-");
    //alert(day+"-"+month+"-"+year);
    //console.log(day+"-"+month+"-"+year);
//    b =new Date(year, month - 1, day);
    b =new Date(dateStr);
    //alert(b);
//var b    = new Date("2017-07-25"); 
var remainingDays    = dateDiffInDays(b, a);
if(remainingDays<6570){
    alert("Age should be above 18 yrs");
    return false;
}
return true;
}    

function dateDiffInDays(a, b) {
  // Discard the time and time-zone information.
  var utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
  var utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());

  return Math.floor((utc2 - utc1) / _MS_PER_DAY);
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
				<!--	<a href="#"><img src="images/logo.png" alt=" " /></a> -->
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
							<!--li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li -->
                                                        <!--li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li-->
                                                       
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
	<form action="#" method="post" onsubmit="return chkForm();" enctype="multipart/form-data">
		<div class="container">
			<h3 class="title">Welcome for Online Voting</h3>
			<p class="nihil">Vote For Real Government.</p>
			<div class="grid_3 grid_4">
				<h3 class="hdg">Voter Citizen Details</h3>
				<div class="bs-example" style="width:50%;float:left">
					<table class="table">
					
						<tbody>
                                                    <tr>
                                                        <td>
                                                            <?php 
                                                            foreach ($error as $value) {
                                                                echo "<span style='color:red'>$value</span><br/>";
                                                            }
                                                            ?>
                                                        </td>
					    </tr>
						<tr>
                                                    <td><h4 id="h4.-bootstrap-heading"><b>Voter Image</b></h4><br/><input type="file" name="vimage[]" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" style="border: none; border-bottom: 2px solid steelblue;width: 80%;height:50px" /></td>
													
					    </tr>
						
							<tr>
                                                            <td><h4 id="h4.-bootstrap-heading"><b>Voter Adhar Number</b></h4><input type="text" name="vaadhar" id="aid" style="border: none; border-bottom: 2px solid steelblue;width: 80%;height:50px" value="<?php echo  isset($aadhar) ?  $aadhar:"" ?>"/></td>
							</tr>
							
							
							<tr>
                                                                    <td><h4 id="h4.-bootstrap-heading"><b>Voter Id</b></h4><input type="text" name="vid" style="border: none; border-bottom: 2px solid steelblue;width: 80%;height:50px" value="<?php echo isset($id)?$id:"" ?>"/></td>
							</tr>
							<tr>
                                                                    <td><h4 id="h4.-bootstrap-heading"><b>Area</b></h4>
                                                                         <select name="area" id="subtype" style="border: none; border-bottom: 2px solid steelblue;width: 80%;height:50px" required>
							<option>-------CHOOSE HERE-------</option>
                                                         <?php
                                                         
$sql="select distinct area from constituency";
$ret = $db->query($sql);
//echo $sql;
while($row = $ret->fetch_assoc()) {
echo  "<option value=\"".$row['area']."\">".$row['area']."</option>";
}
                                                         ?>
						    <!--option value="Alandur">By Election</option-->
							</select>
                                                                    </td>
							</tr>
							<tr>
                                                            <td><h4 id="h4.-bootstrap-heading"><b>Voter Date Of Birth</h4><input type="date" name="dob"  id="dob" data-date-inline-picker="true" style="border: none; border-bottom: 2px solid steelblue;width: 80%;height:50px"  value="<?php echo isset($dob)?$dob:"" ?>"/></td>
							</tr>
							
						</tbody>
					</table>
				</div>
			<div lass="grid_3 grid_5" style="width:40%;float:right" tyle="margin-left: 770px;float: left;margin-top: -260px">
                                                                                <div id="app" style="width:100px">
                                   <section class="cameras">
          <h2>Cameras</h2>
          <ul>
            <li v-if="cameras.length === 0" class="empty">No cameras found</li>
            <li v-for="camera in cameras">
              <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">{{ formatName(camera.name) }}</span>
              <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
                <a @click.stop="selectCamera(camera)">{{ formatName(camera.name) }}</a>
              </span>
            </li>
          </ul>
        </section>
                                <section class="scans" >
          <h2 style="display: none">Scans</h2>
          <ul v-if="scans.length === 0" style="display: none">
            <li class="empty">No scans yet</li>
          </ul>
          <transition-group name="scans1" tag="ul">
            <li v-for="scan in scans" :key="scan.date" :title="scan.content">{{ scan.content }}</li>
          </transition-group>
        </section>
                                 <div class="preview-container" style="width:200px;height:200px">
        <video id="preview"  style="width:200px;height:200px"></video>
      </div>
                            </div>
                        <div tyle="margin-left: 700px;margin-top:-600px ;float: left" >
					<img id="blah" alt="your photo here" src="./images/no-image.webp" width="200" height="200" /><br/><br/>
			   
			</div>
			 <textarea id="b64img"  name="b64img" style="width: 100%; height:50px; display:none" class="form-control"> </textarea>
			<!--h3>Confirmation</h3-->
				Finger Print*
				<div style="border: 2px solid steelblue;height: 100px;width: 100px;background-image: #F5F5F5;background-color: #F5F5F5;">
                                    <img id="imgFinger" style="width:100%;height:100%" src="./images/dummyfp1.png"/>
				</div>
			<input type="button" id="btnCapture" value="Capture" class=" capturebuttonpadding btn btn-primary btn-lg submit_buttom_padding" onclick="return Capture()" style="margin-top:20px"/><br/><br/><br/>		
			</div>	
                        </div>
			
			
                       <p class="one"><input type="submit" name="submit" value=" ADD VOTER DETAILS" style="background-color:steelblue;color:white ;height: 50px;width: 100%;border: 2px solid steelblue;"></p>
		
			</div>	
			</form>					<!-- /.row -->
		
		
			       
		
		</div>
	
<!-- footer -->
	
	
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
         <script type="text/javascript" src="./js/app.js"></script>
<!-- //for bootstrap working -->
</body>
       
</html>