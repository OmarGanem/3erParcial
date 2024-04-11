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
    </style>
    <title>Register Doctor - Hospital Madero</title>
 </head>
 <body>
 <header>
        <h1>Register Doctor</h1>
    </header>
    <div class="container">
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
                <input type="submit" value="Register">
            </div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo '<div class="alert">Doctor registered successfully!</div>';
                }
            ?>
        </form>
    </div>
    <footer>
        <p>&copy; 2024 Hospital Madero</p>
    </footer>
 </body>
 </html>