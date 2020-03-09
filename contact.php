<?php include 'lib/header.php'; 

?>

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
                  <form action="contact.php" method="post">

                  <?php
                  if (isset($_REQUEST['submitbutton'])){    //jos submit-nappia painetaan, tapahtuu seuraavat jutut
                          $etunimi = $_POST['firstname'];
                          $sukunimi = $_POST['lastname'];
                          $aihe = $_POST['topic'];
                          $lomake_txt = $_POST['message'];
                          $puhnro = $_POST['phonenumber'];
                          $sahkoposti = $_POST['email'];

                  
                          $sql = "INSERT INTO webneer_yhteydenottolomake(etunimi, sukunimi, aihe, lomake_txt, puhnro, sahkoposti) VALUES(?, ?, ?, ?, ?, ?)";
                          $stmt = mysqli_prepare($yhteys, $sql);
                          mysqli_stmt_bind_param($stmt, "ssssss", $etunimi, $sukunimi, $aihe, $lomake_txt, $puhnro, $sahkoposti); //asetetaan oikeet oikeisiin
                          mysqli_stmt_execute($stmt); //toiminta
                          


                          

                          if($_POST["firstname"] !=null && $_POST["lastname"] !=null && $_POST["topic"] !=null && $_POST["message"] !=null && $_POST["phonenumber"] !=null && $_POST["email"]){
                            echo '<div class="alert alert-success" role="alert">
                            Your message was sent succesfully! We will contact you as soon as possible.
                            </div>';    //jos kaikki kohdat on täytetty, tulee onnistumis-alertti
                          }

                          mysqli_stmt_close($stmt);
                          mysqli_close($yhteys);
                         
                          
                  }
?>

                    <div class="form-group">
                      <label for="firstname">First name</label>
                      <input type="text" class="form-control" name="firstname" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="lastname">Last name</label>
                      <input type="text" class="form-control" name="lastname" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="text" class="form-control" name="email" placeholder="" required>
                    </div>

                    <div class="form-group">
                      <label for="phonenumber">Phone number</label>
                      <input type="text" class="form-control" name="phonenumber" placeholder="" required>
                    </div>

                    <div class="form-group">
                      <label for="topic">Topic</label>
                      <input type="text" class="form-control" name="topic" placeholder="" required>
                    </div>

                    <div class="form-group">
                      <label for="message">Message</label>
                      <textarea class="form-control" name="message" rows="6"></textarea>
                    </div>
                    <button type="submit" class="btn" name="submitbutton">Submit</button>
                  </form>

                 
                  
                
              

                
                  

              </div>
          </div>
  </div>

<?php include 'lib/footer.php'; ?>
