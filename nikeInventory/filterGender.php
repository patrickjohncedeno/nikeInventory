<table border="1" style="border-collapse: collapse;" id='list'>
    <tr>
        <th>Shoe ID</th>
        <th>Shoe Name</th>
        <th>Shoe Image</th>
        <th>Category</th>
        <th>Gender</th>
        <th>Shoe Price</th>
        <th>Color</th>
        <th>Operations</th>
    </tr>
<?php
// Include database connection file
include 'connect.php';

// Check if searchText is set and not empty
if(isset($_POST['genderText']) && !empty($_POST['genderText'])) {
    // Sanitize the search input to prevent SQL injection
    $genderText = mysqli_real_escape_string($conn, $_POST['genderText']);

    // Construct the SQL query to search for matching records
    $query = "SELECT * FROM tbl_shoes_inventory WHERE gender = '$genderText'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if any matching records found
    if(mysqli_num_rows($result) > 0) {
        // Output the matching records as HTML
        while($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                    <td>".$row['shoesID']."</td>
                    <td>".$row['shoeName']."</td>
                    <td><img src='".$row['shoeImage']."' alt='".$row['shoeName']."'></td>
                    <td>".$row['category']."</td>
                    <td>".$row['gender']."</td>
                    <td>Php ".$row['shoePrice']."</td>
                    <td>".$row['shoeColor']."</td>
                    <td><a href='update.php?shoesID=".$row['shoesID']."'><button>Update</button></a>
                    <a href='delete.php?shoesID=".$row['shoesID']."'><button>Delete</button></a></td>
                  </tr>";
        }
    } else {
        // No matching records found
        echo "<tr><td colspan='9'>No results found</td></tr>";
    }
} else {
    // If searchText is not set or empty, handle accordingly
    echo "<tr><td colspan='9'>Please enter a search term</td></tr>";
}
?>
</table>
