<?php
/**
* Processes the contact form
*
* @author   John Pura <jepura@gmail.com>
* @package  Core
* @version  1.0.0
*/
define("SEND_TO",     "John Pura <jepura@gmail.com>");
define("SUBJECT",     "New message from my website");

/**
* Sends an email
*
* @param string $from     the email address of the person sending the email
* @param string $message  the email content of the email message
*/
function send_mail($from ,$message = '') {
  $headers = 'From: '.$from.'' . "\r\n" .
             'Reply-To: '.$from.'' . "\r\n" .
             'X-Mailer: PHP/' . phpversion();

    mail(SEND_TO, SUBJECT, $message, $headers);
}

/**
* Sanitizes form data
*
* @param  array  $data    the data from the form fields
* @return array
*/
function sanitize($data = array()) {
  foreach ($data as $key => $value) {
    $data[$key] = trim($value);
  }
  $options = array (
    'name'=>FILTER_FLAG_STRIP_HIGH,
    'email'=>FILTER_SANITIZE_EMAIL,
    'message'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
  );
  $clean_data = filter_input_array(INPUT_POST, $options);

  return $clean_data;
}
?>
