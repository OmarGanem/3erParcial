<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Madero - Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            padding: 20px;
        }
        .hero {
            background: url('https://imgs.search.brave.com/_fl0CxBEtraXUkhF-9s1fwALJz-QFVqFsjng79ldNI0/rs:fit:860:0:0/g:ce/aHR0cHM6Ly91cGxv/YWQud2lraW1lZGlh/Lm9yZy93aWtpcGVk/aWEvY29tbW9ucy83/Lzc3L1Zpc3RhX0xh/dGVyYWxfZGVfbGFf/VW5pdmVyc2lkYWRf/TWFkZXJvLmpwZw') no-repeat center center;
            background-size: cover;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero h1 {
            color: #A60D1A;
            font-size: 48px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }
        nav {
            display: flex;
            justify-content: center;
            background-color: white;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        nav a, nav .btn {
            text-decoration: none;
            margin: 0 10px;
            padding: 8px 16px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        nav a:hover, nav .btn:hover {
            background-color: #0056b3;
            text-decoration: none;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px 0;
            position: relative;
            width: 100%;
            bottom: 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Hospital Madero</h1>
    </header>
    <nav>
        <a href="index.php">Home</a>
        <a href="register_patient.php">Register Patient</a>
        <a href="register_doctor.php">Register Doctor</a>
        <a href="search.php">Search</a>
        <a href="manage_patients.php" class="btn">Manage Patients</a>
        <a href="manage_doctors.php" class="btn">Manage Doctors</a>
        <a href="manage_appointments.php" class="btn">Manage Appointments</a>
        <a href="manage_labreports.php" class="btn">Manage Lab Reports</a>
    </nav>
    <div class="hero">
        <h1>Welcome to Hospital Madero</h1>
    </div>
    <div class="content">
        <h2>About Us</h2>
        <p>Welcome to Hospital Madero, where we care about your health and provide top-notch medical services.</p>
    </div>
    <footer>
        <p>&copy; 2024 Hospital Madero</p>
    </footer>
</body>
</html>
