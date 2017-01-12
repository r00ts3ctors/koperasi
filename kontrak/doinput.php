<?php
	include "config.php"; 	
	
	$id = 1;
	$sql = "select max(id) as id from kontrak";
	$a = mysqli_query($db, $sql) or die(mysqli_error($db));
	$b = mysqli_fetch_object($a);
	if($b)
	{
		$id = $b->id + 1;
	}
	
	$data = array(						
				"nomor"=>  'KOPAB-' . mt_rand(100,999) . "." . mt_rand(100,999) . "." . str_pad($id, 3, "0", STR_PAD_LEFT),
				 "nama_depan" => $_POST["member"],
				 "nama_belakang" => $_POST["member2"],
				 "pekerjaan" => $_POST["pekerjaan"],
				 "alamat" => $_POST["alamat"],
				 "kabupaten" => $_POST["kabupaten"],
				 "kecamatan" => $_POST["kecamatan"],
				 "kelurahan" => $_POST["kelurahan"],
				 "provinsi" => $_POST["provinsi"],
				 "nilai" => str_replace(",", "", $_POST["nilai"]),
				 "masa_pinjaman" => str_replace(",", "", $_POST["masa"]),
				 "bunga" => str_replace(",", "", $_POST["bunga"]),
				 "angsuran" => str_replace(",", "", $_POST["angsuran"]),
				 "pokok" => str_replace(",", "", $_POST["pokok"]),
				 "tgl_awal_kontrak" => $_POST["awal"],
				 "tgl_akhir_kontrak" => $_POST["akhir"],
				);

	insert("kontrak", $data);
			
	
	header('Location:index.php');

?>


