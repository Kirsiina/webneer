<?php

include 'lib/header.php';
include 'lib/auth.php';

$kayttajatunnus = $_SESSION['kayttajatunnus'];
$query = "SELECT * FROM webneer_kayttajat WHERE kayttajatunnus = '$kayttajatunnus'";

$result = mysqli_query($yhteys, $query);
$row = mysqli_fetch_array($result);

?>

<div class="container custom">

  <h1>Welcome to your profile, <?php echo $row['kayttajatunnus']; ?></h1>

  <form action="" method="post">
  <?php
    if (isset($_REQUEST['updateinfo'])) {

      $sahkoposti = $_POST['email'];
      $etunimi = $_POST['firstname'];
      $sukunimi = $_POST['lastname'];
      $lahiosoite = $_POST['address'];
      $postinro = $_POST['zipcode'];
      $postitmp = $_POST['city'];
      $puhnro = $_POST['phonenumber'];
      $id = $_POST['user_id'];

      $query = "UPDATE webneer_kayttajat SET sahkoposti = '$sahkoposti', etunimi = '$etunimi', sukunimi = '$sukunimi', lahiosoite = '$lahiosoite', postinro = '$postinro', postitmp = '$postitmp', puhnro = '$puhnro' WHERE id = $id";
      $result = mysqli_query($yhteys, $query);

      if (!isset($result)) {
        die ("Something went wrong... Try again later.");
      } else {
          echo    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h4>User information updated succesfully</h4>
                    Your personal information has been updated. Refresh the page to see updated fields.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
      }

    }
  ?>
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" value="<?php echo $row['sahkoposti']; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="firstname" class="col-sm-2 col-form-label">First name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="firstname" value="<?php echo $row['etunimi']; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="lastname" class="col-sm-2 col-form-label">Last name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="lastname" value="<?php echo $row['sukunimi']; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="address" class="col-sm-2 col-form-label">Address</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="address" value="<?php echo $row['lahiosoite']; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="zipcode" class="col-sm-2 col-form-label">Zip code</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="zipcode" value="<?php echo $row['postinro']; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="city" class="col-sm-2 col-form-label">City</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="city" value="<?php echo $row['postitmp']; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="phonenumber" class="col-sm-2 col-form-label">Phone number</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="phonenumber" value="<?php echo $row['puhnro']; ?>">
      </div>
    </div>

    <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
    <button type="submit" class="btn" name="updateinfo">Update information</button>

  </form>

</div>
<?php include 'lib/footer.php'; ?>
