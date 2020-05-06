<?php
require 'util.php';
$aahdid=$_GET['aid'];

$sql="select area  from voterinfo where vaadhar='$aahdid' AND status='Accepted'" ;
$ret = $db->query($sql);
//echo $sql;
$res=0;
$result;
$area;
while($row = $ret->fetch_assoc()) {
$result['area'] = $row['area'];
$area=$row['area'];
$res=$res+1;
}
if($res==0){
    $result['error']="Invalid Aadhar Number";
    echo json_encode($result);
    die();
}


$sql="select distinct ename,etype,subtype from electioninfo where status='0'";
$ret = $db->query($sql);
//echo $sql;
$res=0;
$etype;
$subtype;
$ename;
while($row = $ret->fetch_assoc()) {
$etype=$row['etype'];
$ename=$row['ename'];
$subtype=$row['subtype'];
$res=$res+1;
}

if($res==0){
    
    $sql="select distinct ename,etype,subtype,status from electioninfo where  edate=date(now()) ";
$ret = $db->query($sql);
$i=0;
$status="";
    while($row = $ret->fetch_assoc()) {
        $status=$row['status'];
        $i=$i+1;
    }
    if($i==0){
    $result['error']="No Active Election ";
    }
    else{
        if($status == "1"){
            $result['error']=" Polling Closed";
        }
        else{
            $result['error']=" Polling Not Started";
        }
    }
    echo json_encode($result);
    die();
}

$sql="select * from votes where voter='$aahdid' and election='$ename' ";
$ret = $db->query($sql);
//echo $sql;

if ($ret->num_rows > 0){
    $result['error']="Already voted for this Election";
    echo json_encode($result);
    die();
}







$sql="select * from electioninfo a where a.subtype = (select $etype from constituency where area ='$area') and status='0'";
//echo $sql;
$ret = $db->query($sql);
$res=0;
$pop;
while($row = $ret->fetch_assoc()) {
$pop[]= ($row);
$res=$res+1;
}
if($res==0){
    $result['error']="No Active Election for this Constituency";
    echo json_encode($result);
    die();
}
$result['election']= $pop;

echo json_encode($result);
?>