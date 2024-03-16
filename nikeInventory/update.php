<?php
include "connect.php";

$shoesID = $_GET['shoesID'];
$selectOne = "SELECT * FROM tbl_shoes_inventory WHERE shoesID = $shoesID";
$result = mysqli_query($conn,$selectOne);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $shoeName = $_POST['shoeName'];
    $category = $_POST['category'];
    $gender = $_POST['gender'];
    $shoePrice = $_POST['shoePrice'];
    $shoeColor = $_POST['shoeColor'];

    $updateQuery = "UPDATE tbl_shoes_inventory SET shoeName = '$shoeName', category = '$category', gender = '$gender', shoePrice = $shoePrice, shoeColor = '$shoeColor' WHERE shoesID = $shoesID"; 

    $result = mysqli_query($conn, $updateQuery);
    if($result){
        header("Location: index.php");
    }else{
        echo "Failed to insert " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nike Inventory System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            height: 600px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        label {
            font-weight: bold;
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="file"] {
            margin-top: 10px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 15px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .preview {
            display: flex;
            align-items: center;
            height: 600px;
            padding: 20px;
        }
        #shoeImage{
            align-items: center;
            height: 100%;
        }

    </style>
</head>
<body>

    <div style="display: flex; width:auto; justify-content: center; margin-top:15px;">

    <div class="container">
        <h1>Nike Inventory System</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="shoeName">Shoe Name:</label>
            <input type="text" id="shoeName" name="shoeName" value="<?php echo $row['shoeName']?>" required>

            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option hidden>Shoe Category</option>
                <option value="Jordan" <?php if($row['category'] == 'Jordan') echo 'selected'; ?>>Jordan</option>
                <option value="Lifestyle" <?php if($row['category'] == 'Lifestyle') echo 'selected'; ?>>Lifestyle</option>
                <option value="Basketball" <?php if($row['category'] == 'Basketball') echo 'selected'; ?>>Basketball</option>
            </select>

            <label>Gender:</label>
            <div>
                <input type="radio" id="men" name="gender" value="Men" <?php if($row['gender'] == 'Men') echo 'checked'; ?> required>
                <label for="men">Men</label>
                <input type="radio" id="women" name="gender" value="Women" <?php if($row['gender'] == 'Women') echo 'checked'; ?> required>
                <label for="women">Women</label>
                <input type="radio" id="boys" name="gender" value="Boys" <?php if($row['gender'] == 'Boys') echo 'checked'; ?> required>
                <label for="boys">Kids - Boys</label>
                <input type="radio" id="girls" name="gender" value="Girls" <?php if($row['gender'] == 'Girls') echo 'checked'; ?> required>
                <label for="girls">Kids - Girls</label>
                
            </div>

            <br>
            <label for="shoePrice">Shoe Price:</label>
            <input type="number" id="shoePrice" name="shoePrice" value="<?php echo $row['shoePrice'] ?>" step="0.01" required>

            <label for="shoeColor">Shoe Color:</label>
            <input type="text" id="shoeColor" name="shoeColor" value="<?php echo $row['shoeColor'] ?>" required>

            <label for="shoeImageFile">Upload Image:</label>
            <input type="file" id="shoeImageFile" accept="image/*" onchange="previewImage(event)">
            
            

            <input type="submit" value="Update" name="update">
        </form>
    </div>

    <div class="preview">
        <img id="shoeImage" src="<?php echo $row['shoeImage']?>" alt="Product Image">
    </div>

    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('shoeImage');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
