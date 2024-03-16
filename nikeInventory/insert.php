<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nike Inventory System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
            font-family: Arial, sans-serif;
        }
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .custom-container {
            background-color: #ffffff;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
            max-width: 600px;
            width: 100%;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #ff3e6c;
            border-color: #ff3e6c;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #e6335e;
            border-color: #e6335e;
        }
    </style>
</head>
<body>
    <div class="center-container">
        <div class="custom-container">
            <h1 class="mb-4 text-center">Nike Inventory System</h1>
            <form action="insertprocess.php" method="POST" enctype="multipart/form-data" id="inventoryForm" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="shoeName" class="form-label">Shoe Name:</label>
                    <input type="text" class="form-control" id="shoeName" name="shoeName" required>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category:</label>
                    <select class="form-select" id="category" name="category" required>
                        <option selected disabled hidden>Shoe Category</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Lifestyle">Lifestyle</option>
                        <option value="Basketball">Basketball</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="shoeImage" class="form-label">Product Image:</label>
                    <input type="file" class="form-control" id="shoeImage" name="shoeImage" required>
                </div>
                <div class="mb-3">
                    <label class="form-label d-block">Gender:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="menRadio" value="Men" required>
                        <label class="form-check-label" for="menRadio">Men</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="womenRadio" value="Women" required>
                        <label class="form-check-label" for="womenRadio">Women</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="boysRadio" value="Boys" required>
                        <label class="form-check-label" for="boysRadio">Kids - Boys</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="girlsRadio" value="Girls" required>
                        <label class="form-check-label" for="girlsRadio">Kids - Girls</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="shoePrice" class="form-label">Shoe Price:</label>
                    <input type="number" step="0.01" class="form-control" id="shoePrice" name="shoePrice" required>
                </div>
                <div class="mb-3">
                    <label for="shoeColor" class="form-label">Shoe Color:</label>
                    <input type="text" class="form-control" id="shoeColor" name="shoeColor" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
