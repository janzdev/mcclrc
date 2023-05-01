<?php 
<<<<<<< HEAD
// $host = "localhost";
// $username = "root";
// $password = "";
// $database = "mcclrc";

=======
>>>>>>> a5dc42cdf9ffc138860bc31ee46f6303f9f74c55
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
