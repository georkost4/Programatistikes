<?php
session_start();
if (isset($_SESSION['logged']))
{
    unset($_SESSION['logged']);
}
header("location:main.php");
?>