<?php

include 'lib/config.php';

$errors = [];

if (isset($_POST['reset-password'])) {

  $email = mysqli_real_escape_string($yhteys, $_POST['email']);
  $query = "SELECT sahkoposti FROM webneer_kayttajat WHERE sahkoposti = '$email'";
  $result = mysqli_query($yhteys, $query);

  if (empty($email)) {
    array_push($errors, "Your email is required.");
  } else if (mysqli_num_rows($result) <= 0) {
    array_push($errors, "No user found with $email");
  }

  $token = bin2hex(random_bytes(50));

  if (count($errors) == 0) {

    $query = "INSERT INTO webneer_salasananvaihto (sahkoposti, token) VALUES ('$email', '$token')";
    $result = mysqli_query($yhteys, $query);

    $to = $email;
    $subject = "Reset your password on webneer.com";
    $message = "Hi! You requested to change your password. If it wasn't you, don't do anything. Otherwise, use <a href=\"localhost/webneer/new-password.php?token=" . $token . "\">this link</a> to change your forgotten password.";
    $headers = "From: noreply@webneer.com\r\n";
    mail($to, $subject, $message, $headers);
    header("Location: pending.php?email=" .$email);

  }

}

if (isset($_POST['new-password'])) {

  $newpassword = mysqli_real_escape_string($yhteys, $_POST['newpassword']);
  $newpassword_c = mysqli_real_escape_string($yhteys, $_POST['newpassword-c']);

  $token = $_GET['token'];

  if (empty($newpassword) || empty ($newpassword_c)) {
    array_push($errors, "Password is required");
  }

  if ($newpassword !== $newpassword_c) {
    array_push($errors, "Passwords doesn't match");
  }

  if (count($errors) == 0) {

    $query = "SELECT sahkoposti, webneer_kayttajat.sahkoposti FROM webneer_salasananvaihto INNER JOIN webneer_kayttajat WHERE token = '$token' LIMIT 1";
    $result = mysqli_query($query);

    while ($row = mysqli_fetch_array($result)) {
      $email = $row['sahkoposti'];
      $email2 = $row['webneer_kayttajat.sahkoposti'];
    }

    if($email == $email2) {
      $hash_salasana = password_hash($newpassword, PASSWORD_DEFAULT);
      $query = "UPDATE webneer_kayttajat SET salasana = '$hash_salasana' WHERE sahkoposti = '$email'";
      $result = mysqli_query($yhteys, $query);
      header("Location: login.php?new-password");
    }
  }

}

?>
