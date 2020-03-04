<?php

include 'config.php';

session_start();

if ($_SESSION == true) {
$kayttajatunnus = $_SESSION['kayttajatunnus'];
$query = "SELECT * FROM webneer_kayttajat WHERE kayttajatunnus = '$kayttajatunnus'";

$result = mysqli_query($yhteys, $query);
$row = mysqli_fetch_array($result);

} else {}

?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Webneer - Web services for all</title>

    <meta charset="utf-8">

    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Open+Sans&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="author" content="Kirsi Suoranta, Jenna Aaltonen, Petri Paukkunen, Roope Pennanen">

    <meta name="description" content="All kind of web services for all.">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/5f0207882f.js"></script>

  </head>
  <body>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" alt="">
              </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Web hosting
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="webhosting.php#details">Product details</a>
                  <a class="dropdown-item" href="webhosting.php#pricing">Pricing</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Web design
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="webdesign.php#details">Product details</a>
                  <a class="dropdown-item" href="webdesign.php#pricing">Pricing</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact us</a>
              </li>
            </ul>

            <span class="navbar-text">
              <?php
                if (!isset($_SESSION['loggedin'])) {
                  echo '<a href="login.php">Log in</a>';
                } else {
                  echo 'Hi, '.$_SESSION['kayttajatunnus'].'. Your <a href="profile.php">profile</a><br><a href="logout.php">Log out</a>';
                }
              ?>
            </span>
          </div>
        </div>
      </nav>
