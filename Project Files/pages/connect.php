<?php

$server_name="localhost";
$user_name="root";
$password="";
$database="store";

$dbc=mysqli_connect($server_name,$user_name,$password,$database)
or die('Server Error: ' .mysqli_error($dbc));

?>