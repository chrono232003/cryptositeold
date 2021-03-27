<?php

//this service aggregates the news api jsons into one file for easy parsing.

function getControl($control) {
  $clazz = new stdClass();
  foreach($control -> Data as $obj) {
    //echo "hi: " $clazz.$obj ->id. "\n";
    $clazz->id=$obj ->id;
    $clazz->$control;
    );
  }
  return $clazz;
}


$crypto_control_file = fopen("../json/crypto-compare-news.json", "r") or die("Unable to open crypto control file!");
//$crypto_compare_file = fopen("../json/crypto-compare-news.json", "r") or die("Unable to open crypto compare file!");

$crypto_compare_file =  file_get_contents("../json/crypto-compare-news.json");

$test = json_decode($crypto_compare_file);

//print_r($test -> Data);

//echo json_encode($obj);



print_r(getControl($test));

?>
