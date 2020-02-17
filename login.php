<?php include 'lib/header.php'; ?>

    <div class="container custom">
      <h1 class="text-center">Log in to admin panel</h1>
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
        <button class="btn btn-lg btn-primary" type="submit">Sign in</button>
        <p class="text-center small"><a href="#">Did you forget your password?</a> Or do you want to <a href="register.php">register</a>?</p>
      </form>

    </div>

<?php include 'lib/footer.php'; ?>
