<?php
include 'lib/header.php';

$sitename = "CreateProduct";

$tuotenimi = $tuotekuvaus = $hinta = "";
$tuotenimi_err = $tuotekuvaus_err = $hinta_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $input_name = trim($_POST["tuotenimi"]);
    if(empty($input_name)){
        $tuotenimi_err = "Please enter a product name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){ //Vain kirjaimet
        $tuotenimi_err = "Please enter a valid name.";
    } else{
        $tuotenimi = $input_name;
    }
    
  
    $input_tuotekuvaus = trim($_POST["tuotekuvaus"]);
    if(empty($input_tuotekuvaus)){
        $tuotekuvaus_err = "Please enter product details.";     
    } else{
        $tuotekuvaus = $input_tuotekuvaus;
    }
    
    
    $input_hinta = trim($_POST["hinta"]);
    if(empty($input_hinta)){
        $hinta_err = "Please enter the price.";     
    } elseif(!ctype_digit($input_hinta)){
        $salary_err = "Please enter a positive decimal/integer value.";
    } else{
        $hinta = $input_hinta;
    }
    
    
    if(empty($tuotenimi_err) && empty($tuotekuvaus_err) && empty($hinta_err)){
       
        $sql = "INSERT INTO webneer_tuote (tuotenimi, tuotekuvaus, hinta) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($yhteys, $sql)){
            
            mysqli_stmt_bind_param($stmt, "ssd", $param_tuotenimi, $param_tuotekuvaus, $param_hinta);
            
            
            $param_tuotenimi = $tuotenimi;
            $param_tuotekuvaus = $tuotekuvaus;
            $param_hinta = $hinta;
            
            
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
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($tuotenimi_err)) ? 'has-error' : ''; ?>">
                            <label>Product Name</label>
                            <input type="text" name="tuotenimi" class="form-control" value="<?php echo $tuotenimi; ?>">
                            <span class="help-block"><?php echo $tuotenimi_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($tuotekuvaus_err)) ? 'has-error' : ''; ?>">
                            <label>Product Description</label>
                            <textarea name="tuotekuvaus" class="form-control"><?php echo $tuotekuvaus; ?></textarea>
                            <span class="help-block"><?php echo $tuotekuvaus_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($hinta_err)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="text" name="hinta" class="form-control" value="<?php echo $hinta; ?>">
                            <span class="help-block"><?php echo $hinta_err;?></span>
                        </div>
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