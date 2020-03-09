<?php

include 'lib/header.php';
include 'lib/config.php';
include 'lib/reset-password.php';

?>

<div class="container custom">

  <p class="text-center">We have sent an email to you (<i><?php echo $_GET['email']; ?></i>). Please log in to your email and click the link to reset your password.</p>

</div>

<?php include 'lib/footer.php'; ?>
