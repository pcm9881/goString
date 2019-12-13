<?php
/**
 * API 호출 curl
 */
$url = 'http://localhost:8000/api/sleep/10';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, false);
curl_setopt($curl, CURLOPT_TIMEOUT, 5);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$curl_response = curl_exec($curl);
if (curl_error($curl)) {
  /**
   * CURLOPT_TIMEOUT 지정해서 다음과 같은 상황을 예외처리
   */
  // echo "Connection Error: ".curl_errno($curl).' - '.curl_error($curl)."\n";
  $curl_response = "CURLOPT_TIMEOUT";
}
curl_close($curl);

echo $curl_response;
