<?php
	session_start();
	include "database.php";
	require_once "fungsi.php";

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));

	// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
		echo "<center>";
		echo "<h1> Maaf, Password atau User anda Salah</h1>";
		echo "<center>";
}
	else{
// level 1 adalah administrator dan 2 adalah konsultan
	$login=mysql_query("SELECT * FROM login WHERE username='$username' AND password='$pass' and level ='1'");
	$ketemu=mysql_num_rows($login);
	$r=mysql_fetch_array($login);


	$login2=mysql_query("SELECT * FROM login WHERE username='$username' AND password='$pass' and level ='2'");
	$ketemu2=mysql_num_rows($login2);
	$x=mysql_fetch_array($login2);
	
	$login3=mysql_query("SELECT * FROM login WHERE username='$username' AND password='$pass' and level ='3'");
	$ketemu3=mysql_num_rows($login3);
	$y=mysql_fetch_array($login3);
	
	$login4=mysql_query("SELECT * FROM login WHERE username='$username' AND password='$pass' and level ='4'");
	$ketemu4=mysql_num_rows($login4);
	$t =mysql_fetch_array($login4);

	$login5=mysql_query("SELECT * FROM anggota WHERE username='$username' AND password='$pass'");
	$ketemu5=mysql_num_rows($login5);
	$m =mysql_fetch_array($login5);

	if ($ketemu > 0)
		{
			// untuk administratotr
	$_SESSION['username']	= $r['username'];
	$_SESSION['passuser']		= $r['password'];
	$_SESSION['level']		= $r['level'];
	$_SESSION['idPetugas']	= $r['idPetugas'];
	$_SESSION['kodeKoperasi']	= $r['kodeKoperasi'];
	$_SESSION['nama']		= $r['nama'];

		header('location: ../index.php?modul=home');
	}
// untuk konsultan 
	elseif($ketemu2 > 0)
	{
	$_SESSION['username']	= $x['username'];
	$_SESSION['passuser']		= $x['password'];
	$_SESSION['level']		= $x['level'];
	$_SESSION['idPetugas']	= $x['idPetugas'];
	$_SESSION['kodeKoperasi']	= $x['kodeKoperasi'];
	$_SESSION['nama']		= $x['nama'];

		header('location: ../index.php?modul=home');

	}
	elseif($ketemu3 > 0)
	{
	$_SESSION['username']	= $y['username'];
	$_SESSION['passuser']	= $y['password'];
	$_SESSION['level']		= $y['level'];
	$_SESSION['idPetugas']	= $y['idPetugas'];
	$_SESSION['kodeKoperasi']	= $y['kodeKoperasi'];
	$_SESSION['nama']		= $y['nama'];

		header('location: ../cs.php?modul=home');

	}
	elseif($ketemu4 > 0)
	{
	$_SESSION['username']	= $t['username'];
	$_SESSION['passuser']	= $t['password'];
	$_SESSION['level']		= $t['level'];
	$_SESSION['idPetugas']	= $t['idPetugas'];
	$_SESSION['kodeKoperasi']	= $t['kodeKoperasi'];
	$_SESSION['nama']		= $t['nama'];

		header('location: ../teller.php?modul=home');

	}
	
		elseif($ketemu5 > 0)
	{
	$_SESSION['username']	= $m['username'];
	$_SESSION['passuser']	= $m['password'];


	$_SESSION['nama']		= $m['nama'];

		header('location: ../anggota.php?modul=home');

	}
// untuk level user

	else{

		  echo "<br><center></center><br><center><h1>LOGIN GAGAL! </h1><br>
				<h2>Username / Password Anda tidak benar</h2>
					<h3>Silahkan coba lagi atau kontak admin</h3><br><br>";
		  echo "<a href=../user.php><h2><b>ULANGI LAGI</b></h2></a></center>";
		  echo '<META HTTP-EQUIV="Refresh" Content="5; URL=../">';
		}
}
?>
