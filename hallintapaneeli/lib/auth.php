<?php
session_start();

if (!isset($_SESSION["kayttajatunnus"])) {
  header("Location: ../login.php");
  exit();
}

$kayttajatunnus = $_SESSION['kayttajatunnus'];

$query = "SELECT * FROM webneer_kayttajat WHERE kayttajatunnus = '$kayttajatunnus'";
$result = mysqli_query($yhteys, $query);

while ($row = mysqli_fetch_assoc($result)) {
  $id = $row['id'];
  $kayttajatunnus = $row['kayttajatunnus'];
  $oikeudet = $row['oikeudet'];
}

if ($oikeudet == 2) {
  header("Location: ../index.php");
}

?>
