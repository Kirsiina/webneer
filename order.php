<?php include 'lib/header.php'; 
      include 'lib/auth.php';

      $kayttajatunnus = $_SESSION['kayttajatunnus'];


$pageNumbers = "";
$pageNumber_err = "";
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
<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script>
<body>
<div class="wrapper" >
<div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Product Details</h2>
                        
                    </div>
                    <?php
                    $sql = "SELECT * FROM webneer_tuote";
                    if($result = mysqli_query($yhteys, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Product</th>";
                                        echo "<th>Description</th>";
                                        echo "<th>Price</th>";
                                        echo "<th>Function</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){ //hae kaikki tiedot
                                    echo "<tr>";
                                        echo "<td>" . $row['tuotenimi'] . "</td>";
                                        echo "<td>" . $row['tuotekuvaus'] . "</td>";
                                        echo "<td>" . $row['hinta'] . "</td>";
                                        echo "<td>"; //Button
                                        echo "<a href='order_confirm.php?id=". $row['id'] ."' title='Buy Now' data-toggle='tooltip'><span class='fa fa-shopping-cart'></span></a>";
                                        echo "</td>";
                                        
                                    echo "</tr>";
                                }
                                ?>
                                        <script type="text/javascript">
                                        function high(id)
                                        {
                                            $tuote_id = id;
                                        }
                                        </script>
                                         <?php
                                echo "</tbody>";                            
                            echo "</table>";
                            // muistin vapautus
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($yhteys);
                    }
 
                    
                    mysqli_close($yhteys);
                    ?>
                </div>
            </div>        
        </div>

</div> 