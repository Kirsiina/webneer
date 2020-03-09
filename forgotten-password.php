<?php

include 'lib/header.php';
include 'lib/config.php';
include 'lib/reset-password.php';

?>

<div class="container custom">

  <form action="" method="post">
    <h2>Reset password</h2>

    <?php include 'messages.php'; ?>

    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email">
      </div>
    </div>

    <button type="submit" name="reset-password" class="btn">Reset</button>

  </form>

</div>

<?php include 'lib/footer.php'; ?>
