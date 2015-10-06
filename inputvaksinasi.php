<?php
include 'koneksi.php';

$idbayi = $_POST['id_bayi'];
$idposyandu = $_POST['id_posyandu'];
$hbo = $_POST['hbo'];
$bcg = $_POST['bcg'];
$polio1 = $_POST['polio1'];
$hb1 = $_POST['hb1'];
$polio2 = $_POST['polio2'];
$hb2 = $_POST['hb2'];
$polio3 = $_POST['polio3'];
$hb3 = $_POST['hb3'];
$polio4 = $_POST['polio4'];
$campak = $_POST['campak'];
$iduser = $_POST['iduser'];

$array_kegiatan = array($hbo,$bcg,$polio1,$hb1,$polio2,$hb2,$polio3,$hb3,$polio4,$campak);
$arrlength = count($array_kegiatan);

$error = "sukses";

for($x = 0; $x < $arrlength; $x++) {
    // echo $array_kegiatan[$x];
    if($array_kegiatan[$x] != "skip") {
	    $query = "UPDATE kegiatan_imunisasi SET tanggal_imunisasi=NOW(), id_user=$iduser WHERE id_vaksin = $x+1 AND id_bayi = $idbayi AND id_posyandu = $idposyandu";
		$sql = mysqli_query($db, $query);
		if ($sql == FALSE) {
			$error = "error";
		}
	}
}

echo $error;



?>