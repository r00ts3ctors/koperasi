<?php

	$host = 'localhost'; // tetap gak perlu di rubah
	$user = 'root'; // sesuaikan dengan hosting
	$passw = ''; // password yang di sesuaikan dengan hosting
	$db = 'koperasi'; // database di hostingan

	$connect = mysql_connect($host,$user,$passw);
	$ok = mysql_select_db("$db",$connect); // cek database na

?>