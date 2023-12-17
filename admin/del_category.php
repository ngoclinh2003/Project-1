<?php
    // Conlectting to Database
    include_once("../config/database.php");
    if(isset($_GET['cat_id'])){
        $sqlCheck = "SELECT * FROM category WHERE cat_id =".$_GET['cat_id'];
        $queryCheck = mysqli_query($conn, $sqlCheck);
        if(mysqli_num_rows($queryCheck) > 0){
            //Delete
            $sqlDel = "DELETE FROM category WHERE cat_id=".$_GET['cat_id'];
            mysqli_query($conn, $sqlDel);
            header("Location: category.php");
        }else{
            header("Location: category.php");
        }
    }else{
        header("Location: category.php");
    }
?>