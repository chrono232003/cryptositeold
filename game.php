<?php
    require 'header.php';

    //initial query to grab all the needed data
    $global_query = "SELECT * FROM games_dos WHERE PageName = '" . htmlspecialchars($_GET['Game']) . "'";
    $global_result = mysqli_query($conn, $global_query);
    while($row = mysqli_fetch_assoc($global_result)) {
      $game_ID = $row['ID'];
      $game_title = $row['Title'];
      $game_pagename = $row['PageName'];
      $game_decription = $row['Description'];
      $game_gamefile = $row['GameFile'];
      $game_executepath = $row['ExecutePath'];
      $game_pic = $row['Pic'];
      $game_downloadcount = $row['DownloadCount'];
      $game_active = $row['Active'];
      $game_genre = $row['Genre'];
    }

	//if issue is reported
	if(isset($_POST['reportIssue'])) {
		// send email
		$to = "chrono232003@yahoo.com";
		$subject = "Issue with " . $_POST["ID"];
		$message = "Issue with " . $_POST["ID"];
		$headers = 'From: chrono232003@yahoo.com';

		mail($to, $subject, $message);

	}

	if(isset($_POST['submitComment'])) {

		function conditionData($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}


		if ($_POST["comment"] != "") {
			$sql = "INSERT INTO comments (UserID, GameID, Comment) Values ('". $username ."','". htmlspecialchars($game_ID) ."','". conditionData($_POST["comment"]) ."')";
			if ($conn->query($sql) === TRUE) {
				echo "<script>$( document ).ready(function() {document.getElementById('commentsuccess').innerHTML = 'Comment Entered Successfully!';});</script>";
			} else {
				echo "console.log('Error inserting record: ' . $conn->error . ')";
			}
		} else {

		}
	}

	//if the downloadgame button is clicked, update our counter
	if(isset($_POST['downloadUpdate'])) {
	    if (!empty($_POST["downloadID"])) {
    	    $sqlUpdate="UPDATE games_dos SET DownloadCount = DownloadCount + 1 WHERE ID =" . $_POST["downloadID"];
    	    if ($conn->query($sqlUpdate) === TRUE) {

            } else {
                echo "console.log('Error updating record: ' . $conn->error . ')";
            }
	    }
	}

?>
<script>
	var fireAlert = function() {
        alert("Thank you for reporting an issue on this page, we will be looking into it.");
	}

	//check comment data
	function checkCommentData() {
		var comment = document.forms["commentForm"]["comment"].value;

		//check the values
		var errorArr = [];
		var regex = new RegExp('^[a-zA-Z0-9,.!? ]*$');
		if (comment.length < 10 || !regex.test(comment)) {
			errorArr.push("<font color = 'red'>Please enter at least 10 non special chracters.</font><br />");
			document.getElementById("commentsuccess").innerHTML = errorArr.join(",").replace(",", "");
			return false;
		}
	}
</script>
    <!-- ################################################################################################ -->
    <div id="homepage" class="clear">
	    <!-- ################################################################################################ -->
      <div class="divider2"></div>
      <!-- ################################################################################################ -->
      <section class="clear">
        <ul class="nospace center clear">
            <li class="one_half first">
                <?php
                    //see if the game play is available.
                    $sql="SELECT Active FROM games_dos WHERE ID = " . htmlspecialchars($game_ID);

        			if ($result=mysqli_query($conn,$sql)) {
        				while ($row=mysqli_fetch_row($result)) {
        				    if($row[0] == 1) {
        				     echo "<p>Play this game directly on the browser or download from the link below. If needed, get DOSBox <a href='https://www.dosbox.com/' target='_blank'>here</a><br /></p>";
		                     echo "<p>If you have issues loading a game, please report with button below:</p>";
		                     echo "<form style = 'width:100px;' action='' method='post'>";
			                 echo "<input type='hidden' name='ID' value='" . htmlspecialchars($game_ID) . "'>";
			                 echo "<input type='submit' name='reportIssue' value='Report Issue' onclick='return fireAlert();'>";
		                     echo "</form>";
        				     echo "<article>";
                			 echo "<div id='dosbox'></div>";
                			 echo "<br/>";
                			 echo "<button class='button small orange rnd5' onclick='dosbox.requestFullScreen();'>Make fullscreen</button>";
        				    } else {
        				     echo "Online play is not available for this game. You are still able to download the game and run locally.";
        				    }
        				}
        			}
                ?>

				<!---------------COMMENTS SECTION----------------->
				<hr />
				<br />
				<h1>Comments</h1>
				<div id = 'commentsuccess'></div>
				<?php
				if (isset($_SESSION['username']) || !empty($_SESSION['username'])) {
					echo "<div style = 'background-color:#999999'>";
					echo "<b><font color = 'white'>Add Comment (Min 10 chars)</font></b>";
					//js comment data check
					echo "<form id='commentForm' action='' method='post' onsubmit='return checkCommentData()'>";
					echo "<fieldset>";
					echo "	<legend>comment</legend>";
					echo "	<p>";
					echo "	  <textarea rows='4' cols='50' name = 'comment' value = 'comment here' ></textarea>";
					echo "	</p>";
					echo "<input type='submit' name='submitComment' value='Submit' class='button small orange rnd5' />";
					echo "</fieldset>";
					echo "</form>";
					echo "</div><br />";
				}

				$sql = "SELECT * FROM comments WHERE GameID = '" . htmlspecialchars($game_ID) . "'";
				if ($result=mysqli_query($conn,$sql)) {
					if (mysqli_num_rows($result)!=0) {
						while ($row=mysqli_fetch_row($result)) {
							echo "<b>Written By: " . $row[1] . " at " . $row[4] . "</b>";
							echo "<br />" . $row[3];
							echo"<hr />";
						}
					} else {
						echo "No comments have been made for this game yet. Login to be the first!";
					}
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				?>

				<!------------------------------------------------>

			</li>
			<li class="one_half">
		<?php
			//require "connect.php";
			//grab the game data from the data base

			$sql="SELECT Title, Pic, Description, GameFile, ExecutePath, ID, Genre, PageName FROM games_dos WHERE PageName = '" . htmlspecialchars($game_pagename). "'";
			if ($result=mysqli_query($conn,$sql)) {
				while ($row=mysqli_fetch_row($result)) {

				    $escapedDesc = preg_replace("/[^A-Za-z0-9!,. ]/", '', $row[2]);

				    //set the title and meta description
				    echo "<script>document.title = '" . $row[0] . " - " . $row[6]. " - Great Old Games';</script>";
				    echo "<script>document.querySelector('meta[name=\"description\"]').setAttribute(\"content\", \"Play or Download ". $row[0] ." (".$row[6].") - ". $escapedDesc ." - DOS game online now or download the game.\");</script>";

				    //getGame function
                    echo "<script>";
                    echo "function getGame() {";
                    echo "var location = 'http://greatoldgames.com/games/" . $row[3] . "';";
                    echo "window.open(location);";
                    echo "}";
                    echo "</script>";

					echo "<script type='text/javascript' src='https://js-dos.com/cdn/js-dos-api.js'></script>";
					echo "<script type='text/javascript'>";
					echo "var dosbox = new Dosbox({";
					echo "id: 'dosbox',";
					echo "onload: function (dosbox) {";
					echo "dosbox.run('games/" . $row[3] . "','./" . $row[4] . "')";
					echo "},";
					echo "onrun: function (dosbox, app) {";
					echo "}";
					echo "});";
					echo "</script>";

					echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>";
					echo "<article>";
					echo "<h1><span class='icon-fullscreen'></span>" . $row[0] . "</h1>";

					echo "<form action='' method='POST'>";
					echo "<input type='hidden' name='downloadID' value='". $row[5] ."'>";;
                    echo "<input type='submit' name='downloadUpdate' value='Download Now' class='button small orange rnd5' onclick='getGame()'/>";
                    echo "</form>";

					//echo "<a href='games/" . $row[3] . "' class='button small orange rnd5'>Download Now</a><br />";

					if ($row[1] == '') {
						echo "<script type='text/javascript' src='helperScript.js'></script>";
						echo "<script type='text/javascript'>getGameData('" . $row[0] . "')</script>";
						echo "<div id = 'gameData'></div>";
					} else {
						echo "<img src = '" . $row[1] . "' alt = '". $row[0] ." cover image'><br /><br />";
					}
					//echo "<img src = '" . $pic . "' style = 'max-width:400px;'><br />";
					echo $row[2];
					echo "</article>";

					echo "</li>";
				}
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			 ?>
			</li>
        </ul>
      </section>
      <!-- ################################################################################################ -->
      <div class="divider2"></div>
      <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>
<?php
	require 'footer.php';
?>
