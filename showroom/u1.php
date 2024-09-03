<?php
include("database.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $vehicleID = $_POST["VehicleID"];
    $type = $_POST["Type"];
    $model = $_POST["Model"];
    $brand = $_POST["Brand"];
    $year = $_POST["Year"];
    $price = $_POST["Price"];
    $quantity = $_POST["Quantity"];
    $managerID = $_POST["ManagerID"];

    // Update query
    $sql = "UPDATE VehicleInventory SET Type = '$type', Model = '$model', Brand = '$brand', Year = $year, Price = $price, Quantity = $quantity, Manager_ID = $managerID WHERE Vehicle_ID = $vehicleID";

    // Execute the query
    try{
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } }catch(mysqli_sql_exception) {
        echo "Error updating record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Vehicle Record</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff; /* Light Sky Blue Background */
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    h2 {
        color: #333; /* Dark Gray Text Color */
    }

    form {
        max-width: 400px;
        width: 100%;
        padding: 20px;
        background-color: #fff; /* White */
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #333; /* Dark Gray Text Color */
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 16px;
        border: 1px solid #ccc; /* Light Gray Border */
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #87cefa; /* Light Sky Blue Button Background */
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #4682b4; /* Darker Sky Blue Button Background on Hover */
    }

    .redirect-button {
        position: absolute;
        top: 20px;
        right: 20px;
        background-color: #333; /* Dark Gray Button Background */
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
    }

    .redirect-button:hover {
        background-color: #555; /* Darker Gray Button Background on Hover */
    }
</style>
</head>
<body>
    <a href="inventory.php" class="redirect-button">Vehicles</a>

    <h2>Update Vehicle Record</h2>
    
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="VehicleID">Vehicle ID:</label>
        <input type="text" name="VehicleID" required>
        <label for="Type">Type:</label>
        <input type="text" name="Type" required>
        <label for="Model">Model:</label>
        <input type="text" name="Model" required>
        <label for="Brand">Brand:</label>
        <input type="text" name="Brand" required>
        <label for="Year">Year:</label>
        <input type="text" name="Year" required>
        <label for="Price">Price:</label>
        <input type="text" name="Price" required>
        <label for="Quantity">Quantity:</label>
        <input type="text" name="Quantity" required>
        <label for="ManagerID">Manager ID:</label>
        <input type="text" name="ManagerID" required>

        <input type="submit" value="Update Record">
    </form>
</body>
</html>
