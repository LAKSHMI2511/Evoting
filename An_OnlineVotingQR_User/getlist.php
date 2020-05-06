<?php
require "util.php";

$state = ["R k Nagar","Perambur",
"Kolathur",
"Villivakkam",	
"Thiru. Vi. Ka. Nagar (SC)",
"Egmore (SC)",
"Royapuram",
"Harbour",	
"Chepauk-Thiruvallikeni",	
"Thousand Lights",	
"Anna Nagar",	
"Virugambakkam",	
"Saidapet",	
"T. Nagar",	
"Mylapore",	
"Velachery"];
$stlist;
foreach($state as $key){
    $stlist[$key]=$key;
}

$lok=["Chennai Central",
"Chennai North", 
"Chennai South"];
$loklist;
foreach($lok as $key){
    $loklist[$key]=$key;
}

$ml=["Thiruvottiyur",
"Manali",
"Madhavaram",
"Tondiarpet",
"Royapuram",
"Thiru. Vi. Ka. Nagar",
"Ambattur",
"Anna Nagar",
"Teynampet",
"Kodambakkam",
"Valasaravakkam",
"Alandur",
"Adyar",
"Perungudi",
"Sholinganallur"];
$mlist;
foreach($ml as $key){
    $mlist[$key]=$key;
}

$type=$_GET['type'];
$colmn="";
if($type==="local"){
    //echo json_encode($mlist);
    $colmn="local";
}
elseif($type==="state"){
    //echo json_encode($stlist);
    $colmn="state";
}
elseif($type==="central"){
    //echo json_encode($loklist);
    $colmn="central";
}

$sql="select distinct $colmn from constituency";
$ret = $db->query($sql);
//echo $sql;
while($row = $ret->fetch_assoc()) {
$result[$row[$colmn]] = $row[$colmn];
}
echo json_encode($result);


?>