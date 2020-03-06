<?php
include 'lib/header.php';

$sitename = "DeleteContact";


if(isset($_POST["id"]) && !empty($_POST["id"])){
    
    
    $sql = "DELETE FROM webneer_yhteydenottolomake WHERE id = ?";
    
    if($stmt = mysqli_prepare($yhteys, $sql)){
        
        $id=$_POST["id"];
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        
        
        if(mysqli_stmt_execute($stmt)){
            
            header("location: feedback.php");
            exit();
        } else{
            echo "Oops! Something went wrong.";
        }
    }
     
    
    mysqli_stmt_close($stmt);
    
    
    mysqli_close($yhteys);
} else{
    
    if(empty(trim($_GET["id"]))){
        
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
                    <div class="page-header">
                        <h1>Delete contact request from the list</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this contact request?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="feedback.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>

</div> 

</body>
</html>
