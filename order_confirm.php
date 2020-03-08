<?php include 'lib/header.php'; 
      include 'lib/auth.php';

      $kayttajatunnus = $_SESSION['kayttajatunnus'];
      $date = '2009-04-30 10:09:00';
      $endDate = '2009-04-30 10:10:00';
      $sum = 12.0;
      $userID = 11;

      
      if(isset($_POST["id"]) && !empty($_POST["id"])){
        
        $sql = "INSERT INTO webneer_tilaukset (kayttaja_id, tuote_id, summa, tilauspvm, paattymispvm) VALUES (?, ?, ?, ?, ?)";
        if($stmt = mysqli_prepare($yhteys, $sql)){
            mysqli_stmt_bind_param($stmt, "iidss", $param_kayttaja_id, $param_tuote_id, $param_summa, $param_tilauspvm, $param_paattymispvm);

            $param_kayttaja_id = $userID;
            $param_tuote_id = $_POST["id"];
            $param_summa = $sum;
            $param_tilauspvm = $date;
            $param_paattymispvm = $endDate;
    
            if(mysqli_stmt_execute($stmt)){
            
                header("location: order.php");
                exit();
            } else{
                echo "Oops! Something went wrong.";
            }
            mysqli_stmt_close($stmt);
            mysqli_close($yhteys);

        }


      }



?>
<style type="text/css">
        
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 20px;
            
        }
        
</style>
<body>
<div class="wrapper" >
    <div id="content">
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Order Product</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to order this product?</p><br>
                            <p>
                                <input type="submit" value="Submit" class="btn btn-danger">
                                <a href="order.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>

</div> 

<!--
$pageNumbers = "";
$pageNumber_err = "";
$productID = "";

$input_number = trim($_POST["pageNumbers"]);
if(empty($input_number)){
    $pageNumber_err = "Please enter the number of pages.";
}else if($input_number > 250){
    $pageNumber_err = "Maximum pages is 250";
}else{
    $pageNumbers = $input_number;
    $productID = 7;
}

if(empty($pageNumber_err)){
    $sql = "INSERT INTO webneer_tilaus (kayttaja_id, tuote_id, summa, tilauspvm, paattymispvm) VALUES (?, ?, ?, NOW(), ?)";

    if($stmt = mysqli_prepare($yhteys, $sql)){
        mysqli_stmt_bind_param($stmt, "iidss", $param_kayttaja_id, $param_tuote_id, $param_summa, $param_tilauspvm. $param_paattymispvm);

        $param_kayttaja_id = 100;
        $param_tuote_id = 7;
        $param_summa = $pageNumbers * 20;
        $param_tilauspvm = '2009-04-30 10:09:00';
        $param_paattymispvm = '2009-04-30 10:09:00';

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($yhteys);

}

include 'lib/design_modal3.php';

--> 