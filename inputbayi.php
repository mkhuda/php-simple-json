<?php
include 'koneksi.php';

$namabayi = addslashes($_POST['namabayi']);
$tgllahir = $_POST['tgllahir'];
$jeniskelamin = $_POST['jeniskelamin'];
$namaayah = $_POST['namaayah'];
$namaibu = $_POST['namaibu'];
$alamat = $_POST['alamat'];
$idposyandu = $_POST['idposyandu'];
$iduser = $_POST['iduser'];

// echo $namabayi.' '.$tgllahir.' '.$jeniskelamin;

$query = "insert into bayi (nama_bayi, tanggal_lahir, jenis_kelamin, nama_ibu, nama_ayah, alamat_bayi, id_posyandu) values ('$namabayi', '$tgllahir', '$jeniskelamin', '$namaibu', '$namaayah', '$alamat', $idposyandu)";
$sql = mysqli_query($db, $query);
$i = 1;
$a = 0;
if($sql) {
	
	$data['idbayi'] = mysqli_insert_id($db);
	$id_bayi_kegiatan = mysqli_insert_id($db);
		$query_kegiatan = "insert into kegiatan_imunisasi (tanggal_imunisasi, id_bayi, id_vaksin, id_user, id_posyandu) 
		values 
		('', $id_bayi_kegiatan, 1, $iduser, $idposyandu),
		('', $id_bayi_kegiatan, 2, $iduser, $idposyandu),
		('', $id_bayi_kegiatan, 3, $iduser, $idposyandu),
		('', $id_bayi_kegiatan, 4, $iduser, $idposyandu),
		('', $id_bayi_kegiatan, 5, $iduser, $idposyandu),
		('', $id_bayi_kegiatan, 6, $iduser, $idposyandu),
		('', $id_bayi_kegiatan, 7, $iduser, $idposyandu),
		('', $id_bayi_kegiatan, 8, $iduser, $idposyandu),
		('', $id_bayi_kegiatan, 9, $iduser, $idposyandu),
		('', $id_bayi_kegiatan, 10, $iduser, $idposyandu)";
		$sql_kegiatan = mysqli_query($db, $query_kegiatan);
		if ($sql_kegiatan) {
			$data['error'] = FALSE;	
			echo json_encode($data, JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);
		} else {
			$data['error'] = TRUE;	
			echo json_encode($data, JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);
		}

	
} else {
	$data['error'] = TRUE;
	$data['sql'] = $query;
	echo json_encode($data, JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);

}