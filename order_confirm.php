<?php include 'lib/header.php'; 
      include 'lib/auth.php';

      $kayttajatunnus = $_SESSION['kayttajatunnus'];



$tuote_id = "";

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
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to order this product?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="order.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>

</div> 