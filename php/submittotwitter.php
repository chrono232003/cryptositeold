<?php

require "../twitteroauth/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

function random_news()
{
  $news = file_get_contents("../json/crypto-compare-news.json");
  $news = str_replace("compareNews=", "", $news);

   //GET RANDOM STORY
   $decoded = json_decode($news);

   $length = count($decoded[0]->Data);
   $rand = rand(0,$length-1);

   return $decoded[0]->Data[$rand];

}

function getConnectionWithAccessToken($oauth_token, $oauth_token_secret) {
  $twitterconnection = new TwitterOAuth('0vtKBqCVUugBb3IGEsE8IqFmP', 'yHO5bmuW2fSTf8j2GO3lUwxx4nmqsqI6lJ5hk8noZaOXsmgZRO', $oauth_token, $oauth_token_secret);
  return $twitterconnection;
}

$news = random_news();

//generate random hashtags
$hashtags = array("#bitcoin", "#cryptocurrency", "#xrp", "#etherium", "#investing", "#investment", "#altcoin", "#decentralized", "#dApp", "#token");
$rand_keys = array_rand($hashtags, 2);

 $postText = $news->title. " #bitcoin #cryptocurrency Read more news here: https://bit.ly/3bvSBTa";
$postText = $news->title. " " . $hashtags[$rand_keys[0]] . " " . $hashtags[$rand_keys[1]] ." Read more news here: https://bit.ly/3bvSBTa";

$twitterconnection = getConnectionWithAccessToken("1225883874288259073-kbdIzlAug2zVZsGun91AxAwe7TIR6c", "UT46pTJI6ZPrWu5Td8XFNHrsa67d8bBQDFkXYWYPKczw4");
$result = $twitterconnection->post("statuses/update", ["status" => $postText]);

echo json_encode($result);
