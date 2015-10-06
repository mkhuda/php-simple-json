<?php

// Login Proses with username and password params

include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];

$query = "select * from ayo_posyandu.user where username = '$username' and password = '$password'";
$sql = mysqli_query($db, $query);

// $data['status'] = $row;
if ($sql) {
	$row = mysqli_num_rows($sql);
	$fetch = mysqli_fetch_array($sql);
	if ($row >= 1) {
		$data['login_status'] = true;
		$data['id_user'] = $fetch['id_user'];
		$data['nama_petugas'] = $fetch['nama_petugas'];
	} else {
		$data['login_status'] = false;
	}

	echo json_encode($data, JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);
}

?>