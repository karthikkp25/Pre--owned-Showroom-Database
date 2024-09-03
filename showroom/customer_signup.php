<?php
session_start();
include("database.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $email = $_POST['Email'];
    $full_name = $_POST['FullName'];
    $phone_number = $_POST['PhoneNumber'];

    if (!empty($username) && !empty($password)) {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert query
        $query = "INSERT INTO Customer (Username, Password, Email, Full_Name, Phone_Number) 
                  VALUES ('$username', '$hashed_password', '$email', '$full_name', '$phone_number')";
        mysqli_query($conn, $query);

        header("location: customer_login.php");  // Redirect to the login page after signup
        die;
    } else {
        echo "<script type='text/javascript'>alert('Please enter valid input')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Signup Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
        background-color: #f0f8ff; /* Light sky blue background */
        font-family: Arial, sans-serif;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff; /* White background for the form */
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow for a subtle effect */
    }

    h1 {
        color: #333333; /* Dark gray header text */
    }

    label {
        display: block;
        margin: 10px 0;
        color: #555555; /* Medium gray label text */
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #cccccc; /* Light gray border */
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4caf50; /* Green submit button */
        color: #ffffff; /* White text on the button */
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049; /* Darker green on hover */
    }

    p {
        margin-top: 15px;
        color: #555555;
    }

    a {
        color: #3498db; /* Blue link color */
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
<body>
    <form method="post">
        <h1><center>Customer Sign Up</center></h1>
        <label for="Username">Username:</label>
        <input type="text" id="Username" name="Username" required><br>

        <label for="Password">Password:</label>
        <input type="password" id="Password" name="Password" required><br>

        <label for="Email">Email:</label>
        <input type="email" id="Email" name="Email" required><br>

        <label for="FullName">Full Name:</label>
        <input type="text" id="FullName" name="FullName" required><br>

        <label for="PhoneNumber">Phone Number:</label>
        <input type="tel" id="PhoneNumber" name="PhoneNumber" required><br>

        <input type="submit" value="Submit">

        <p>Already have an account? <a href="customer_login.php">Login here</a></p>
    </form>
</body>
</html>
