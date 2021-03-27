<?php

/**GRAB THE NEWS FROM THE CRYPTO COMPARE API AND STORE IN A FILE. THE "CRYPTO-NEWS PHP SERVICE WILL AGGREGATE THE RESULTS FOR THE WEBSITE. THIS API HAS A LIMIT OF 100K CALLS A MONTH**/

$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, 'https://min-api.cryptocompare.com/data/v2/news/?lang=EN');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($cURLConnection);
curl_close($cURLConnection);

if ($response) {
  $dataFile = fopen("../json/crypto-compare-news.json", "w") or die("Unable to open file!");
  fwrite($dataFile, "compareNews=[".$response."]");
  fclose($dataFile);
} else {
  echo "file error";
}
