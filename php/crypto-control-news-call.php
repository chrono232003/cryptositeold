<?php

/**GRAB THE NEWS FROM THE CRYPTO CONTROL API AND STORE IN A FILE. THE "CRYPTO-NEWS PHP SERVICE WILL AGGREGATE THE RESULTS FOR THE WEBSITE**/

include 'vendor/cryptocontrol/crypto-news-api/src/CryptoNewsApi.php';

$api = new CryptoControl\CryptoNewsApi("2c08926df75ec16a28000b70a07e730b");

# Enable the sentiment datapoints
//$api->enableSentiment();

# get top news
$news = ($api->getTopNews());
$formatted_response = json_encode($news);
if ($formatted_response) {
  $dataFile = fopen("../json/crypto-control-news.json", "w") or die("Unable to open file!");
  fwrite($dataFile, "controlNews=".json_encode($news));
  fclose($dataFile);
} else {
  echo "file error";
}



// # get latest russian news
// print_r($api->getLatestNews("ru"));
//
// # get top bitcoin news


//$bit_coin_news = ($api->getTopNewsByCoin("bitcoin"));


// get_coin_news("bitcoin", "bitcoin-news.json", $api);
// get_coin_news("ethereum", "ethereum-news.json", $api);
// get_coin_news("ripple","ripple-news-json", $api);


function get_coin_news($coin, $filename, $api) {
  $news = ($api->getTopNewsByCoin($coin));
  if ($news) {
    $dataFile = fopen("../json/$filename", "w") or die("Unable to open file!");
    fwrite($dataFile, "news=".json_encode($news));
    fclose($dataFile);
  } else {
    echo "file error";
  }
}

//
// # get top EOS tweets
// print_r($api->getTopTweetsByCoin("eos"));
//
// # get top Ripple reddit posts
// print_r($api->getLatestRedditPostsByCoin("ripple"));
//
// # get reddit/tweets/articles in a single combined feed for NEO
// print_r($api->getTopFeedByCoin("neo"));
//
// # get latest reddit/tweets/articles (seperated) for Litecoin
// print_r($api->getLatestItemsByCoin("litecoin"));
//
// # get details (subreddits, twitter handles, description, links) for ethereum
// print_r($api->getCoinDetails("ethereum"));

?>
