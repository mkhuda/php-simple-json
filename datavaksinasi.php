<?php
include 'koneksi.php';

// Get vaksin data

$idbayi = $_POST['id_bayi'];

$query = "select bi.id_bayi, bi.nama_bayi, bi.tanggal_lahir, vi.id_vaksin, vi.jenis_vaksin, ki.tanggal_imunisasi from ayo_posyandu.kegiatan_imunisasi as ki 
inner join ayo_posyandu.bayi as bi 
on ki.id_bayi = bi.id_bayi
inner join ayo_posyandu.vaksin as vi 
on vi.id_vaksin = ki.id_vaksin where bi.id_bayi = $idbayi";
$sql = mysqli_query($db, $query);

// $data['status'] = $row;
if ($sql) {
	$row = mysqli_num_rows($sql);

	$response["vaksin_bayi"] = array();

	if ($row > 0) {
		$response["error"] = FALSE;
		$response["judul_bayi"] = '';
		$response['tanggal_lahir'] = '';
		$tanggal_imunisasi = '';
		while ($fetch = mysqli_fetch_array($sql)) {
			$data['id_bayi'] = $fetch['id_bayi'];
			$data['nama_bayi'] = $fetch['nama_bayi'];
			$response['tanggal_lahir'] = $fetch['tanggal_lahir'];
			$data['id_vaksin'] = $fetch['id_vaksin'];
			$data['jenis_vaksin'] = $fetch['jenis_vaksin'];
			$response["judul_bayi"] = $fetch['nama_bayi'];
			if ($fetch['tanggal_imunisasi'] == '0000-00-00') { 
				$tanggal_imunisasi = 'No date set';
			} else {
				$tanggal_imunisasi = $fetch['tanggal_imunisasi'];
			}
			$data['tanggal_imunisasi'] = $tanggal_imunisasi;
			array_push($response['vaksin_bayi'], $data);
		}	
	} else {
		$response["error"]   = TRUE;
	}

	echo json_encode($response, JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);
}

?>