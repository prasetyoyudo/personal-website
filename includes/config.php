<?php  

global $conn;
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'my_blog';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
	die("Connection Failed : ".mysqli_connect_error());
}

?>