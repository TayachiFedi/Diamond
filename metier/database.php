<?php

class database{
 function getConnexion(){
		$servername="localhost";
		$dbname="diamond";
		$username="root";
		$password="";
		$conn=new PDO("mysql:host=".$servername.";"."dbname=".$dbname,$username,$password);
		return $conn;
	}
}
$db=(new database())->getConnexion();


?>