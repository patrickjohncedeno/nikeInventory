<?php
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styleee.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Nike Inventory System</title>
    <style>
        img{
            width: 150px;
        }
    </style>
</head>
<body>
    <header class="d-flex align-items-center justify-content-between">
        <div class="left d-flex align-items-center">
            <div class="logo">
                <img src="Logo.jpg" alt="" style="width: 60px; margin: 0px 0px 0px 10px;">
            </div>
            <div class="brand">
                Nike Shoes Inventory System
            </div>
        </div>

        <div class="right d-flex align-items-center pe-3">
            <div class="searchbar">
                <form action="">
                    <input type="search" id="searchInput" required>
                    <i class='bx bx-search' style='color:#ffffff' id="searchButton"></i>
                </form>
            </div>
        </div>
    </header>

    <div class="dashboard">
        <div class="shoe-category men" value="Men">
            <h2>Men Shoes</h2>
        </div>
        <div class="shoe-category women" value="Women">
            <h2>Women Shoes</h2>
        </div>
        <div class="shoe-category kids" value="Boys">
            <h2>Boy Shoes</h2>
        </div>
        <div class="shoe-category kids" value="Girls">
            <h2>Girl Shoes</h2>
        </div>
    </div>

<a href="insert.php"><button>Insert New Product</button></a>
    <table border="1" style="border-collapse: collapse;" id='list'>
        <tr>
            <th>Shoe ID</th>
            <th>Shoe Name</th>
            <th>Shoe Image</th>
            <th>Category</th>
            <th>Gender</th>
            <th>Shoe Price</th>
            <th>Color</th>
            <th>Quantity</th>
            <th>Operations</th>
        </tr>
        <?php
            $selectAll = "SELECT * FROM tbl_shoes_inventory";

            $result = mysqli_query($conn, $selectAll);

            if($result){
                $i = 1;
                while($row = mysqli_fetch_assoc($result)){
                    $shoeId = $row['shoesID'];
                    $shoeName = $row['shoeName'];
                    $category = $row['category'];
                    $gender = $row['gender'];
                    $price = $row['shoePrice'];
                    $color = $row['shoeColor'];

                    $totalQuantity = "SELECT SUM(quantity) as quantity FROM tbl_shoe_available_sizes WHERE shoeID = $shoeId";
                    $resultQuantity = mysqli_query($conn, $totalQuantity);
                    $roww = mysqli_fetch_assoc($resultQuantity);
                    
                    $quantity = $roww['quantity'];

                    $shoeImage = $row['shoeImage'];


                    echo "<tr>
                            <td>".$i."</td>
                            <td>".$shoeName."</td>
                            <td><img src='".$shoeImage."' alt='.$shoeImage.'></td>
                            <td>".$category."</td>
                            <td>".$gender."</td>
                            <td>Php sdf".$price."</td>
                            <td>".$color."</td>
                            <td>".$quantity."</td>
                            <td>
                                <a href='update_shoePerSize.php?shoesID=$shoeId'><button>Update Quantity per Product</button></a>
                                <a href='update.php?shoesID=$shoeId'><button>Update</button></a>
                                <a href='#' class='delete-btn' data-shoesid=$shoeId '><button>Delete</button></a>
                            </td>
                          </tr>";
                          $i++;
                }
            }
        
        ?>
        
    </table>
    <script>
        $(document).ready(function(){
        $('#searchButton').click(function(event){
            event.preventDefault(); // Prevent the default form submission
            var searchText = $('#searchInput').val().toLowerCase();
            $.ajax({
                url: 'search.php', // URL to your server-side script that fetches data from the database
                method: 'POST',
                data: {searchText: searchText},
                success: function(response) {
                    $('#list tr').remove()
                    $('#list').html(response); // Replace the content of the list with the filtered data
                }
            });
        });
    });
    </script>
    <script>
        $(document).ready(function(){
        $('.shoe-category').click(function(event){
            event.preventDefault(); // Prevent the default form submission
            var genderText = $(this).attr('value');
            $.ajax({
                url: 'filterGender.php', // URL to your server-side script that fetches data from the database
                method: 'POST',
                data: {genderText: genderText},
                success: function(response) {
                    $('#list tr').remove()
                    $('#list').html(response); // Replace the content of the list with the filtered data
                }
            });
        });
    });
    </script>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this item?");
    }

    $(document).ready(function(){
        $('.delete-btn').click(function(event){
            event.preventDefault(); // Prevent the default behavior of anchor tag
            var shoeId = $(this).data('shoesid');
            var confirmation = confirmDelete();
            if (confirmation) {
                // If user clicks Yes, continue with deletion
                window.location.href = 'delete.php?shoesID=' + shoeId;
            } else {
                // If user clicks No, do nothing
            }
        });
    });
</script>
</body>

</html>