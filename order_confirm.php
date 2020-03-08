<?php include 'lib/header.php'; 
      include 'lib/auth.php';

      $kayttajatunnus = $_SESSION['kayttajatunnus'];
      $date = date("Y-m-d H:i:s");
      $endDate = date("Y-m-d H:i:s", strtotime('+1 months'));

      
      if(isset($_POST["id"]) && !empty($_POST["id"])){
        
        $sql = "INSERT INTO webneer_tilaukset (kayttaja_id, tuote_id, summa, tilauspvm, paattymispvm) VALUES (?, ?, ?, ?, ?)";
        if($stmt = mysqli_prepare($yhteys, $sql)){

            $sql3 = "SELECT hinta FROM webneer_tuote WHERE id = ?";
            $stmt3 = mysqli_prepare($yhteys, $sql3);
            $param_tid = $_POST["id"];
            mysqli_stmt_bind_param($stmt3, "i", $param_tid);
            if(mysqli_stmt_execute($stmt3)){
                $result3 = mysqli_stmt_get_result($stmt3);
                $row = mysqli_fetch_array($result3);
                $param_summa = $row['hinta'];
            }
            mysqli_stmt_close($stmt3);

            $param_tuote_id = $_POST["id"];
            $param_tilauspvm = $date;
            $param_paattymispvm = $endDate;

            mysqli_stmt_bind_param($stmt, "iidss", $id, $param_tuote_id, $param_summa, $param_tilauspvm, $param_paattymispvm);

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
