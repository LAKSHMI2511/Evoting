<?php
require 'util.php';
session_unset(); 

// destroy the session 
session_destroy(); 

 header('Location: '.'./index.php'); 
?>
