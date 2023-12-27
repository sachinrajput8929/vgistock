<?php 
error_reporting(0);
session_start();
if(!isset($_SESSION['mobile']))
{
    header("location:index.php");
}
?>