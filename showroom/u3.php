<?php
include("database.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $bookingID = $_POST["BookingID"];
    $vehicleID = $_POST["VehicleID"];
    $customerID = $_POST["CustomerID"];
    $bookingDate = $_POST["BookingDate"];

    // Update query
    $sql = "UPDATE VehicleBooking SET Vehicle_ID = $vehicleID, Customer_ID = $customerID, Booking_Date = '$bookingDate' WHERE Booking_ID = $bookingID";

    // Execute the query
    try{
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    }} catch(mysqli_sql_exception) {
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
<title>Update Vehicle Booking Record</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #87CEFA; /* Light Sky Blue Background */
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
        background-color: #4682B4; /* Dark Sky Blue Button Background */
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #4169E1; /* Slightly Darker Sky Blue Button Background on Hover */
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
    <a href="booking_details.php" class="redirect-button">Back to Booking details</a>

    <h2>Update Vehicle Booking Record</h2>
    
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="BookingID">Booking ID:</label>
        <input type="text" name="BookingID" required>
        <label for="VehicleID">Vehicle ID:</label>
        <input type="text" name="VehicleID" required>
        <label for="CustomerID">Customer ID:</label>
        <input type="text" name="CustomerID" required>
        <label for="BookingDate">Booking Date:</label>
        <input type="date" name="BookingDate" required>

        <input type="submit" value="Update Record">
    </form>
</body>
</html>