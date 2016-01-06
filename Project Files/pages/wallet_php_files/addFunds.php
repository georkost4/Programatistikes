<?php
include_once("../connect.php");

$id1=$_POST['id'];
$amount=$_POST['amount'];

echo 'Amount:'.$amount.'<br />';

$query1="SELECT * FROM funds where id='$id1'";
$result1=mysqli_query($dbc,$query1) or die(mysqli_error($dbc));
if($result1)
{
    $balanc=showFunds($dbc,$id1);
    $query="UPDATE funds set balance = ($amount+$balanc) where id = '$id1' ";
    $result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
    echo 'done<br />';
    $balance=showFunds($dbc,$id1);
    echo 'New Balance:'.$balance.'<br /> <br />'.
        '<a href="../main.php">Go Home</a>';
}
else
{
    $query="INSERT INTO funds values($id1,$amount)";

    $result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));

    echo 'first time';
}

function showFunds($link,$user)
{
    $query="SELECT balance from funds where id=$user";
    $result=mysqli_query($link,$query) or die(mysqli_error($link));
    $row=mysqli_fetch_array($result);
    return $row['balance'];
}
header("location:wallet.php?id=$id1&");

?>