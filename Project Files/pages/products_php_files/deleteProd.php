<?php
include_once("../connect.php");
$id=$_GET['prod_id'];

$query="SELECT * FROM products where product_id=$id";

$result=mysqli_query($dbc,$query) or die (mysqli_error($dbc));

while($row=mysqli_fetch_array($result)) $tpath=$row['image_path'];


$path=explode("/",$tpath);

$path=$path[8].'/'.$path[9];
echo $path;

unlink("$path");
$query="DELETE FROM products where product_id=$id";

$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc)) ;

if($result) echo 'Product successfully Removed';
header("location:RemoveProducts.php");

?>