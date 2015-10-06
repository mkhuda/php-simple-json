<?php
include 'koneksi.php';

$iduser = $_POST['iduser'];

$query = "SELECT
	posyandu.nama_posyandu,
	user_posyandu.id_user,
	user_posyandu.id_posyandu,
	user.nama_petugas,
	user.username
FROM
	user_posyandu
	INNER JOIN user
	 ON user_posyandu.id_user = user.id_user
	INNER JOIN posyandu
	 ON user_posyandu.id_posyandu = posyandu.id_posyandu
WHERE
	user_posyandu.id_user = $iduser";
// $query = "select * from ayo_posyandu.posyandu where id_user=$iduser";
$sql = mysqli_query($db, $query);

// $data['status'] = $row;
if ($sql) {
	$row = mysqli_num_rows($sql);
	$response["list_posyandu"]   = array();
	if ($row > 0) {
		$response["error"]   = FALSE;
		while ($fetch = mysqli_fetch_array($sql)) {
			$data['id_posyandu'] = $fetch['id_posyandu'];
			$data['nama_posyandu'] = $fetch['nama_posyandu'];
			array_push($response['list_posyandu'], $data);
		} 
	} else {
		$response["error"] = TRUE;
	}	
	echo json_encode($response, JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);
}

?>