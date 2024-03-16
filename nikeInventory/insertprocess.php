<?php
include 'connect.php';

function insertAvailableSizes($shoeId, $conn) {
    for ($i = 1; $i <= 24; $i++) {
        $insert = "INSERT INTO tbl_shoe_available_sizes (shoeID,sizeID) VALUES ($shoeId,$i)";
        $insertOperation = mysqli_query($conn, $insert);
        if (!$insertOperation) {
            echo "Error inserting available size: " . mysqli_error($conn);
            return false;
        }
    }
    return true;
}

if(isset($_POST['submit'])){
    $shoeName = $_POST['shoeName'];
    $category = $_POST['category'];
    $gender = $_POST['gender'];
    $shoePrice = $_POST['shoePrice'];
    $shoeColor = $_POST['shoeColor'];

    $targetDir = "uploads/"; // Directory where uploaded files will be stored
    $fileName = uniqid() . '_' . basename($_FILES["shoeImage"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["shoeImage"]["tmp_name"]);
    if($check !== false) {
        if(move_uploaded_file($_FILES["shoeImage"]["tmp_name"], $targetFilePath)){
            // Insert data into database
            
            $insert = "INSERT INTO tbl_shoes_inventory (gender, category, shoeName, shoePrice, shoeColor, shoeImage) VALUES ('$gender', '$category', '$shoeName', $shoePrice, '$shoeColor',  '$targetFilePath')";
            $insertOperation = mysqli_query($conn, $insert);
            if($insertOperation){
                $shoeId = mysqli_insert_id($conn); // Get the ID of the last inserted shoe
                if (!insertAvailableSizes($shoeId, $conn)) {
                    // Rollback or handle error if insertion of available sizes fails
                    // For simplicity, I'm just echoing the error here
                    echo "Error inserting available sizes for shoe ID: $shoeId";
                }

                header('Location: index.php');
            } else{
                echo "Error: " . $insertOperation . "<br>" . mysqli_error($conn);
            }

        } else{
            echo "Error uploading file.";
        }
    } else {
        echo "File is not an image.";
    }

}