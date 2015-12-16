<?php

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$age=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];

echo 'First Name:'.$first_name.'<br />';
echo 'Last Name:'.$last_name.'<br />';
echo 'Age:'.$age.'<br />';
echo 'Username:'.$username.'<br />';
echo 'Password:'.$password.'<br />';

$dbc=mysqli_connect('localhost','root','','store')
or die("Error connecting to database");

$query="INSERT INTO users VALUES (0,'$first_name','$last_name',$age,'$username','$password')";

$result=mysqli_query($dbc,$query)
or die('Something went wrong');

echo 'You successfully Registered <br />';

echo '<a href="main.php">Go back to main page</a>';

?>