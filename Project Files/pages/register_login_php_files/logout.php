<?php
session_start();
if (isset($_SESSION['logged']))
{
    echo '$_SESSION[-logged-]='.$_SESSION['logged'];
    unset($_SESSION['logged']);
    unset($_SESSION['user']);
    session_destroy();
}
header("location:../main.php");
