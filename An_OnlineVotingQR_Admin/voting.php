<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Election a Society and People Category </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Election Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!--<link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>-->
<!--<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>-->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!---strat-slider---->
<script src="mfs100-9.0.2.6.js"></script>
<script type="text/javascript" src="./js/adapter.min.js"></script>
<script type="text/javascript" src="./js/vue.min.js"></script>
<script type="text/javascript" src="./js/instascan.min.js"></script>

<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery.blockUI.js"></script>
<!---//-slider---->
<style>
    .check
{
    opacity:0.5;
	color:#996;
	
}
</style>

<script language="javascript" type="text/javascript">
    
    function processResult(str){
    //alert(str);
    $xmlDoc = $.parseXML( str );
  
  
  uid = $xmlDoc.children[0].getAttribute('uid');
  $("#aid").val(uid);
    }
var ename;
var etype;
var esub;
var aadharno;
var candidateid;
        var flag =0;
        var quality = 60; //(1 to 100) (recommanded minimum 55)
        var timeout = 10; // seconds (minimum=10(recommanded), maximum=60, unlimited=0 )

//function to capture the finger prints.
function Confirm(){

    var img = document.getElementById('b64img').value;
    aid = $("#aid").val();
    aadharno=aid;
    //alert(aid);
 /*   $.ajax({
  type: "POST",
  url: "base64img.php",
  data: {'imgVal':img},
  success: function( data ) {
  $( ".result" ).html( data );
},
  dataType: "text/plain"
});*/
           url="verifyV.php";
   data={'imgVal':img,'aid':aid};
        $.post(url,data,function(){},'json')
                .done(function (response){
                     console.log(response);
					   $("#chpersondiv").css("display","block");
                 $("#fpres").html("Finger print Authorized");
             if(response['status']=="true"){
                 $("#chpersondiv").css("display","block");
                 $("#fpres").html("Finger print Authorized");
             }
             else{
                 $("#fpres").html("Voter Finger print did not match");
                  $("#chpersondiv").css("display","none");
             }
        })
        .fail(function (jqxhr, textStatus, error){
              var err = textStatus + ", " + error;
        console.log("Request Failed: " + err);
        });
 /*   $.ajax({
  type: "POST",
  url: "verifyV.php",
  data: {'imgVal':img,'aid':aid},
  success: function( data ) {
      console.log(data);
  $( ".result" ).html( data );
},
  dataType: "text/plain"
});
*/
//alert("ADS");
}
        function Capture() {
            try {
              
        
              //document.getElementById('txtStatus').value = "";
//              document.getElementById('imgFinger').src = "data:image/bmp;base64,";
/*              document.getElementById('txtImageInfo').value = "";
                document.getElementById('txtIsoTemplate').value = "";
                document.getElementById('txtAnsiTemplate').value = "";
                document.getElementById('txtIsoImage').value = "";
                document.getElementById('txtRawData').value = "";
                document.getElementById('txtWsqData').value = "";
*/

  $("#fpres").html("Please Keep your finger in Finger Print Reader");
            $("#btnConfirm").prop("disabled","disabled");
                var res = CaptureFinger(quality, timeout);
                if (res.httpStaus) {
                      flag = 1;
                      $("#fpres").html("Finget Print Captured");
//                    document.getElementById('txtStatus').value = "ErrorCode: " + res.data.ErrorCode + " ErrorDescription: " + res.data.ErrorDescription;
console.log(res);
                    if (res.data.ErrorCode == "0") {
                        console.log("SSS");
                        document.getElementById('imgFinger').src = "data:image/bmp;base64," + res.data.BitmapData;
                        document.getElementById('b64img').value = res.data.BitmapData;
                        $("#btnConfirm").removeAttr("disabled");
                        
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
                    else{
                         $("#fpres").html("Finger Print Not captured");
                       //   $("#fpres").html("Please Keep your finger in Finger Print Reader");
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
<script>
  $( function() {
      
  $("#aadSearch").click(function(){

aid = $("#aid").val();
if(!aid){
alert('Please enter your Aadhar Number');
return;
}
 $.getJSON("getVDetail.php?aid="+aid, function(result){
              //  console.log(result);
                err = result['error'];
                if(err){
                    alert(err);
                    return;
                }
                elec=result['election'];
                for(i=0;i<elec.length;i++){
                  elrow=elec[i];
                    console.log(elec[i]);
                   $("#eldiv").css('display','block');     
                 //if(lastUpdate!=result['ID'])
        //         {
                $("#elname").html(elrow['ename']);
                ename=elrow['ename'];
                $("#eldate").html(elrow['edate']);
                $("#elcons").html(elrow['subtype']);
                etype=elrow['etype'];
                esub = elrow['subtype'];
                $("#area").val(elrow['subtype']);
                canid="#candi"+(i+1);
                name="#name"+(i+1);
                item="#item"+(i+1);
                
                radid="#item"+(i+1);
                $(name).html(elrow['cname']);
                $(item).val(elrow['ID']);
                console.log(elrow['ID']);
                $(canid).prop("src","./upImages/"+elrow['flag']);
                 $(radid).click(function(){
                     
                     $(".img-check").removeClass("check");
                       $.blockUI({ message: $('#question'), css: { width: '275px' } });
                                    candidateid=$(this).val();
                                    $(this).parent().children("img").toggleClass("check");
                                console.log($(this).val());
			});
                     id=result['ID'];
                     temp=result['temperature'];
                     humid=result['humidity'];
                    water=result['water'];
                    msg=result['message'];
                    lastUpdate=id;
			$("#temp").val(temp);
			$("#water").val(water);
			$("#humid").val(humid);
			if(msg!="NO")
			   $("#msg").val(msg);

        }
        console.log(i);
	//	 $("#confirmdiv").css("display","block");
        if(i!=0){
            $("#confirmdiv").css("display","block");
        }

            });

});
   
  } );
  </script>

</head>
<body>
<!-- header -->
	<div class="header_bg">
		<div class="container">
			<!-----start-header----->
			<div class="header">
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" alt=" " /></a>
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
							<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                                                        <!--li class="act"><a href="voters.php">Voting</a></li-->
                                                        <li><a href="index.php">Logout</a></li>
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
			<div class="grid_3 grid_4">
				<h3 class="hdg">Please enter your Aadhar Number</h3>
				<div class="bs-example">
					<table class="table">
						<tbody>
						
							<tr>
                                                            <td><h4 id="h4.-bootstrap-heading"><b>Adhar Number</b></h4><input type="text" style="border: none; border-bottom: 2px solid steelblue;width: 60%;height:50px" id="aid"/><span style="font-size: 12px" class="glyphicon glyphicon-search" id="aadSearch"></span></td>
                                        <td rowspan="2">
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
                                        </td>
							</tr>
						
							<tr>
							<td><h4 id="h4.-bootstrap-heading"><b>Constituency</h4><input type="text" readonly style="border: none; border-bottom: 2px solid steelblue;width: 60%;height:50px"id="area"/></td>
							</tr>
	<tr>
	<td><h4 id="h4.-bootstrap-heading"><b>Election</h4>
            <div style="width:60%;height:30px;display:none" id="eldiv">
                
            <div style="float:left" id="elname"></div>
            <div style="float:right">Date  :
                <span id="eldate"></span></div>
                
                <div style="width:40%">
            Constituency :<span  id="elcons"></span>
            </div>
            </div>
        </td>
	</tr>
						</tbody>
					</table>
				</div>
			</div>
                            
                        <form action="" method="post">
                                               <div  class="grid_3 grid_5" id="confirmdiv" style="display: none">
			<h3>Confirmation</h3>
                        <textarea id="b64img"  name="b64img" style="width: 100%; height:50px; display:none" class="form-control"> </textarea>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Finger Print*
				<div style="order: 2px solid steelblue;height: 100px;width: 35%;ackground-image: #F5F5F5;ackground-color: #F5F5F5;">
                                    <div style="border: 2px solid steelblue;width:172px;height: 100px;background-image: #F5F5F5;background-color: #F5F5F5;">
			<img id="imgFinger" style="width:167px;height:100%" src="./images/dummyfp1.png"/>
                        </div>
                          <span id="fpres"></span><br>
                        <input type="button" id="btnCapture" value="Capture" lass=" capturebuttonpadding btn btn-primary btn-lg submit_buttom_padding" onclick="return Capture()" style="margin-top:20px"/>		
                        <input type="button" id="btnConfirm" value="Confirm" lass=" capturebuttonpadding btn btn-primary btn-lg submit_buttom_padding" onclick="return Confirm()"  style="margin-top:20px"/>		
				
                                </div>
			
			</div>	
                            <br> 
			<div class="grid_3 grid_5" style="height: 170px;display: none" id="chpersondiv">
				<h3>Choose a Person</h3>
                                <div class="col-md-3">
                                    <label class="btn btn-primary" style="cursor:default">
                                     <img id="candi1" src="./images/no-image.webp" alt="..." class="img-thumbnail img-check" style="height:100px;width:150px">
                                     <input type="radio" name="chk1" id="item1" value="val1" class="hidden" autocomplete="off">
                                    </label><br>
                                    <span id="name1"></span>
                                </div>
                                 <div class="col-md-3">
                                    <label class="btn btn-primary" style="cursor:default">
                                     <img  id="candi2" src="./images/no-image.webp" alt="..." class="img-thumbnail img-check" style="height:100px;width:150px">
                                     <input type="radio" name="chk1" id="item2" value="val2" class="hidden" autocomplete="off">
                                    </label><br>
                                     <span id="name2"></span>
                                </div>
                                 <div class="col-md-3">
                                    <label class="btn btn-primary" style="cursor:default">
                                     <img  id="candi3" src="./images/no-image.webp" alt="..." class="img-thumbnail img-check" style="height:100px;width:150px">
                                     <input type="radio" name="chk1" id="item3" value="val3" class="hidden" autocomplete="off">
                                    </label><br>
                                     <span id="name3"></span>
                                </div>
                                 <div class="col-md-3">
                                    <label class="btn btn-primary" style="cursor:default">
                                     <img  id="candi4" src="./images/no-image.webp" alt="..." class="img-thumbnail img-check" style="height:100px;width:150px">
                                     <input type="radio" name="chk1" id="item4" value="val4" class="hidden" autocomplete="off">
                                    </label><br>
                                     <span id="name4"></span>
                                </div>
                                
				<!--h1>
				<input type="submit" value="Nominee1" style="height: 40px;font-size: 20px;background-color: grey;color: white;width: 15%">
				<input type="submit" value="Nominee2" style="height: 40px;font-size: 20px;background-color:deepskyblue;color: white;width: 15%"><br/>
				<input type="submit" value="Nominee3" style="height: 40px;font-size: 20px;background-color:green ;color:white;width: 15% ">
				<input type="submit" value="Nominee4" style="height: 40px;font-size: 20px;background-color:steelblue ;color:white; width: 15%"><br/>
				<input type="submit" value="Nominee5"  style="height: 40px;font-size: 20px;background-color:orange ;color: white;width: 15%">
				<input type="submit" value="Nominee6" style="height: 40px;font-size: 20px;background-color: red;color: white;width: 15%"><br/>
				</h1-->
                        </div>
         
                            <br>
                            <p class="one"><div style="background-color:steelblue;color:white ;height: 50px;width: 100%;border: 2px solid steelblue;"></div>
                            <!--input type="submit" value="CLICK HERE TO POLL YOUR VOTE" style="background-color:steelblue;color:white ;height: 50px;width: 100%;border: 2px solid steelblue;"--></p>
		</form>	
			</div>	
						<!-- /.row -->
		
		
			
		
		</div>
	</div>
<!-- //typography-page -->
<script type="text/javascript"> 
  
    $(document).ready(function() { 
 
        $('#test').click(function() { 
            $.blockUI({ message: $('#question'), css: { width: '275px' } }); 
        }); 
 
        $('#yes').click(function() { 
            console.log("Aadhar "+aadharno);
            console.log("ename " +ename);
            console.log("candidate "+candidateid);
            // update the block message 
            $.blockUI({ message: "<h1>Registering your Vote</h1>" }); 
 
         /*   $.ajax({ 
                url: 'wait.php', 
                cache: false, 
                complete: function() { 
                    // unblock when remote call returns 
                 //  location.href = './index.php';
                } 
            }); */
         url1="castVote.php";
          data1={'aadhar':aadharno,'ename':ename,'candidate':candidateid,'etype':etype,'esubtype':esub};
            $.post(url1,data1,function(){},'json')
                .done(function (response){
                    location.href = './index.php';
            }).fail(function (jqxhr, textStatus, error){
              var err = textStatus + ", " + error;
        console.log("Request Failed: " + err);
        });
        }); 
 
        $('#no').click(function() { 
            $.unblockUI(); 
            return false; 
        }); 
 
    }); 
</script> 
 
 

 

<div id="question" style="display:none; cursor: default"> 
        <h1>Confirm to Cast your Vote.</h1> 
        <input type="button" id="yes" value="Confirm" /> 
        <input type="button" id="no" value="No" /> 
</div> 
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
 <script type="text/javascript" src="./js/app.js"></script>
	 <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
</body>
</html>