<?php
/**
 * Created by PhpStorm.
 * User: Aziz
 * Date: 25/12/2018
 * Time: 16:36
 */
require_once("./database.php");
require_once("./functions.php");
global $db;
$datedeconnection=date("Y-m-d h:i:sa");
$sql = "UPDATE u SET lastconnection=?, connecte=?  WHERE id=?";
$stmt = $db->prepare($sql);
$stmt->execute([$datedeconnection,'1','4']);

print_r($stmt);
print_r($sql);