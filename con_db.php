<?php
$server = 'localhost';
$username = 'id16929386_modelodual';
$password = 'iU3EUE^6G<IzwOH$';
$database = 'id16929386_sistemadual';
try{
	$conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
} catch (PDOException $e){
	die('Connection failed: '.$e->getMessage());
}
?>