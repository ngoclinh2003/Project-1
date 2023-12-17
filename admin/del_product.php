<?php
    // Conlectting to Database
    include_once("../config/database.php");
    if(isset($_GET['prd_id'])){
        $sqlCheck = "SELECT * FROM product WHERE prd_id =".$_GET['prd_id'];
        $queryCheck = mysqli_query($conn, $sqlCheck);
        if(mysqli_num_rows($queryCheck) > 0){
            //Delete
            $sqlDel = "DELETE FROM product WHERE prd_id=".$_GET['prd_id'];
            mysqli_query($conn, $sqlDel);
            header("Location: product.php");
        }else{
            header("Location: product.php");
        }
    }else{
        header("Location: product.php");
    }
?>