<?php

include 'lib/header.php';
include 'lib/config.php';
include 'lib/reset-password.php';

?>

<div class="container custom">

<form action="" method="post">
  <h2>New password</h2>

  <?php include 'messages.php'; ?>

  <div class="form-group row">
    <label for="newpassword" class="col-sm-2 col-form-label">New password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="newpassword">
    </div>
  </div>
  <div class="form-group row">
    <label for="newpassword-c" class="col-sm-2 col-form-label">Confirm new password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="newpassword-c">
    </div>
  </div>

  <button type="submit" name="new-password" class="btn">New password</button>


</div>

<?php include 'lib/footer.php'; ?>
