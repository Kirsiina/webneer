<?php

  include 'lib/header.php';

?>

    <div class="container custom">
      <h1 class="text-center">Log in</h1>
      <p class="lead">Here you can log in and make some changes.</p>

      <form action="login.php" method="post" name="">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" placeholder="example@example.com">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="*****">
        </div>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button type="submit" class="btn" name="login_btn">Login</button>
        <p class="text-center small"><a href="#">Did you forget your password?</a> Or do you want to <a href="register.php">register</a>?</p>
      </form>

    </div>

<?php include 'lib/footer.php'; ?>
