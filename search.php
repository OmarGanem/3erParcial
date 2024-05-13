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
            <div class="mb-3">
                <label for="searchType" class="form-label">Search Type:</label>
                <select class="form-control" id="searchType" name="searchType">
                    <option value="patient">Patient</option>
                    <option value="doctor">Doctor</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "medicalrecords";
    $link = mysqli_connect($host, $user, $password, $db) or die("Error connecting to the database: " . mysqli_connect_error());

    // Check if both 'searchQuery' and 'searchType' are set
    if (isset($_POST['searchQuery']) && isset($_POST['searchType'])) {
        $searchQuery = mysqli_real_escape_string($link, $_POST['searchQuery']);
        $searchType = $_POST['searchType'];

        // Determine the query based on the search type
        if ($searchType == "patient") {
            $query = "SELECT * FROM patients WHERE PatientName LIKE CONCAT('%', ?, '%') OR PatientLastName LIKE CONCAT('%', ?, '%')";
        } elseif ($searchType == "doctor") {
            $query = "SELECT * FROM doctors WHERE DoctorName LIKE CONCAT('%', ?, '%') OR DoctorLastName LIKE CONCAT('%', ?, '%')";
        }
        
        if (!empty($query)) {
            $stmt = mysqli_prepare($link, $query);
            // Bind the $searchQuery variable twice, once for each placeholder
            mysqli_stmt_bind_param($stmt, "ss", $searchQuery, $searchQuery);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        
            if (mysqli_num_rows($result) > 0) {
                echo '<div class="mt-4"><h4>Search Results:</h4><ul class="list-group">';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<li class="list-group-item">' . htmlspecialchars($row['DoctorName'] ?? $row['PatientName']) . ' ' . htmlspecialchars($row['DoctorLastName'] ?? $row['PatientLastName']) . '</li>';
                }
                echo '</ul></div>';
            } else {
                echo '<div class="alert alert-info mt-3">No results found.</div>';
            }
        
            mysqli_stmt_close($stmt);
        } else {
            echo '<div class="alert alert-warning mt-3">Please select a valid search type.</div>';
        }
    }
    mysqli_close($link);
}
?>
    </div>
</body>
</html>
