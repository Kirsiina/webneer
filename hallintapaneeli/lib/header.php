<?php

include '../lib/config.php';

session_start();

if (!isset($_SESSION["kayttajatunnus"])) {
  header("Location: ../index.php");
  exit();
}

?>
