<?php

function garap($ref){
$data = file_get_contents("https://wirkel.com/data.php?qty=1");
$datas = json_decode($data);
$nohp = $datas->result[0]->phone;
$nama = $datas->result[0]->lastname;
$email = $datas->result[0]->email;
	$body = '{"phone":"'.$nohp.'","email":"'.$email.'","password":"jancok","nama":"'.$nama.'","referralcode":"'.$ref.'"}';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.krisnapay.id/register');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
	$headers = array();
	$headers[] = 'user-agent: Dart/2.10 (dart:io)';
	$headers[] = 'content-type: application/json; charset=utf-8';
	$headers[] = 'accept-encoding: gzip';
	$headers[] = 'content-length: '.strlen($body);
	$headers[] = 'authorization: Bearer null';
	$headers[] = 'host: api.krisnapay.id';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, FALSE);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}
echo "ReferalCode	";
$ref = trim(fgets(STDIN));
for($a=0;$a<1000;$a++){
	echo garap($ref)."\n";
}