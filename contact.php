<?php
if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

$name = $_POST["name"];
$user_email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

$my_email = "khajavi_mohamad@yahoo.com";
$email_subject = "New Contact From Your Website!";
$body = "Sender: $name.\n".
"Email: $user_email.\n".
"Subject: $subject.\n\n".
"The Message:\n $message";

mail($my_email,$email_subject,$body);


function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>