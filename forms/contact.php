<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */


  //store email from user in a variable.
  $newEmail = $_POST['email'];

  //validate user's email address
  //$email = test_input($_POST['email']);
  if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    return;
  }

  //get the original email list
  $emails = file_get_contents('../emails.txt');

  //check to make sure the email does not already exist.
  $existingEmailList = explode(",", $emails);
  $addEmail = true;
  foreach ($existingEmailList as $email) {
    if ($newEmail == $email) {
      echo ("This email is already added!");
      $addEmail = false;
    }
  }

  //if email does not exist already, add it to the email list.
  if ($addEmail) {
    $newEmailList = $emails . trim($newEmail) . ",";
    file_put_contents('../emails.txt', $newEmailList);
    echo "OK";
    return "OK";
  }


// $subject = 'Testing PHP Mail';
// $message = $from_email;
// $headers = 'From: noreply @ company . com';
// mail($receiving_email_address,$subject,$message,$headers);

  // if( file_exists($php_email_form = '../vendor/php-email-form/php-email-form.php' )) {
  //   include( $php_email_form );
  // } else {
  //   die( 'Unable to load the "PHP Email Form" Library!');
  // }
  //
  // $contact = new PHP_Email_Form;
  // $contact->ajax = true;

  //$contact->to = $receiving_email_address;
  //$contact->from_name = $_POST['name'];
  //$contact->from_email = $_POST['email'];
  //$contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  //$contact->add_message( $_POST['name'], 'From');
  //$contact->add_message( $_POST['email'], 'Email');
  //$contact->add_message( $_POST['message'], 'Message', 10);

  //echo $contact->send();
?>
