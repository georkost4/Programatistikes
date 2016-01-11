<?php
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
echo 'First Name:'.$first_name.'<br />';
echo 'Last Name:'.$last_name.'<br />';
echo 'Email:'.$email.'<br />';
echo 'Username:'.$username.'<br />';
echo 'Password:'.$password.'<br />';
$dbc=mysqli_connect('localhost','nazdak','123123','store')
or die("Error connecting to database");
$query="INSERT INTO users VALUES (0,'$first_name','$last_name','$email','$username','$password')";
$result=mysqli_query($dbc,$query)
or die('Something went wrong');
echo 'You successfully Registered <br />';
echo '<a href="../main.php">Go back to main page</a>';
?>
