<?php
include "connect.php";

$shoesID = $_GET['shoesID'];

$selectOne = "SELECT * FROM tbl_shoes_inventory WHERE shoesID = $shoesID";

$result = mysqli_query($conn, $selectOne);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $quantity = $_POST['quantity'];
    $sizeID = $_POST['size'];

    // Update quantity based on both shoesID and sizeID
    $updateQuery = "UPDATE tbl_shoe_available_sizes SET quantity = $quantity WHERE sizeID = $sizeID AND shoeID = $shoesID";

    $result = mysqli_query($conn, $updateQuery);
    if ($result) {
        header("Location: index.php");
    } else {
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
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 250px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        img {
            display: block;
            margin: 0 auto 20px;
            max-width: 100%;
            height: auto;
        }

        h3 {
            margin: 0;
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        select,
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="rgba(0, 0, 0, 0.5)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5H7z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 15px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <img src="<?php echo $row['shoeImage'] ?>" alt="Product Image">
            <h3><?php echo $row['shoeName']; ?></h3>
            <br>
            <label for="size">Choose Size:</label>
            <select name="size" id="size" required>
            <option value="1">1</option>
            <option value="2">1.5</option>
            <option value="3">2</option>
            <option value="4">2.5</option>
            <option value="5">3</option>
            <option value="6">3.5</option>
            <option value="7">4</option>
            <option value="8">4.5</option>
            <option value="9">5</option>
            <option value="10">5.5</option>
            <option value="11">6</option>
            <option value="12">6.5</option>
            <option value="13">7</option>
            <option value="14">7.5</option>
            <option value="15">8</option>
            <option value="16">8.5</option>
            <option value="17">9</option>
            <option value="18">9.5</option>
            <option value="19">10</option>
            <option value="20">10.5</option>
            <option value="21">11</option>
            <option value="22">11.5</option>
            <option value="23">12</option>
            <option value="24">12.5</option>
                <!-- Add other options -->
            </select>
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" required>
            <input type="submit" value="Update" name="update">
        </form>
    </div>
</body>

</html>