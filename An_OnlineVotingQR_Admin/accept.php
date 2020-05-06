<?php
require 'util.php';

$id = $_GET['id'];
$sql = "UPDATE voterinfo SET status='Accepted'  WHERE ID='".$id."'";
$db->query($sql);
header("Location: request.php");

?> 

