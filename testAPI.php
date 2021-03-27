<?php
namespace Messerli90\IGDB;
include 'IGDB.php';
require "connect.php";

//$sql = "SELECT Title FROM games_dos WHERE ID between 798 and 1393";

//if ($result=mysqli_query($conn,$sql)) {
//	while ($row=mysqli_fetch_row($result)) {

			$api_key  = 'ba989492667e36e4abe1f3cc47d2d10a';
			$url = 'https://api-2445582011268.apicast.io';
			$igdb = new IGDB($api_key, $url);
			$arr1 = $igdb->{'searchGames'}('Descent (Shareware)');
			$myJSON = json_encode($arr1);
			$summary = $arr1[0]->summary;
			$pic = (isset($arr1[0]->cover->url)) ? $arr1[0]->cover->url : $arr1[0]->screenshots[0]->url;
			if (isset($pic)) {
			$pic = str_replace('thumb', 'cover_big' , $pic);
			//$pic = $arr1[0]->screenshots[0]->url;
			echo $pic;
			echo "<img src = '" . $pic . "'>";
			//echo $myJSON;
			} else {
				echo "no pic found!";
			}

	//}			
//}
?>