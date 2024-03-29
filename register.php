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

        $hash_salasana = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query_username = "SELECT * FROM webneer_kayttajat WHERE kayttajatunnus = '$kayttajatunnus'";
        $query_email = "SELECT * FROM webneer_kayttajat WHERE sahkoposti = '$sahkoposti'";

        $result_username = mysqli_query($yhteys, $query_username);
        $result_email = mysqli_query($yhteys, $query_email);

        if (mysqli_num_rows($result_username) > 0) {
          echo    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4>Username is already taken</h4>
                    Please try again with different username. Or did you <a href="#">forgot</a> your password?
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
        } else if (mysqli_num_rows($result_email) > 0) {
          echo    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4>Email is already taken</h4>
                    Did you <a href="forgotten-password.php">forgot</a> your password?
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
        }

        else {
          $query = "INSERT INTO webneer_kayttajat (kayttajatunnus, salasana, oikeudet, sahkoposti) VALUES (?, ?, '2', ?)";
          $stmt = mysqli_prepare($yhteys, $query);
          mysqli_stmt_bind_param($stmt, 'sss', $kayttajatunnus, $hash_salasana, $sahkoposti);
          mysqli_stmt_execute($stmt);

          mysqli_stmt_close($stmt);
          mysqli_close($yhteys);

          echo    '<div class="alert alert-success alert-dismissible fade show" role="alert">
              			<h4>User account created successfully</h4>
                    Would you want to <a href="login.php">log in</a>?
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
    <p class="text-center small"><a href="forgotten-password.php">Did you forget your password?</a> Or do you want to <a href="login.php">sign in</a>?</p>
  </form>

</div>

<?php include 'lib/footer.php'; ?>
