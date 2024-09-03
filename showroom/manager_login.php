<?php
session_start();
include("database.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to check if the credentials are valid
    $query = "SELECT * FROM Manager WHERE Username = '$username' AND Password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // User authenticated successfully, set manager_id session variable
        $_SESSION['manager_id'] = $manager_id;

        // Redirect to home page or any other desired page
        header("Location: menu.php");
        exit;
    } else {
        // Authentication failed, display error message
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Manager Login</title>
  <style>
    :root {
      --main-bg-color: #f4f9f5; /* Light green mixed with white */
      --header-bg-color: #87ceeb; /* Light sky blue */
      --input-label-color: #87ceeb; /* Light sky blue */
      --input-border-color: #b0e0e6; /* Light steel blue */
      --btn-bg-color: #87ceeb; /* Light sky blue */
      --btn-hover-bg-color: #6a5acd; /* Slate blue */
      --link-color: #87ceeb; /* Light sky blue */
      --link-hover-color: #6a5acd; /* Slate blue */
    }

    body {
      font-family: Arial, sans-serif;
      background-color: var(--main-bg-color);
      margin: 0;
      padding: 0;
    }

    .header {
      background-color: var(--header-bg-color);
      color: white;
      padding: 20px;
      text-align: center;
    }

    form {
      background-color: #ffffff; /* White */
      padding: 20px;
      max-width: 300px;
      margin: 20px auto;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form h1 {
      text-align: center;
    }

    .input-group {
      margin-bottom: 15px;
    }

    .input-group label {
      display: block;
      margin-bottom: 5px;
      color: var(--input-label-color);
    }

    .input-group input {
      width: calc(100% - 22px); /* Adjusted width */
      padding: 10px;
      border: 1px solid var(--input-border-color);
      border-radius: 5px;
    }

    .btn {
      background-color: var(--btn-bg-color);
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      display: block;
      margin: 0 auto;
    }

    .btn:hover {
      background-color: var(--btn-hover-bg-color);
    }

    p {
      text-align: center;
      margin-top: 20px;
    }

    p a {
      color: var(--link-color);
    }

    p a:hover {
      color: var(--link-hover-color);
    }
  </style>
</head>
<body>
  <div class="header">
    <h2>Manager Login</h2>
  </div>
  <form method="post">
    <h1>Login</h1>
    <div class="input-group">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
    </div>
    <div class="input-group">
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
    </div>
    <input type="submit" value="Login" class="btn">
  </form>
</body>
</html>
