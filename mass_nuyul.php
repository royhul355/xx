<?php

$data = file_get_contents("list.txt");
$pisah = explode("\n", $data);
$jumlah = count($pisah);
unlink("xx.bat");
$xs = 0;
foreach ($pisah as $xa) {
	$pisax = explode("|", $xa);
	$user = $pisax[0];
	$pass = $pisax[1];
	$xs++;
	fwrite(fopen("xx.bat", "a"), "start php nuyul.php $user $pass\n");
	if ($xs%20==0 or $jumlah >= $xs) {
	fwrite(fopen("xx.bat", "a"), "exit\n");
		shell_exec("start xx.bat");
		unlink("xx.bat");
	    //sleep(1);
}
}