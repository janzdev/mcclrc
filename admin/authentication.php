<?php
session_start();
include('config/dbcon.php');

if(!isset($_SESSION['auth']))
{
  $_SESSION['message_error'] ="Login to Access Dashboard";
  header("Location:../admin_login.php");
  exit(0);
}
else  
{
  if($_SESSION['auth_role'] != "1")
  {
    $_SESSION['message_error'] = "<small>You are not authorized as ADMIN</small>";
    header("Location:../index.php");
    exit(0);
  }
  
}



?>