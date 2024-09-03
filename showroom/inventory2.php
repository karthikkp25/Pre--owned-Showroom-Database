<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vehicle Inventory</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff; /* Light Skyblue Background */
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    header {
        background-color: #87ceeb; /* Skyblue Header Background */
        padding: 10px;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    h1 {
        color: #333; /* Dark Gray Text Color */
    }

    nav {
        display: flex;
        gap: 15px;
    }

    nav a {
        padding: 8px 16px;
        background-color: #87ceeb; /* Skyblue Button Background */
        color: white;
        text-decoration: none;
        border-radius: 4px;
    }

    nav a:hover {
        background-color: #4682b4; /* Darker Skyblue Button Background on Hover */
    }

    table {
        width: 80%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: white;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #87ceeb; /* Skyblue Header Background */
        color: white;
    }

    input[type="text"] {
        padding: 8px;
        margin-right: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        padding: 8px 16px;
        background-color: #87ceeb; /* Skyblue Button Background */
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #4682b4; /* Darker Skyblue Button Background on Hover */
    }
</style>
</head>
<body>
    <header>
        <h1>Vehicle Inventory</h1>
        <nav>
            <a href="menu2.php">MENU</a>
        </nav>
    </header>

    <div>
        <input type="text" id="vehicleSearchInput" placeholder="Search by Model">
        <button onclick="searchVehicle()">Search</button>
    </div>

    <?php
    include("database.php");

    $sql = "SELECT * FROM VehicleInventory";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Vehicle ID</th>
                    <th>Type</th>
                    <th>Model</th>
                    <th>Brand</th>
                    <th>Year</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["Vehicle_ID"]."</td>
                    <td>".$row["Type"]."</td>
                    <td>".$row["Model"]."</td>
                    <td>".$row["Brand"]."</td>
                    <td>".$row["Year"]."</td>
                    <td>".$row["Price"]."</td>
                    <td>".$row["Quantity"]."</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>

    <script>
        function searchVehicle() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("vehicleSearchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function insertVehicle() {
            // Redirect to the insert page
            window.location.href = "insert_vehicle.php";
        }
    </script>
</body>
</html>