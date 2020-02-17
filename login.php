<?php include 'lib/header.php';

session_start();

if (isset($_POST['kayttajatunnus'])) {

  $kayttajatunnus = stripslashes($_REQUEST['kayttajatunnus']);
  $kayttajatunnus = mysqli_real_escape_string($yhteys, $kayttajatunnus);
  $salasana = stripslashes($_REQUEST['salasana']);
  $salasana = mysqli_real_escape_string($yhteys, $salasana);

  $kysely = "select * from kayttajat where kayttajatunnus = '$kayttajatunnus' and salasana = '".md5($salasana)."'";
  $tulos = mysqli_query($yhteys, $kysely);

  $rivit = mysqli_num_rows($tulos);

  if ($rivit == 1 && $rivit['oikeudet'] == 1) {
    $_SESSION['kayttajatunnus'] = $kayttajatunnus;
    header ("Location: hallintapaneeli/index.php");
  } else {
    echo  '<div class="alert alert-danger alert-dismissible fade show col-md-6 offset-md-3 text-center" role="alert">'.
          'Käyttäjätunnus tai salasana väärin!'.
          '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
          '<span aria-hidden="true">&times;</span>'.
          '</button></div>';
  }

}

?>

    <div class="container custom">
      <h1 class="text-center">Log in</h1>
      <p class="lead">Here you can log in and make some changes.</p>

      <form action="" method="" name="">
        <div class="form-group">
          <label for="formGroupExampleInput">Email</label>
          <input type="email" class="form-control" id="email" placeholder="example@example.com">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Password</label>
          <input type="password" class="form-control" id="password" placeholder="*****">
        </div>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <input class="btn" type="submit" value="Sign in">
        <p class="text-center small"><a href="#">Did you forget your password?</a> Or do you want to <a href="register.php">register</a>?</p>
      </form>

    </div>

<?php include 'lib/footer.php'; ?>
