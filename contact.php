<?php include 'lib/header.php'; ?>

  <div class="container custom">
    <div class="about-section">
      <br>
        <h1 class="text-center">About us</h1>
        <br>
        <p>Some text about who we are and what we do. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor quis justo vel iaculis. Fusce in auctor dolor, vel imperdiet odio. Duis eget efficitur nisi. Mauris nec augue tempus, ornare felis a, volutpat mauris. Sed sodales laoreet velit, id egestas nisi consectetur quis. Duis condimentum vehicula congue.
           Quisque eleifend nulla ut lacus iaculis, in venenatis nibh euismod. In vitae eleifend elit.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor quis justo vel iaculis. Fusce in auctor dolor, vel imperdiet odio. Duis eget efficitur nisi. Mauris nec augue tempus, ornare felis a, volutpat mauris. Sed sodales laoreet velit, id egestas nisi consectetur quis. Duis condimentum vehicula congue.</p>
        <br>
      </div>

      <h2 class="text-center">Our Team</h2>
      <br>

      <div class="row">
        <div class="col-sm-3">
      <div class="card col">
        <img src="img/profiilikuva.png" alt="Kirsi" style="width:100%">
        <br>
        <h4 class="text-center">Kirsi<br>Suoranta</h4>
        <p class="title">Team leader</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor quis justo vel iaculis. Fusce in auctor dolor, vel imperdiet odio. Duis eget efficitur nisi.</p>
        <ul class="list-inline mb-0">
          <li class="list-inline-item mr-3"><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li class="list-inline-item mr-3"><a href="#"><i class="fab fa-linkedin"></i></a></li>
          <li class="list-inline-item mr-3"><a href="#"><i class="fab fa-facebook"></i></a></li>
        </ul>

        </div>
      </div>


      <div class="col-sm-3">
        <div class="card col">

          <img src="img/profiilikuva.png" alt="Roope" style="width:100%">
          <br>
          <h4 class="text-center">Roope<br>Pennanen</h4>
          <p class="title">Team member</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor quis justo vel iaculis. Fusce in auctor dolor, vel imperdiet odio. Duis eget efficitur nisi.</p>
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3"><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li class="list-inline-item mr-3"><a href="#"><i class="fab fa-linkedin"></i></a></li>
            <li class="list-inline-item mr-3"><a href="#"><i class="fab fa-facebook"></i></a></li>
          </ul>

          </div>
        </div>

        <div class="col-sm-3">
          <div class="card col">

            <img src="img/profiilikuva.png" alt="Jenna" style="width:100%">
            <br>
            <h4 class="text-center">Jenna<br>Aaltonen</h4>
            <p class="title">Team member</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor quis justo vel iaculis. Fusce in auctor dolor, vel imperdiet odio. Duis eget efficitur nisi.</p>
            <ul class="list-inline mb-0">
              <li class="list-inline-item mr-3"><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li class="list-inline-item mr-3"><a href="#"><i class="fab fa-linkedin"></i></a></li>
              <li class="list-inline-item mr-3"><a href="#"><i class="fab fa-facebook"></i></a></li>
            </ul>

            </div>
          </div>

          <div class="col-sm-3">
            <div class="card col">

              <img src="img/profiilikuva.png" alt="Petri" style="width:100%">
              <br>
              <h4 class="text-center">Petri<br>Paukkunen</h4>

              <p class="title">Team member</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor quis justo vel iaculis. Fusce in auctor dolor, vel imperdiet odio. Duis eget efficitur nisi..</p>
              <ul class="list-inline mb-0">
                <li class="list-inline-item mr-3"><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item mr-3"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                <li class="list-inline-item mr-3"><a href="#"><i class="fab fa-facebook"></i></a></li>
              </ul>

              </div>
            </div>

            </div>

            <div class="card text-center mt-2">
              <div class="card-header">
                  <h5 class="font-weight-bold">Contact us</h5>
                  <p class="text-muted">
                    Please send us a contact request and we will contact you very soon.<br>

                  </p>
                  <form action="" method="post">

                    <div class="form-group">
                      <label for="firstname">First name</label>
                      <input type="text" class="form-control" id="firstname" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="lastname">Last name</label>
                      <input type="text" class="form-control" id="lastname" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" class="form-control" id="email" placeholder="">
                    </div>


                    <div class="form-group">
                      <label for="message">Message</label>
                      <textarea class="form-control" id="message" rows="6"></textarea>
                    </div>
                    <button type="submit" class="btn">Submit</button>
                  </form>

                  <?php

                  /*if (isset($_POST['firstname']) {
                    $kysely = "insertfkgjdlkg";
                    $laheta = mysqli_query($kysely, $yhteys);


                  }
                  else {
                  echo 'Jotain meni pieleen';
                }*/

                   ?>

              </div>
          </div>
  </div>

<?php include 'lib/footer.php'; ?>
