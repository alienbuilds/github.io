<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['email'])) 
{
    header('Location: index.php');
    exit(); 
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metro Management System - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            position: relative;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            display: flex;
            flex-direction: column;
        }

        body {
            background: url('Pictures/1LOGIN.png') no-repeat center center/cover;
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            min-height: 100vh;  
        }

        .navbar {
            background-color: #2c3e50;
            font-weight: bold;
            padding-top: 15px 0;
            display: flex;
            justify-content: left;
            align-items: center;
            height: 100px;
        }

        .navbar .container {
            padding: 0;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            font-weight: 600;
            font-size: 25px;
            color: #ecf0f1;
        }

        .navbar-brand img {

            width: 80px;
            height: auto;
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            color: #ecf0f1 !important;
            font-size: 18px;
        }

        .navbar-nav .nav-link:hover {
            color: #f39c12 !important;
        }

        .container {
            margin-top: 60px;
            z-index: 10;
            margin-bottom: 60px;
            flex-grow: 1;  /* Ensures content grows to fill available space */
        }

        .card {
            border-radius: 12px;
            box-shadow: 0px 4px 30px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            margin-bottom: 30px;
            max-width: 400px;
            margin: 0 auto;
        }

        .card-body {
            background-color: rgba(255, 255, 255, 0.9);
            color: #333;
            padding: 40px;
        }

        .card-title {
            font-size: 24px;
            font-weight: 700;
            color: #34495e;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #bdc3c7;
        }

        .form-control:focus {
            border-color: #1abc9c;
            box-shadow: 0 0 5px rgba(26, 188, 156, 0.5);
        }

        .btn-custom {
            background-color: #1abc9c;
            color: white;
            border-radius: 5px;
            font-weight: 800;
            padding: 12px 20px;
            text-align: center;
            width: 100%;
            border: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-custom:hover {
            background-color: #16a085;
            transform: scale(1.05);
        }

        .footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 20px 0;
            width: 100%;
            position: relative;
            bottom: 0;
            padding-top: 30px;
            margin-top: auto;  /* Pushes footer to the bottom */
        }

        .footer p {
            margin: 0;
        }

        .social-icons a {
            color: #fff;
            margin: 0 10px;
            font-size: 24px;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: #f39c12;
        }

        /* Media Queries for responsive design */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 24px;
            }

            .card 
            {
                max-width: 90%; 
            }

            .form-control 
            {
                padding: 12px; 
            }

            .btn-custom 
            {
                padding: 10px 15px;
                font-size: 16px;
            }

            .social-icons a 
            {
                font-size: 20px;
            }
        }

        @media (max-width: 576px) 
        {
            .navbar 
            {
                padding: 10px;
            }

            .card 
            {
                max-width: 100%; /* Full-width card on very small screens */
                margin-top: 20px;
            }

            .card-body 
            {
                padding: 30px; 
            }

            .form-control 
            {
                padding: 10px; 
            }

            .btn-custom 
            {
                padding: 8px 12px;
                font-size: 14px;
            }

            .social-icons a 
            {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="customerHome.php">
                <img src="Pictures/profile.png" alt="Logo">
                Customer Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="customerHome.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="customerBookings.php">My Bookings</a></li>
                    <li class="nav-item"><a class="nav-link" href="trainSchedule.php">Train Schedules</a></li>
                    <li class="nav-item"><a class="nav-link" href="customerProfile.php">Account</a></li>
                    <a class="nav-link" href="logout.php" onclick="alert('Logged Out!');">Logout</a>
                    </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Book Your Ticket</h5>
                        <p class="card-text">Plan your trip with ease. Choose stations and train schedules to book your tickets.</p>
                        <a href="bookTickets.php" class="btn-custom"><i class="fas fa-ticket-alt"></i> Book Now</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">View Train Schedules</h5>
                        <p class="card-text">Check the latest train timings and station stops to plan your journey.</p>
                        <a href="trainSchedules.php" class="btn-custom"><i class="fas fa-calendar-alt"></i> View Schedules</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Account</h5>
                        <p class="card-text">Manage your account information, view your previous bookings, and more.</p>
                        <a href="customerProfile.php" class="btn-custom"><i class="fas fa-user"></i> My Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>Copyright &copy; 2024 Made With &hearts; By SuratMetroHub Team </p>
        <div class="social-icons">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
