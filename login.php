<?php

  include 'lib/header.php';
  include 'lib/config.php';
  include 'lib/reset-password.php';

  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location: profile.php");
  }

?>

  <div class="container custom">
    <h1 class="text-center">Log in</h1>
    <p class="lead">Here you can log in and make some changes.</p>

    <form action="login.php" method="post" name="">

  <?php

  if (isset($_GET['new-password'])) {
    echo    '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <h4>Your password is changed successfully</h4>
              You can now log in with your new password.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }

  if (isset($_REQUEST['login_btn'])) {
    $sahkoposti = $_POST['email'];
    $salasana = $_POST['password'];

    $query = "SELECT * FROM webneer_kayttajat WHERE sahkoposti = '$sahkoposti'";
    $result = mysqli_query($yhteys, $query);
    $rows = mysqli_num_rows($result);

    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $kayttajatunnus = $row['kayttajatunnus'];
      $hashed_password = $row['salasana'];
      $oikeudet = $row['oikeudet'];
    }

    if ($rows == 1) {
      if (password_verify($salasana, $hashed_password)) {
        if (password_needs_rehash($hashed_password, PASSWORD_DEFAULT)) {
          $newHash = password_hash($salasana, PASSWORD_DEFAULT);
        }
        if ($oikeudet == 2) {
          session_start();
          $_SESSION["loggedin"] = true;
          $_SESSION["id"] = $id;
          $_SESSION["kayttajatunnus"] = $kayttajatunnus;
          header("Location: profile.php");
        } else if ($oikeudet == 1) {
          session_start();
          $_SESSION["loggedin"] = true;
          $_SESSION["id"] = $id;
          $_SESSION["kayttajatunnus"] = $kayttajatunnus;
          header("Location: hallintapaneeli/index.php");
        }
      } else {
          echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <h4>Email or password is wrong</h4>
                  Please try again.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
      }
    }

  }

?>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" placeholder="example@example.com" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="*****" required>
        </div>
        <button type="submit" class="btn" name="login_btn">Login</button>
        <p class="text-center small"><a href="forgotten-password.php">Did you forget your password?</a> Or do you want to <a href="register.php">register</a>?</p>
      </form>

    </div>

<?php include 'lib/footer.php'; ?>
