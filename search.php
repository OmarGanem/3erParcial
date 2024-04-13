<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search - Hospital Madero</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="register_patient.php">Register Patient</a>
        <a href="register_doctor.php">Register Doctor</a>
        <a href="search.php">Search</a>
    </nav>
    <div class="container">
        <h2>Search for a Patient or Doctor</h2>
        <form action="search.php" method="post">
            <div class="mb-3">
                <label for="searchQuery" class="form-label">Enter Name:</label>
                <input type="text" class="form-control" id="searchQuery" name="searchQuery" required>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchQuery'])) {
            $searchQuery = htmlspecialchars($_POST['searchQuery']); // Sanitize the user input to avoid SQL injection

            // Database connection parameters
            $servername = "localhost";
            $username = "oganem";
            $password = "";
            $database = "hospitaldb";

            // Create connection
            $connection = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            // Prepare a SELECT statement to prevent SQL injection
            $stmt = $connection->prepare("SELECT Patient_Id, Patient_name, Date_of_birth, phone, Symptoms, Assigned_doctor FROM Patients WHERE Patient_name LIKE CONCAT('%', ?, '%')");
            $stmt->bind_param("s", $searchQuery);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                // Fetch the results
                echo '<div class="mt-4"><h4>Search Results:</h4><ul class="list-group">';
                while($row = $result->fetch_assoc()) {
                    echo '<li class="list-group-item">' . htmlspecialchars($row['Patient_name']) . ' - ' . htmlspecialchars($row['phone']) . '</li>';
                }
                echo '</ul></div>';
            } else {
                echo '<div class="alert alert-info mt-3">No results found.</div>';
            }

            $stmt->close();
            $connection->close();
        }
        ?>
    </div>
</body>
</html>
