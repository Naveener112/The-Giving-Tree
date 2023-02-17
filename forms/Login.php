<?php
 

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'contact@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $Login = new PHP_Email_Form;
  $Login->ajax = true;
  
  $Login->to = $receiving_email_address;
  $Login->from_name = $_POST['name'];
  $Login->from_email = $_POST['email'];
  $Login->subject = "New table booking request from the website";

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $Login->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $Login->add_message( $_POST['name'], 'Name');
  $Login->add_message( $_POST['email'], 'Email');
  $Login->add_message( $_POST['phone'], 'Phone', 4);
  $Login->add_message( $_POST['date'], 'Date', 4);
  $Login->add_message( $_POST['time'], 'Time', 4);
  $Login->add_message( $_POST['people'], '# of people', 1);
  $Login->add_message( $_POST['message'], 'Message');

  echo $Login->send();
?>
