<?php

/**
The purpose of this script is to update the crypto information in a timely and efficient fashion. The API used only allows 5 calls a minute and each coin update requires 2.
Therefore, we are to update on crypto every 30 seconds. We will use the timestamp (lastRefreshed) from the api to attach to each currency. We will always grab the coin updated the longest ago and update it with this script.
**/


//$url = "https://app.buysellhodlapp.com/api/rating/report?skipEmpty=true&limit=200";

function curl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function createCoinObj($coin){
  //get exchange information
  //   SAMPLE RESPONSE
  //   {
  //     "Realtime Currency Exchange Rate": {
  //         "1. From_Currency Code": "BTC",
  //         "2. From_Currency Name": "Bitcoin",
  //         "3. To_Currency Code": "CNY",
  //         "4. To_Currency Name": "Chinese Yuan",
  //         "5. Exchange Rate": "64218.36950100",
  //         "6. Last Refreshed": "2020-07-18 19:31:07",
  //         "7. Time Zone": "UTC",
  //         "8. Bid Price": "64218.36950100",
  //         "9. Ask Price": "64218.43942800"
  //     }
  // }

  $priceUrl = "https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=".$coin."&to_currency=USD&apikey=3MEIEGZ47XD6TNCY";
  $response = curl($priceUrl);
  $data = json_decode($response);
  $name = $data->{'Realtime Currency Exchange Rate'}->{'2. From_Currency Name'};
  $exchangeRate = $data->{'Realtime Currency Exchange Rate'}->{'5. Exchange Rate'};
  $bidPrice= $data->{'Realtime Currency Exchange Rate'}->{'8. Bid Price'};
  $askPrice = $data->{'Realtime Currency Exchange Rate'}->{'9. Ask Price'};
  $lastRefreshed = $data->{'Realtime Currency Exchange Rate'}->{'6. Last Refreshed'};

  //check to see if data came back if not, return null and exit the script.
  //We need the last refresh date at the very least as to not break or date checker.
  if ($lastRefreshed == null) {
    return null;
  }

  //get rating information
  // SAMPLE RESPONSE
  // {
  //     "Crypto Rating (FCAS)": {
  //         "1. symbol": "BTC",
  //         "2. name": "Bitcoin",
  //         "3. fcas rating": "Attractive",
  //         "4. fcas score": "892",
  //         "5. developer score": "856",
  //         "6. market maturity score": "802",
  //         "7. utility score": "956",
  //         "8. last refreshed": "2020-07-18 00:00:00",
  //         "9. timezone": "UTC"
  //     }
  // }

  $ratingUrl = "https://www.alphavantage.co/query?function=CRYPTO_RATING&symbol=".$coin."&apikey=3MEIEGZ47XD6TNCY";
  $response = curl($ratingUrl);
  $data = json_decode($response);
  $rating = $data->{'Crypto Rating (FCAS)'}->{'3. fcas rating'};
  $developerScore = $data->{'Crypto Rating (FCAS)'}->{'5. developer score'};
  $marketMaturityScore = $data->{'Crypto Rating (FCAS)'}->{'6. market maturity score'};
  $utilityScore = $data->{'Crypto Rating (FCAS)'}->{'7. utility score'};



  //create object
  $myObj = new STDClass();
  $myObj->name = $name;
  $myObj->exchangeRate = $exchangeRate;
  $myObj->bidPrice = $bidPrice;
  $myObj->askPrice = $askPrice;
  $myObj->lastRefreshed = $lastRefreshed;

  $myObj->rating = (!is_null($rating)) ? $rating : "N/A";
  $myObj->developerScore = $developerScore;
  $myObj->utilityScore = $utilityScore;

  //add image filename
  if ($coin == "TRX") {
    $myObj->imageFileName = 'trx.jpg';
  } else {
    $myObj->imageFileName = strtolower($coin).".png";
  }

  return $myObj;

}

function getCoinToUpdate($data) {
  if (!is_null($data)) {
    uasort($data, 'comparator');
    //return array_key_first($data);
    return array_keys($data)[0];
    }

}

function comparator($object1, $object2) { 
    return $object1->{'lastRefreshed'} > $object2->{'lastRefreshed'}; 
}


//*********Start main script************//

//$crypto_arr = array('BTC', 'ETH', 'BCH', 'EOS');
$fileData = file_get_contents("../json/data.json");

//remove data wrapper to create a pure php object
$fileData = str_replace("data=[", "", $fileData);
$fileData = str_replace("]", "", $fileData);

$fileDataDecoded = (array) json_decode($fileData);

//get the coin updated the longest ago to update.
$symbol = getCoinToUpdate($fileDataDecoded);
$coin = createCoinObj($symbol);

if(!is_null($coin)) {


  $fileDataDecoded[$symbol] = $coin;

  //update file with updated data and add wrapper back.
  $data = file_put_contents("../json/data.json", "data=[".json_encode($fileDataDecoded)."]");
}


?>
