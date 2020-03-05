<!DOCTYPE html>
<?php
include 'lib/header.php';

$sitename = "Products";
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

    <?php include 'lib/sidebar.php'; ?>

    <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Product Details</h2>
                        <a href="product_create.php" class="btn btn-success pull-right">Add New Product</a>
                    </div>
                    <?php
                    
                    
                    
                    
                    $sql = "SELECT * FROM webneer_tuote";
                    if($result = mysqli_query($yhteys, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Tuote</th>";
                                        echo "<th>Kuvaus</th>";
                                        echo "<th>Hinta</th>";
                                        echo "<th>Toiminto</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){ //hae kaikki tiedot
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['tuotenimi'] . "</td>";
                                        echo "<td>" . $row['tuotekuvaus'] . "</td>";
                                        echo "<td>" . $row['hinta'] . "</td>";
                                        echo "<td>"; //Ikonilinkit
<<<<<<< HEAD
                                            echo "<a href='product_read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='product_update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='product_delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
=======
                                            echo "<a href='product_read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='fa fa-eye'></span></a>";
                                            echo "<a href='product_update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>";
                                            echo "<a href='product_delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='fa fa-trash'></span></a>";
>>>>>>> 0c0194874562fa47c938356bd22ce847eb48fe9b
                                        echo "</td>";
                                    echo "</tr>";
                                }
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

</body>
</html>