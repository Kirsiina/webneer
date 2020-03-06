<?php
include 'lib/header.php';

$sitename = "Feedback";


if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){  
    $sql = "SELECT * FROM webneer_yhteydenottolomake WHERE id = ?";
    
    if($stmt = mysqli_prepare($yhteys, $sql)){
        
        mysqli_stmt_bind_param($stmt, "i", $id); 
        $id = trim($_GET["id"]);
           
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                $etunimi = $row["etunimi"];
                $sukunimi = $row["sukunimi"];
                $aihe = $row["aihe"];
                $lomake_txt = $row["lomake_txt"];
                $puhnro = $row["puhnro"];
                $sahkoposti = $row["sahkoposti"];
            } else{
                header("location: error.php");
                exit();
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    
    mysqli_close($yhteys);
} else{
    header("location: error.php");
    exit();
}
?>

<body>
<div class="wrapper" >

    <?php include 'lib/sidebar.php'; ?>

    <!-- Page Content -->
    <div id="content">
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View contact requests</h1>
                    </div>
                    <div class="form-group">
                        <label><b>First name</b></label>
                        <p class="form-control-static"><?php echo $row["etunimi"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label><b>Last name</b></label>
                        <p class="form-control-static"><?php echo $row["sukunimi"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label><b>Topic</b></label>
                        <p class="form-control-static"><?php echo $row["aihe"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label><b>Message</b></label>
                        <p class="form-control-static"><?php echo $row["lomake_txt"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label><b>Phone number</b></label>
                        <p class="form-control-static"><?php echo $row["puhnro"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label><b>E-mail</b></label>
                        <p class="form-control-static"><?php echo $row["sahkoposti"]; ?></p>
                    </div>
                    <p><a href="feedback.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>

</div> 

</body>
</html>