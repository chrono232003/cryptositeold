<?php
//ini_set('max_execution_time', 500);
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


$dirArr = scandir("games/");

foreach ($dirArr as $dir) {
	$sqlcheck = "SELECT GameFile FROM games_dos Where GameFile = '" . $dir . "'";
	$result3 = $conn->query($sqlcheck);
	if (mysqli_num_rows($result3) > 0) {
		echo $dir . "Already exists and will be skipped.";
	} else {

		if ($dir != "." and $dir != "..") {
		$zip = zip_open("games/" . $dir);
		$withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $dir);
			if ($zip) {
			  while ($zip_entry = zip_read($zip)) {

				$file_parts = pathinfo(zip_entry_name($zip_entry), PATHINFO_EXTENSION);
				$lower = strtolower(zip_entry_name($zip_entry));
					if(strtolower($file_parts) == 'exe' and strpos($lower, 'install') === false and strpos($lower, 'setup') === false) {

						// $sql = "INSERT INTO games_dos (GameFile, ExecutePath, Title)
						// VALUES ('" . $dir . "','" . zip_entry_name($zip_entry) . "','" . $withoutExt .  "')";

            //$sql = "UPDATE games_dos SET ExecutePath ='" . zip_entry_name($zip_entry) . "' WHERE GameFile = '" . $dir . "'";
            $sql = "UPDATE games_dos SET ExecutePath ='testsetse' WHERE GameFile = '" . $dir . "'";

							if ($conn->query($sql) === TRUE) {
                echo $dir . ", " . zip_entry_name($zip_entry) . "Updated successfully<br />";
							} else {
								echo "Error: " . $sql . "<br>" . $conn->error;
							}

						break;
					}
			  }

			zip_close($zip);
			} else {
			  echo "did not find";
			}
		}
	}
}
$conn->close();

?>
