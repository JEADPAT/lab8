<?php
$mysqli = new mysqli('localhost','root','1234','staff');
   if($mysqli->connect_errno){
      echo $mysqli->connect_errno.": ".$mysqli->connect_error;
   }
 ?>
