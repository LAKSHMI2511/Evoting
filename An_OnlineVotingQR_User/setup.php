<?php
require 'util.php';
echo "OK";
  // $db->query("drop table admininfo");
  // $db->query("drop table admininfo");
   $db->query("drop table voterinfo");
   $db->query("drop table electioninfo");

   $sql = "CREATE TABLE admininfo (
 ID                      INTEGER auto_increment,
 name                    VARCHAR(100) NOT NULL,
 email                   VARCHAR(255) NOT NULL,
 password                VARCHAR(50) NOT NULL,
 mobile                  VARCHAR(12) NOT NULL,
 PRIMARY KEY  (`Id`),
 UNIQUE KEY `Email` (`Email`)
 );";
try{   
    
    if (!$result = $db->query($sql)) {
        echo $db->error;
    }
 //$db->query($sql);
 
} catch (Exception $e){
    echo " sSSs";
} 
$sql = "CREATE TABLE voterinfo (
 ID                      INTEGER auto_increment,
 vimage                   VARCHAR(100) NOT NULL,
 vaadhar                  VARCHAR(255) NOT NULL ,
 vname                    VARCHAR(50) NOT NULL,
 vid                      VARCHAR(12) NOT NULL ,
 dob                      VARCHAR(12) NOT NULL,
  PRIMARY KEY  (`Id`),
  UNIQUE KEY `vaadhar` (`vaadhar`),
 UNIQUE KEY `vid` (`vid`)
 );";


try{   
 $db->query($sql);
} catch (Exception $e){} 
 $sql = "CREATE TABLE electioninfo (
 ID                       INTEGER auto_increment,
 ename                    VARCHAR(200) NOT NULL,
 edate                    VARCHAR(100) NOT NULL,
 etype                    VARCHAR(100) NOT NULL,
 econ                     VARCHAR(200) ,
 STATUS                   VARCHAR(10)  not null,
 subtype                  VARCHAR(200) NOT NULL,
 cname                    VARCHAR(200) NOT NULL,
 flag                     varchar(200) not null,
 PRIMARY KEY  (`Id`)
 );";
try{   
 $db->query($sql);
} catch (Exception $e){} 

echo "OKe ee ";
 


