<?php
include_once("../connect.php");
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$age=$_POST['age'];
$username=$_POST['username'];
$password=$_POST['password'];
echo 'First Name:'.$first_name.'<br />';
echo 'Last Name:'.$last_name.'<br />';
echo 'Age:'.$age.'<br />';
echo 'Username:'.$username.'<br />';
echo 'Password:'.$password.'<br />';


$query="INSERT INTO users VALUES (0,'$first_name','$last_name','$age','$username','$password')";
$result=mysqli_query($dbc,$query)
or die('Something went wrong');
echo 'You successfully Registered <br />';
echo '<a href="../main.php">Go back to main page</a>';
?>
