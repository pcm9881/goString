<?php
/**
 * 정상 API 호출 curl
 */
$url = 'http://localhost:8000/api/data';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$curl_response = curl_exec($curl);
if (curl_error($curl)) die("Connection Error: ".curl_errno($curl).' - '.curl_error($curl));
curl_close($curl);

echo $curl_response;
