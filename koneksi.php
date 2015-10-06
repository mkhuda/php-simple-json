<?php

error_reporting(0);

// Konfigurasi Database

$db = new mysqli('localhost', 'username', 'password', 'dbname');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
} else {
	// echo "sukses";
}

// Konfigurasi global variabel
$home = "http://".$_SERVER['SERVER_NAME'];

?>