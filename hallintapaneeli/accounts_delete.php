<?php
include '../lib/config.php';
include 'lib/auth.php';

$sitename = "Accounts";

if(isset($_POST["id"]) && !empty($_POST["id"])){
    
    
    $sql = "DELETE FROM webneer_kayttajat WHERE id = ?";
    
    if($stmt = mysqli_prepare($yhteys, $sql)){
        
        $id=$_POST["id"];
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if(mysqli_stmt_execute($stmt)){
            echo 'Success';
        } else{
            echo "Error";
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($yhteys);
}
?>
