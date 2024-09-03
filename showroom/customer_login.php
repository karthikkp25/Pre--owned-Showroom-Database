<?php
session_start();
include("database.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to check if the credentials are valid
    $query = "SELECT * FROM Customer WHERE Username = '$username' AND Password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // User authenticated successfully, set username session variable
        $_SESSION['username'] = $username;

        // Redirect to home page or any other desired page
        header("Location: menu2.php");
        exit;
    } else {
        // Authentication failed, display error message
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
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
        background-color: #87cefa; /* Light sky blue submit button */
        color: #ffffff; /* White text on the button */
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #77b5d0; /* Darker blue on hover */
    }

    p {
        margin-top: 15px;
        color: #555555;
    }

    a {
        color: #e74c3c; /* Red link color */
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

</style>
<body>
    <form method="post">
        <h1><center>Login</center></h1>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
        <p>Don't have an account? <a href="customer_signup.php">SignUp here</a></p>
    </form>
</body>
</html>
