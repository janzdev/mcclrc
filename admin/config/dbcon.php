<?php 
// $host = "localhost";
// $username = "root";
// $password = "";
// $database = "mcclrc";

$host = "127.0.0.1";
$username = "mcclrc";
$password = "mcclrc";
$database = "mcclrc";

$con = mysqli_connect("$host", "$username", "$password", "$database");

if(!$con)
{
  echo "Connection failed";
  die();
}
// else
// {
//   echo "Connected Successfully";
//   die();
// }
?>