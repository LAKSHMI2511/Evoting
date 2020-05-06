<?php
require 'util.php';
$aahdid=$_POST['aid'];
$str = $_POST['imgVal'];
//$aahdid="1232";
$basepath="E:/xampp/htdocs/An_OnlineVotingQR/";
$basepath="C:/xampp/htdocs/OnlineVoting/Vote/An_OnlineVotingQR/";
$sql = "select * from voterinfo where vaadhar='$aahdid'";
file_put_contents('./temp/foo.png', base64_decode($str));
$ret = $db->query($sql);
//echo $sql;
$return;
if($ret){

    $row=$ret->fetch_assoc();
    $file1 = $basepath."fpimages/". $row['finger'];
    $file2=$basepath."temp/foo.png";
    $post = ['file1'=> $file1,"file2"=>$file2,"type"=>"verify"];
 //   print_r($post);
    
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,'http://localhost:8078/');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
  //echo http_build_query($post);
  $response = curl_exec($ch);
    //echo $response;
  $return['status']=$response;
    
}
else{
    $return['error']="Error";
    //echo "ERROR";
}

echo json_encode($return);
?>