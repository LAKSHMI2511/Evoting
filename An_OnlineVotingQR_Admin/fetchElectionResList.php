<?php
require "util.php";
$subtype=$_GET['subtype'];
$etype = $_GET['etype'];
$sql = "select distinct ename,etype,edate,subtype from electioninfo where status='2' and etype='$etype' and subtype='$subtype'";
 $res = $db->query($sql);
$result= Array();   
$i=0;
         while ($row = $res->fetch_assoc()) {
          $result[$i]=$row;
          $i=$i+1;
         }
         if($i==0){
             
             $result1['ename']='No Records Found';
             $result1['etype']=' ';
             $result1['edate']=' ';
             $result1['subtype']=' ';
             $result[0]=$result1;
             
            // [{"ename":"State Election 2018","etype":"state","edate":"0012-12-12","subtype":"Mylapore"}]
             
         }
         echo json_encode($result);
?>