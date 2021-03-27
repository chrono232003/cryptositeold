<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $db = "playolds_game";

$servername = "localhost";
$username = "playolds_chrono";
$password = "Mayafit23!";
$db = "playolds_game";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


$it_is_a_game_array_maaaan = array();
$game_array_for_filtering = array();
$number = 0;
$dir            = 'games';
$files1         = scandir($dir);
$files2         = scandir($dir, 1);

foreach ($files2 as $f) {

  if (!in_array(getGameName($f), $game_array_for_filtering)) {

    //just for filtering
    array_push($game_array_for_filtering, getGameName($f));

    array_push($it_is_a_game_array_maaaan, addGameData($f));
    //++$number;
  }
}

//print_r($number);
foreach ($it_is_a_game_array_maaaan as $val) {
  if ($val[0]) {
    $sql = "INSERT INTO games_dos (Title, PageName, GameFile, Active, Genre) VALUES ('" . $val[0] . "','" . $val[1] . "','" . $val[2] . "','1','" . $val[3] . "')";
    mysqli_query($conn, $sql);

    //print_r($val[3] . "<br />");
  }
}

function getGameName($f) {
  $bracket_check = false;
  $first_char_hit= 0;

  if (strpos($f, " v") !== false) {
    $first_char_hit = strpos($f, " v");
  } else if (strpos($f, "[") !== false) {
    $bracket_check = true;
    if (strpos($f, "(") < strpos($f, "[")) {
      $first_char_hit = strpos($f, "(");
    } else {
      $first_char_hit = strpos($f, "[");
    }
  } else {
    $first_char_hit = strpos($f, "(");
  }
  $gamefilename = substr($f,0,$first_char_hit);
  //return str_replace( " ", "",$gamefilename);
    return trim($gamefilename);
}

function getGameGenres($f) {
  $genre_string = str_replace("]", "", str_replace("[", "", str_replace(".zip", "", strrchr($f,"["))));
  if (strpos($genre_string, ",") !== false) {
    $pieces = explode(",",$genre_string);
    return $pieces[0];
  } else {
      return trim($genre_string);
  }
}

function getGameYear($f) {
  $val = 0;
  $arr =  array (
    "(1990)",
    "(1991)",
    "(1992)",
    "(1993)",
    "(1994)",
    "(1995)",
    "(1996)",
    "(1997)",
    "(1998)",
    "(1999)",
  );
  foreach ($arr as $value) {
    if (strpos($f, $value)) {
      //$val = strpos($f, $value);
      $val = str_replace(")", "", str_replace("(", "", $value));
    }
  }
  return $val;
};

function getPageName($gameName) {
  $replaced = str_replace("-"," ", $gameName);
  $replaced2 = preg_replace('!\s+!', ' ', $replaced);
  return trim(str_replace(" ","-", $replaced2));
}

// function getExecutePath($dir) {
//   if ($dir != "." and $dir != "..") {
//   $zip = zip_open("games/" . $dir);
//   $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $dir);
//     if ($zip) {
//       while ($zip_entry = zip_read($zip)) {
//
//       $file_parts = pathinfo(zip_entry_name($zip_entry), PATHINFO_EXTENSION);
//       $lower = strtolower(zip_entry_name($zip_entry));
//         if(strtolower($file_parts) == 'com' and strpos($lower, 'install') === false and strpos($lower, 'setup') === false) {
//
//           $sql = "INSERT INTO games_dos (GameFile, ExecutePath, Title)
//           VALUES ('" . $dir . "','" . zip_entry_name($zip_entry) . "','" . $withoutExt .  "')";
//           echo $dir . ", " . zip_entry_name($zip_entry) . "<br />";
//
//             if ($conn->query($sql) === TRUE) {
//               echo "New record created successfully";
//             } else {
//               echo "Error: " . $sql . "<br>" . $conn->error;
//             }
//
//           break;
//         }
//       }
//
//     zip_close($zip);
//     } else {
//       echo "did not find";
//     }
//   }
// }

function addGameData($f) {
  return array(getGameName($f), getPageName(getGameName($f)), $f, getGameGenres($f));
    //return getGameName($f) . " " . getPageName(getGameName($f)) . " " . $f . " " . getGameGenres($f);
}
?>
