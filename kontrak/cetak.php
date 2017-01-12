<?php include "config.php";
require_once 'vendor/autoload.php';

 function terbilang ($angka) {
        $angka = (float)$angka;
        $bilangan = array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan','Sepuluh','Sebelas');
        if ($angka < 12) {
            return $bilangan[$angka];
        } else if ($angka < 20) {
            return $bilangan[$angka - 10] . ' Belas';
        } else if ($angka < 100) {
            $hasil_bagi = (int)($angka / 10);
            $hasil_mod = $angka % 10;
            return trim(sprintf('%s Puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod]));
        } else if ($angka < 200) {
            return sprintf('Seratus %s', terbilang($angka - 100));
        } else if ($angka < 1000) {
            $hasil_bagi = (int)($angka / 100);
            $hasil_mod = $angka % 100;
            return trim(sprintf('%s Ratus %s', $bilangan[$hasil_bagi], terbilang($hasil_mod)));
        } else if ($angka < 2000) {
            return trim(sprintf('Seribu %s', terbilang($angka - 1000)));
        } else if ($angka < 1000000) {
            $hasil_bagi = (int)($angka / 1000); 
            $hasil_mod = $angka % 1000;
            return sprintf('%s Ribu %s', terbilang($hasil_bagi), terbilang($hasil_mod));
        } else if ($angka < 1000000000) {
            $hasil_bagi = (int)($angka / 1000000);
            $hasil_mod = $angka % 1000000;
            return trim(sprintf('%s Juta %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
        } else if ($angka < 1000000000000) {
            $hasil_bagi = (int)($angka / 1000000000);
            $hasil_mod = fmod($angka, 1000000000);
            return trim(sprintf('%s Milyar %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
        } else if ($angka < 1000000000000000) {
            $hasil_bagi = $angka / 1000000000000;
            $hasil_mod = fmod($angka, 1000000000000);
            return trim(sprintf('%s Triliun %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
        } else {
            return 'Data Salah';
        }
    }
	

$id = $_GET['id'];

$sql = "select * from kontrak where id = '$id'";
$a = mysqli_query($db,$sql) or die(mysqli_error($db));
$b = mysqli_fetch_object($a);
if(!$b)
{
	header('Location:index.php');
	exit();
}

date_default_timezone_set('UTC');
error_reporting(E_ALL);
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('Bentuk_kontrak.docx');
$templateProcessor->setValue('NOMOR', $b->nomor);
$templateProcessor->setValue('MEMBER', $b->nama_depan . " " . $b->nama_belakang);
$templateProcessor->setValue('PEKERJAAN', $b->pekerjaan);
$templateProcessor->setValue('ALAMAT', $b->alamat);
$templateProcessor->setValue('PROVINSI', $b->provinsi);
$templateProcessor->setValue('KECAMATAN', $b->kecamatan);
$templateProcessor->setValue('KELURAHAN', $b->kelurahan);
$templateProcessor->setValue('NILAI', number_format($b->nilai));
$templateProcessor->setValue('NILAI2', terbilang($b->nilai));
$templateProcessor->setValue('BUNGA', number_format($b->bunga));
$templateProcessor->setValue('BUNGA2', terbilang($b->bunga));
$templateProcessor->setValue('ANGSURAN', number_format($b->angsuran));
$templateProcessor->setValue('ANGSURAN2', terbilang($b->angsuran));
$templateProcessor->setValue('PINJAMAN', number_format($b->nilai));
$templateProcessor->setValue('PINJAMAN2', terbilang($b->nilai));
$templateProcessor->setValue('MASA', number_format($b->masa_pinjaman));
$templateProcessor->setValue('MASA2', terbilang($b->masa_pinjaman));
$templateProcessor->setValue('POKOK', number_format($b->pokok));
$templateProcessor->setValue('POKOK2', terbilang($b->pokok));
$templateProcessor->setValue('AKHIR', date('d-M-Y', strtotime($b->tgl_akhir_kontrak)));
$templateProcessor->setValue('PERIODE', str_pad(date('m', strtotime($b->tgl_awal_kontrak)) + 1, 2, '0', STR_PAD_LEFT) . '/' . date('Y'));
$templateProcessor->saveAs("kontrak/$b->nomor.docx");

header('Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');


header('Content-Disposition: attachment; filename="' . $b->nomor .  '.docx"');

readfile("kontrak/$b->nomor.docx");
?>