<?php

  include 'lib/header.php';
  include 'lib/config.php';

?>

<div class="container custom">
  <h1 class="text-center">Sign up</h1>
  <p class="lead">As a registered user you can see your previous orders.</p>

  <form action="register.php" method="post">

    <?php
      if (isset($_REQUEST['register_btn'])) {
        $kayttajatunnus = $_POST['username'];
        $sahkoposti = $_POST['email'];
        $salasana = $_POST['password'];

        $query = "INSERT INTO webneer_kayttajat (kayttajatunnus, salasana, oikeudet, sahkoposti) VALUES ('$kayttajatunnus', '".password_hash('$salasana', PASSWORD_DEFAULT)."', '2', '$sahkoposti')";
        $result = mysqli_query($yhteys, $query);

        if ($result) {
          echo    '<div class="alert alert-success alert-dismissible fade show" role="alert">
              			<h4>User account created successfully</h4>
                    Would you want to <a href="login.php">log in</a>?
              			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
            			</div>';
        } else {
          echo    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4>Something went wrong</h4>
                    Please try again.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
        }
      }
    ?>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" placeholder="example@example.com" required data-msg="Please enter your email">
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" name="username" placeholder="Username" required data-msg="Please enter your username">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" placeholder="*****" required data-msg="Please enter your password">
    </div>
    <button class="btn" type="submit" name="register_btn">Sign up</button>
    <p class="text-center small"><a href="#">Did you forget your password?</a> Or do you want to <a href="login.php">sign in</a>?</p>
  </form>

</div>

<?php include 'lib/footer.php'; ?>
