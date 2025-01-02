<?php

error_reporting(0);
//connection create
$connect = mysqli_connect("localhost", "root", "", "users") or die("Connection failed");

//check connection
   if(!$connect){
    die("connection failed". mysqli_connect_error());
   }



?>