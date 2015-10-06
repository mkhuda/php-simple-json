<?php
include 'koneksi.php';
$idposyandu = $_POST['idposyandu'];

$query = "select * from ayo_posyandu.bayi where id_posyandu = $idposyandu";
$sql = mysqli_query($db, $query);

// $data['status'] = $row;
if ($sql) {
	$row = mysqli_num_rows($sql);

	$response["list_bayi"]   = array();
	if ($row > 0) {
		$response["error"]   = FALSE;
		while ($fetch = mysqli_fetch_array($sql)) {
			$data['id_bayi'] = $fetch['id_bayi'];
			$data['nama_bayi'] = $fetch['nama_bayi'];
			$data['nama_ibu'] = $fetch['nama_ibu'];
			$data['nama_ayah'] = $fetch['nama_ayah'];
			array_push($response['list_bayi'], $data);
		}	
	} else {
		$response["error"]   = TRUE;
	}
	

	echo json_encode($response, JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);
}

?>