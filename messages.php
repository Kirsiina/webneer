<?php

if (count($errors) > 0) { ?>

<div class="text-center">

  <?php foreach ($errors as $error) : ?>
  <span><?php echo $error ?></span>
  <?php endforeach ?>

</div>

<?php } ?>
