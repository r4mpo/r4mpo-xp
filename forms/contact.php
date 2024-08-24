<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace Contato@example.com with your real receiving email address
  $receiving_email_address = 'Contato@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $Contato = new PHP_Email_Form;
  $Contato->ajax = true;
  
  $Contato->to = $receiving_email_address;
  $Contato->from_name = $_POST['name'];
  $Contato->from_email = $_POST['email'];
  $Contato->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $Contato->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $Contato->add_message( $_POST['name'], 'From');
  $Contato->add_message( $_POST['email'], 'Email');
  $Contato->add_message( $_POST['message'], 'Message', 10);

  echo $Contato->send();
?>
