<?php
// Kumpulan FUnction2
$kode = "salah";
function rc($panjang,$i =1) {
		$data = array_merge(range("a", "z"), range("A", "Z"));
		if (isset($i)) {
			$data = array_merge(range("a", "z"), range("A", "Z"), range(0, 9));
		}
		$a = "";
		for ($i = 0; $i < $panjang; $i++) {
			$a .= $data[array_rand($data)];
		}
		return $a;

	}

// Batas Function
// Variabel 

if (!isset($argv[0]) or !isset($argv[1])) {
	die("Variabel Gak Terpenuhi");
}else
{
	$email = $argv[1];
	$pass = $argv[2];
}

// 
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://mgamer.back4app.io/functions/email_login_v1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"name\":\"\",\"email\":\"$email\",\"ipdata\":\"\",\"device\":\"".rc(16,1)."\",\"password\":\"$pass\",\"type\":\"login\"}");
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = 'X-Parse-Application-Id: pFNMj1vsRi4Xe8bCrCRgaK50wSRHGlXR4lOpYxiV';
$headers[] = 'X-Parse-App-Build-Version: 47';
$headers[] = 'X-Parse-App-Display-Version: 1.4.7';
$headers[] = 'X-Parse-Os-Version: 5.1.1';
$headers[] = 'User-Agent: Parse Android SDK API Level 22';
$headers[] = 'X-Parse-Installation-Id: ' . rc(8, 1) . '-' . rc(4, 1) . '-' . rc(4, 1) . '-' . rc(4, 1) . '-' . rc(12, 1) . '';
$headers[] = 'X-Parse-Client-Key: H6pxBYl8gQ4JGAsBn6ouMeWtEqhqzE13YPdNrvnd';
$headers[] = 'Content-Type: application/json';
			//$headers[] = 'Content-Length: 303';
$headers[] = 'Host: mgamer.back4app.io';
$headers[] = 'Connection: close';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
else
{
    $json = json_decode($result, 1);
    $status = $json['result'][0];
    //print_r($json);
    if ($status == "success") {
    	$token = $json['result']['1'];
    	// Add Reff 

    	$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://mgamer.back4app.io/functions/add_friend');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"name\":\"$kode\"}");

		$headers = array();
			$headers[] = 'X-Parse-Session-Token: '.$token;
			$headers[] = 'X-Parse-Application-Id: pFNMj1vsRi4Xe8bCrCRgaK50wSRHGlXR4lOpYxiV';
			$headers[] = 'X-Parse-App-Build-Version: 47';
			$headers[] = 'X-Parse-App-Display-Version: 1.4.7';
			$headers[] = 'X-Parse-Os-Version: 5.1.1';
			$headers[] = 'User-Agent: Parse Android SDK API Level 22';
			$headers[] = 'X-Parse-Installation-Id: ' . rc(8, 1) . '-' . rc(4, 1) . '-' . rc(4, 1) . '-' . rc(4, 1) . '-' . rc(12, 1) . '';
			$headers[] = 'X-Parse-Client-Key: H6pxBYl8gQ4JGAsBn6ouMeWtEqhqzE13YPdNrvnd';
			$headers[] = 'Content-Type: application/json';
			//$headers[] = 'Content-Length: 303';
			$headers[] = 'Host: mgamer.back4app.io';
			$headers[] = 'Connection: close';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		} else {

			echo $result;
			if (!preg_match("/taken/", $result) && !preg_match("/Internal/", $result)) {
				echo "Berhasil Masukkan Kode Reff\n";
			} else {
				//echo $result;
				echo "Sudah Masukkan Kode Woy \n";
			}
		}
		curl_close($ch);
    	// Bosokkan
    	while (1) {
    		$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://mgamer.back4app.io/functions/add_coin_video');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "{}");
			curl_setopt($ch, CURLOPT_POST, 1);

			$headers = array();
			$headers[] = 'X-Parse-Session-Token: '.$token;
			$headers[] = 'X-Parse-Application-Id: pFNMj1vsRi4Xe8bCrCRgaK50wSRHGlXR4lOpYxiV';
			$headers[] = 'X-Parse-App-Build-Version: 47';
			$headers[] = 'X-Parse-App-Display-Version: 1.4.7';
			$headers[] = 'X-Parse-Os-Version: 5.1.1';
			$headers[] = 'User-Agent: Parse Android SDK API Level 22';
			$headers[] = 'X-Parse-Installation-Id: ' . rc(8, 1) . '-' . rc(4, 1) . '-' . rc(4, 1) . '-' . rc(4, 1) . '-' . rc(12, 1) . '';
			$headers[] = 'X-Parse-Client-Key: H6pxBYl8gQ4JGAsBn6ouMeWtEqhqzE13YPdNrvnd';
			$headers[] = 'Content-Type: application/json';
			//$headers[] = 'Content-Length: 303';
			$headers[] = 'Host: mgamer.back4app.io';
			$headers[] = 'Connection: close';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
			    echo 'Error:' . curl_error($ch);
			}
			else
			{
			    if (strlen($result) == 20) {
			    	echo "Video Sudah Habis\n";
			    	break;
			    }else
			    {
			    	echo "=> Berhasil Nambah Point \n";
			    }
			}
			curl_close($ch);
    	}


    }else
    {
    	die("Sandine salah WOy \n");
    }
}
curl_close($ch);


?>