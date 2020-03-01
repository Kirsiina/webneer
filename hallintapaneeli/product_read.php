<?php
include 'lib/header.php';

$sitename = "Feedback";


if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){  
    $sql = "SELECT * FROM webneer_tuote WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        
        mysqli_stmt_bind_param($stmt, "i", $param_id); 
        $param_id = trim($_GET["id"]);
           
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                $tuotenimi = $row["tuotenimi"];
                $tuotekuvaus = $row["tuotekuvaus"];
                $hinta = $row["hinta"];
            } else{
                header("location: error.php");
                exit();
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    
    mysqli_close($link);
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
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Product name</label>
                        <p class="form-control-static"><?php echo $row["tuotenimi"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Product detail</label>
                        <p class="form-control-static"><?php echo $row["tuotekuvaus"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <p class="form-control-static"><?php echo $row["hinta"]; ?></p>
                    </div>
                    <p><a href="products.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>

</div> 

</body>
</html>