<?php
include 'lib/header.php';

$sitename = "UpdateProduct";

$tuotenimi = $tuotekuvaus = $hinta = "";
$tuotenimi_err = $tuotekuvaus_err = $hinta_err = "";
 

if(isset($_POST["id"]) && !empty($_POST["id"])){
    
    $id = $_POST["id"];
    
    // Validate name
    $input_tuotenimi = trim($_POST["tuotenimi"]);
    if(empty($input_tuotenimi)){
        $tuotenimi_err = "Please enter a product name.";
    } elseif(!filter_var($input_tuotenimi, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){ //Vain kirjaimia
        $tuotenimi_err = "Please enter a valid name.";
    } else{
        $tuotenimi = $input_tuotenimi;
    }
    
    
    $input_tuotekuvaus = trim($_POST["tuotekuvaus"]);
    if(empty($input_tuotekuvaus)){
        $tuotekuvaus_err = "Please enter a product detail.";     
    } else{
        $tuotekuvaus = $input_tuotekuvaus;
    }
    
    
    $input_hinta = trim($_POST["hinta"]);
    if(empty($input_hinta)){
        $hinta_err = "Please enter a valid price.";     
    } elseif(!ctype_digit($input_hinta)){
        $hinta_err = "Please enter a positive integer value.";
    } else{
        $hinta = $input_hinta;
    }
    
   
    if(empty($tuotenimi_err) && empty($tuotekuvaus_err) && empty($hinta_err)){
        
        $sql = "UPDATE webneer_tuote SET tuotenimi=?, tuotekuvaus=?, hinta=? WHERE id=?";
         
        if($stmt = mysqli_prepare($yhteys, $sql)){
            
            mysqli_stmt_bind_param($stmt, "ssdi", $param_tuotenimi, $param_tuotekuvaus, $param_hinta, $param_id);
            
            
            $param_tuotenimi = $tuotenimi;
            $param_tuotekuvaus = $tuotekuvaus;
            $param_hinta = $hinta;
            $param_id = $id;
            
            
            if(mysqli_stmt_execute($stmt)){
                
                header("location: products.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        
        mysqli_stmt_close($stmt);
    }
    
    
    mysqli_close($yhteys);
} else{
    
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        
        $id =  trim($_GET["id"]);
        
        
        $sql = "SELECT * FROM webneer_tuote WHERE id = ?";
        if($stmt = mysqli_prepare($yhteys, $sql)){
            
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            
            $param_id = $id;
            
            
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
        
        
        mysqli_close($yhteys);
    }  else{
        
        header("location: error.php");
        exit();
    }
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
                    <div class="pprice-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($tuotenimi_err)) ? 'has-error' : ''; ?>">
                            <label>Product name</label>
                            <input type="text" name="tuotenimi" class="form-control" value="<?php echo $tuotenimi; ?>">
                            <span class="help-block"><?php echo $tuotenimi_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($tuotekuvaus_err)) ? 'has-error' : ''; ?>">
                            <label>Prodcut detail</label>
                            <textarea name="tuotekuvaus" class="form-control"><?php echo $tuotekuvaus; ?></textarea>
                            <span class="help-block"><?php echo $tuotekuvaus_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($hinta_err)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="text" name="hinta" class="form-control" value="<?php echo $hinta; ?>">
                            <span class="help-block"><?php echo $hinta_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="products.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>

</div> 

</body>
</html>