<?php 

require_once("database.php");

function Rhash($str)
{
$method="aes128";
$pass="root950";
$iv = "0204201602184400";
return openssl_encrypt ($str, $method, $pass,true,$iv);
}

function unhash($str)
{
$method="aes128";
$pass="root950";
$iv = "0204201602184400";
return openssl_decrypt ( $str , $method , $pass, true,$iv);
}

function amiLoggedIn(){
	if (session_status() != PHP_SESSION_ACTIVE) {
		session_start();
	}
	if(isset($_SESSION["user-token"])) return true;
	else return false;
}

function getuserData(){
	$id =unhash($_SESSION["user-token"]);
	global $db;
	$query=$db->prepare("Select * from u where id = :id LIMIT 1");
		$query->bindParam(':id',$id);
		$query->execute();
		$res = $query->fetchAll();
		if($query->rowCount()){
			return $res[0];
		}
		else return null;
}

function logout(){
session_destroy();
}
function logoutplus()
{
    global $db;
    if(amiLoggedIn()) { $res = getuserData();}
    $id = $res['id'];
    echo $id;
    $etat = 0;
    $datedeconnection = date("Y-m-d h:i:sa");
    $sql = "UPDATE u SET lastconnection=?, connecte=?  WHERE id=?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$datedeconnection, $etat, $id]);
    session_destroy();
}