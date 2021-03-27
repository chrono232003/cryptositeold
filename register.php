<?php
    require_once("connect.php");

	//condition data function
			function conditionData($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

	//if a user registers
	if(isset($_POST['Register'])) {
		$email = $_POST['emailR'];
		$user = $_POST['usernameR'];
		$password = $_POST['passwordR'];
		$passwordc = $_POST['passwordconfirmR'];

		conditionData($user);
		conditionData($password);
		conditionData($email);

		//check to make sure that username does not already exist
		$sqlCheckUser = "SELECT * FROM users WHERE User ='" . $user . "'";
		$result = $conn->query($sqlCheckUser);
		if (mysqli_num_rows($result) > 0) {
			echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>";
			echo "<script>$( document ).ready(function() {document.getElementById('errors').innerHTML = 'Username already taken, please choose another.';});</script>";
		}
		else {
			//check to make sure that email does not already exist
			$sqlCheckEmail = "SELECT * FROM users WHERE Email ='" . $email . "'";
			$result2 = $conn->query($sqlCheckEmail);
			if (mysqli_num_rows($result2) > 0) {
				echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>";
				echo "<script>$( document ).ready(function() {document.getElementById('errors').innerHTML = 'Email already taken, please login.';});</script>";
			} else {
				$sql = "INSERT INTO users (Email, User, Password) VALUES ('" . $email . "','" . $user . "','" . $password . "')";
				if ($conn->query($sql) === TRUE) {
					session_start();
					$_SESSION['username'] = $user;
					header("Location: http://greatoldgames.com");
					die();

				} else {
					echo "console.log('Error updating record: ' . $conn->error . ')";
				}
			}
		}
	}

	//if a user logs in
	if(isset($_POST['Login'])) {
		$user = $_POST['usernameL'];
		$password = $_POST['passwordL'];

		conditionData($user);
		conditionData($password);

		$sql = "SELECT * FROM users WHERE User = '" . $user . "' and Password = '" . $password . "'";
		$result = $conn->query($sql);
		if (mysqli_num_rows($result) > 0) {
			session_start();
			$_SESSION['username'] = $user;
			header("Location: http://greatoldgames.com");
			die();
			} else {
			echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>";
			echo "<script>$( document ).ready(function() {document.getElementById('errorsLog').innerHTML = 'The username and/or password entered does not match what we have on record.';});</script>";
		}
	}

	require 'header.php';

?>

<script type="text/javascript">
	function checkRegData() {
		//get fieldset
		var email = document.forms["registerForm"]["emailR"].value;
		var username = document.forms["registerForm"]["usernameR"].value;
		var password = document.forms["registerForm"]["passwordR"].value;
		var passwordc = document.forms["registerForm"]["passwordconfirmR"].value;

		//check the values
		var errorArr = [];
		if (email == "") {
			errorArr.push("<font color = 'red'>Email is Required.</font><br />");
		}
		if (username.length < 7) {
			errorArr.push("<font color = 'red'>Username is required and must be at least 7 characters.</font><br />");
		}
		if (password.length < 7) {
			errorArr.push("<font color = 'red'>Password is required and must be at least 7 characters.</font><br />");
		}
		if (email != "" && exprTest(email, expr.email) != true) {
			errorArr.push("<font color = 'red'>Please enter a valid email address.</font><br />");
		}
		if (username != "" && exprTest(username, expr.alphaNumeric) != true) {
			errorArr.push("<font color = 'red'>Please enter a valid username (numbers and letters only).</font><br />");
		}
		if (password != passwordc) {
			errorArr.push("<font color = 'red'>Please make sure that the passwords match.</font>");
		}

		if (errorArr.length > 0) {
			document.getElementById("errors").innerHTML = errorArr.join(",").replace(",", "");
			return false;
		}
	}

	function checkLogData() {
		var username = document.forms["loginForm"]["usernameL"].value;
		var password = document.forms["loginForm"]["passwordL"].value;

		//check the values
		var errorArr = [];
		if (username.length < 7) {
			errorArr.push("<font color = 'red'>Username is required and must be at least 7 characters.</font><br />");
		}
		if (password.length < 7) {
			errorArr.push("<font color = 'red'>Password is required and must be at least 7 characters.</font><br />");
		}
		if (username != "" && exprTest(username, expr.alphaNumeric) != true) {
			errorArr.push("<font color = 'red'>Please enter a valid username (numbers and letters only).</font><br />");
		}

		if (errorArr.length > 0) {
			document.getElementById("errorsLog").innerHTML = errorArr.join(",").replace(",", "");
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
				<h1>Register</h1>
				<div id = "errors"></div>
				<form id='registerForm' action='register.php' method='post' onsubmit="return checkRegData()">
					<fieldset >
						<legend>Register</legend>
						<input type='hidden' name='submittedR' id='submittedR' value='1'/>
						<label for='email' >Email Address*:</label>
						<input type='text' name='emailR' id='emailR' maxlength="50" />
						<label for='username' >Username*:</label>
						<input type='text' name='usernameR' id='usernameR' maxlength="50" />
						<label for='password' >Password*:</label>
						<input type='password' name='passwordR' id='passwordR' maxlength="50" />
						<label for='password' > Confirm Password*:</label>
						<input type='password' name='passwordconfirmR' id='passwordconfirmR' maxlength="50" />
						<input type='submit' name='Register' value='Register' class='button small orange rnd5' />
					</fieldset>
				</form>
			</li>
			<li class="one_half">
				<article>
				<h1>Login</h1>
				<div id = "errorsLog"></div>
				<form id='loginForm' action='register.php' method='post' onsubmit="return checkLogData()">
					<fieldset >
						<legend>Login</legend>
						<input type='hidden' name='submittedL' id='submittedL' value='1'/>
						<label for='username' >Username*:</label>
						<input type='text' name='usernameL' id='usernameL' maxlength="50" />
						<label for='password' >Password*:</label>
						<input type='password' name='passwordL' id='passwordL' maxlength="50" />
						<input type='submit' name='Login' value='Login' class='button small orange rnd5' />
					</fieldset>
				</form>
				</article>
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
