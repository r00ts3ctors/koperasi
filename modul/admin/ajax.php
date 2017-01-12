<?php 
include "database.php";
$act = $_GET['act'];
if($act == 1)
{
	$val = $_GET['provinsi'];
	$sql="select * from kabupaten where IDProvinsi = (select IDProvinsi from Provinsi where Nama = '$val')  order by Nama";
	$a = mysql_query($sql);

	$str = "<option value=''>-Pilih Kabupaten-</option>";
	while($b= mysql_fetch_object($a))
	{
		$str.="<option value='$b->Nama'>$b->Nama</option>";
	}
	echo $str;
}
else if($act == 2)
{
	$val = $_GET['kabupaten'];
	$sql="select * from kecamatan where IDKabupaten = (select IDKabupaten from Kabupaten where Nama = '$val')  order by Nama";
	$a = mysql_query($sql);
	$str = "<option value=''>-Pilih Kecamatan-</option>";
	while($b= mysql_fetch_object($a))
	{
		$str.="<option value='$b->Nama'>$b->Nama</option>";
	}
	echo $str;
}	
else if($act == 3)
{
	$val = $_GET['kecamatan'];
	$sql="select * from kelurahan where IDKecamatan = (select IDKecamatan from Kecamatan where Nama = '$val')  order by Nama";
	$a = mysql_query($sql);
	$str = "<option value=''>-Pilih Kelurahan-</option>";
	while($b= mysql_fetch_object($a))
	{
		$str.="<option value='$b->Nama'>$b->Nama</option>";
	}
	echo $str;
}			
?>