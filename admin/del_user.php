<?php
    // Conlectting to Database
    include_once("../config/database.php");
    if(isset($_GET['user_id'])){
        $sqlCheck = "SELECT * FROM users WHERE user_id=".$_GET['user_id'];
        $queryCheck = mysqli_query($conn, $sqlCheck);
        if(mysqli_num_rows($queryCheck) > 0){
            //Delete
            $sqlDel = "DELETE FROM users WHERE user_id=".$_GET['user_id'];
            mysqli_query($conn, $sqlDel);
            header("location: user.php");
        }else{
            header("location: user.php");
        }
    }else{
        header("location: user.php");
    }
?>