<?php
include_once("../connect.php");
$id=$_GET['prod_id'];

echo 'id='.$id;

$query="DELETE FROM products where product_id=$id";

$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc)) ;

if($result) echo 'Product successfully Removed';
header("location:RemoveProducts.php");

?>