<?php
function login_validate()
	{
	$timeout = 10;
	$_SESSION["expires_by"] = time() + $timeout;
	}

function login_check() {
	$exp_time = $_SESSION["expires_by"];
		if (time() < $exp_time) {
			login_validate();
			return true;
		}
			else
			{
				unset($_SESSION["expires_by"]);
				return false;
			}
		}

function anti_injection($data){
	$filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	return $filter;
}

function tgl_indo($tgl){
$tanggal = substr($tgl,8,2);
$bulan   = getBulan(substr($tgl,5,2));
$tahun   = substr($tgl,0,4);
return $tanggal.' '.$bulan.' '.$tahun;
}
		function getBulan($bln)
		{
		switch ($bln){
		case 1:
		return "Januari";
		break;
		case 2:
		return "Februari";
		break;
		case 3:
		return "Maret";
		break;
		case 4:
		return "April";
		break;
		case 5:
		return "Mei";
		break;
		case 6:
		return "Juni";
		break;
		case 7:
		return "Juli";
		break;
		case 8:
		return "Agustus";
		break;
		case 9:
		return "September";
		break;
		case 10:
		return "Oktober";
		break;
		case 11:
		return "November";
		break;
		case 12:
		return "Desember";
		break;
		}
	}


	function noRek($panjang)
	{
		$karakter = '123456789';
		$string = '';
		for ($i = 0; $i <$panjang; $i++){
			$pos = rand(0, strlen($karakter)-1);
			$string .=$karakter{$pos};
		}
		return $string;
	}

	function rupiah($angka){
	 $rupiah=number_format($angka,0,',','.');
	 return $rupiah;
	}
	
	function rek($angka){
	 $rek=number_format($angka,0,',','.');
	 return $rek;
	}
	
?>
