<?php
include 'lib/header.php';

$sitename = "Accounts";


if(isset($_GET['id'])){
    $userid = $_GET['id'];
}else{
    $userid = $id;
}

$query = "SELECT * FROM webneer_kayttajat WHERE id = '$userid'";

$result = mysqli_query($yhteys, $query);
$row = mysqli_fetch_array($result);
?>

<body>
<div class="wrapper" >

    <?php include 'lib/sidebar.php'; ?>

    <!-- Page Content -->
    <div id="content" class="container">
    <?php

    if (isset($_REQUEST['updateinfo'])) {

        $sahkoposti = $_POST['email'];
        $etunimi = $_POST['firstname'];
        $sukunimi = $_POST['lastname'];
        $lahiosoite = $_POST['address'];
        $postinro = $_POST['zipcode'];
        $postitmp = $_POST['city'];
        $puhnro = $_POST['phonenumber'];
        $id = $_POST['user_id'];
        $newrank = $_POST['rank-select'];

        $query = "UPDATE webneer_kayttajat SET oikeudet='$newrank', sahkoposti = '$sahkoposti', etunimi = '$etunimi', sukunimi = '$sukunimi', lahiosoite = '$lahiosoite', postinro = '$postinro', postitmp = '$postitmp', puhnro = '$puhnro' WHERE id = $id";
        $result = mysqli_query($yhteys, $query);

        if (!isset($result)) {
            die ("Something went wrong... Try again later.");
        } else {
            echo    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h4>User information updated succesfully</h4>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';

            $query = "SELECT * FROM webneer_kayttajat WHERE id = '$userid'";

            $result = mysqli_query($yhteys, $query);
            $row = mysqli_fetch_array($result);
        }

    }
    ?>
    <form action="" method="post">

    <div class="form-group row">
      <label for="id" class="col-sm-2 col-form-label">ID</label>
      <div class="col-sm-10">
        <input type="text" disabled class="form-control" name="user_id" value="<?php echo $row['id']; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="tunnus" class="col-sm-2 col-form-label">Tunnus</label>
      <div class="col-sm-10">
        <input type="text" disabled class="form-control" name="tunnus" value="<?php echo $row['kayttajatunnus']; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" value="<?php echo $row['sahkoposti']; ?>">
      </div>
    </div>

    <div class="form-group row">
        <label for="rank-select" class="col-sm-2 col-form-label">Rank</label>
        <div class="col-sm-10">
        <select class="custom-select" name="rank-select">
            <?php
            $sql = "SELECT id, rooli FROM webneer_oikeudet";
            if($result = mysqli_query($yhteys, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row2 = mysqli_fetch_array($result)){
                        if($row['oikeudet'] == $row2['id']){
                            echo "<option selected='selected' value='".$row2["id"]."'>".$row2["rooli"]."</option>";
                        }else{
                            echo "<option value='".$row2["id"]."'>".$row2["rooli"]."</option>";
                        }
                    }
                }
            }
            ?>
        </select>
        </div>
    </div>

    <hr>

    <div class="form-group row">
      <label for="firstname" class="col-sm-2 col-form-label">First name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="firstname" value="<?php echo $row['etunimi']; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="lastname" class="col-sm-2 col-form-label">Last name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="lastname" value="<?php echo $row['sukunimi']; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="address" class="col-sm-2 col-form-label">Address</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="address" value="<?php echo $row['lahiosoite']; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="zipcode" class="col-sm-2 col-form-label">Zip code</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="zipcode" value="<?php echo $row['postinro']; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="city" class="col-sm-2 col-form-label">City</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="city" value="<?php echo $row['postitmp']; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="phonenumber" class="col-sm-2 col-form-label">Phone number</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="phonenumber" value="<?php echo $row['puhnro']; ?>">
      </div>
    </div>

    <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
    <button type="submit" class="btn" name="updateinfo">Update information</button>

  </form>
    </div>

</div> 

</body>
</html>