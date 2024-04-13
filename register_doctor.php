 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 15px;
            padding: 0;
            color: #333;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        .container {
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type=text], input[type=date] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type=submit] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #0056b3;
        }
        button{
            background-color: #007bff; 
            color: white; 
            padding: 10px 20px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer;"
        }
    </style>
    <title>Register Doctor - Hospital Madero</title>
    <link rel="stylesheet"href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
 </head>
 <body>
 <header>
        <h1>Register Doctor</h1>
    </header>
    <nav>
        <a href="Index.php">Home</a>
        <a href="register_patient.php">Register Patient</a>
        <a href="register_doctor.php">Register Doctor</a>
        <a href="search.php">Search</a>
    </nav>
    <div class="hero">
        <h1>Welcome to Hospital Madero</h1>
            </div>
            <div class="container">
            <div class="form-group">
                <label for="doctor-id">Doctor Id:</label>
                <input type="text" id="doctor-id" name="doctor_id">
            </div>
                <form action="#" method="post">
                <div class="form-group">
                <label for="doctor-name">Doctor Name:</label>
                <input type="text" id="doctor-name" name="doctor_name">
            </div>
            <div class="form-group">
                <label for="doctor-dob">Date of Birth:</label>
                <input type="date" id="doctor-dob" name="doctor_dob">
            </div>
            <div class="form-group">
                <label for="doctor-phone">Phone Number:</label>
                <input type="text" id="doctor-phone" name="doctor_phone">
            </div>
            <div class="form-group">
                <label for="assigned-patient">Assigned patient:</label>
                <input type="text" id="assigned-patient" name="assigned_patient">
            </div>
            <div class="form-group">
                <label for="doctor-address">Address: </Address></label>
                <input type="text" id="doctor-address" name="doctor_address">
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo '<div class="alert">Patient registered successfully!</div>';
                }
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "hospitaldb";
            //create connection
            $connection = new mysqli($servername, $username, $password, $database);
            //read all rows from database table
            $sql = "SELECT * FROM Patients";
            $result = $connection->query($sql);
            if ($result) {
                die("invalid query: " . $connection->error);
            }

            if ($connection->connect_error) {
                die("". $connection->connect_error);
            }
            //read data of each row
            while ($row = $result->fetch_assoc()) {
                echo"
                <tr>
                <td>$row[doctor_Id]</td>
                <td>$row[doctor_name]</td>
                <td>$row[doctor_dob]</td>
                <td>$row[doctor_phone]</td>
                <td>$row[assigned_patient]</td>
                <td>$row[doctor_addres]</td>
                <td>
                    <a class='btn btn-danger btn-sm'href='/3erParcial/delete.php'id=$row[id]>Delete</a>
                </td>
            </tr>
                ";
            }
            ?>
        </form>
    </div>
    <footer>
        <p>&copy; 2024 Hospital Madero</p>
    </footer>
 </body>
 </html>