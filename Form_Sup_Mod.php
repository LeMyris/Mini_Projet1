<?php
require('Hero.php');
$user="root";
$pass="";
$dbname="SuperHero";
$host="localhost";

$db=new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
$requete="";

$count = $db->exec("DELETE FROM hero ");