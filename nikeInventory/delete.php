<?php

include 'connect.php';

$shoeID = $_GET['shoesID'];

$query = "DELETE FROM tbl_shoes_inventory WHERE shoesID = $shoeID";
        $result = mysqli_query($conn,$query);
        if($result){
            header('location: index.php');
            exit();
        }else{
            echo "Can't delete Shoe ID No. " . $shoeID;
        }