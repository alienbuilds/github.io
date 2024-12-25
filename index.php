<?php

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') 

{

    $email = $_POST['email'];
    $password = $_POST['password'];


    if ( empty($email) ||empty($password)) 
    {
        echo "<script>
        alert('No Empty Fields Allowed !');
        </script>";
    }
    else
    {

        $sql = "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";

        $result = mysqli_query($conn, $sql); 
    
        if (!mysqli_num_rows($result)) 
    
        {
    
            header("Location: registrationFailed.php");
    
            exit();
    
        } 
    
        else 
    
        {
            session_start();
            $_SESSION['email'] = $email;  

            echo "<script>    
                alert('Login Successful!');
                </script>";

            header('location:customerHome.php');
            exit();
    
        }
    }


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Metro - Login</title>
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
            background: url('Pictures/BGI.jpg') no-repeat center center/cover;
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            min-height: 100vh;  /* Ensure body takes full height */
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

            width: 140px;
            opacity: 0.7;
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

            .card {
                max-width: 90%; /* Adjust card width on smaller screens */
            }

            .form-control {
                padding: 12px; /* Adjust input padding for smaller screens */
            }

            .btn-custom {
                padding: 10px 15px;
                font-size: 16px;
            }

            .social-icons a {
                font-size: 20px;
            }
        }

        @media (max-width: 576px) {
            .navbar {
                padding: 10px;
            }

            .card {
                max-width: 100%; /* Full-width card on very small screens */
                margin-top: 20px;
            }

            .card-body {
                padding: 30px; /* Reduce padding on smaller screens */
            }

            .form-control {
                padding: 10px; /* Further reduce padding for inputs */
            }

            .btn-custom {
                padding: 8px 12px;
                font-size: 14px;
            }

            .social-icons a {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>

    <script>
        function validateEmail() {
        var email = document.getElementById("email").value;
        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (!emailRegex.test(email)) {
            document.getElementById("emailerr").innerText = "Invalid email format.";
        } else {
            document.getElementById("emailerr").innerText = "";
        }
    }

    function validatePassword() {
        var password = document.getElementById("password").value;
        var passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        if (!passwordRegex.test(password)) {
            document.getElementById("passerr").innerText = 
                "Password must be at least 8 characters long, include 1 uppercase letter, 1 number, and 1 special character.";
        } else {
            document.getElementById("passerr").innerText = "";
        }
    }
    </script>


    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="Pictures/logo.png" alt="Logo">
                Surat Metro - Customer Login
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Customer Login</h5>
                        <form method="POST">
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" oninput="validateEmail()">
                                <span id="emailerr" style="color:red"></span>

                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" oninput="validatePassword()">
                                <span id="passerr" style="color:red"></span>
                            </div>
                            <!-- Remember Me -->
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember Me</label>
                            </div>
                            <!-- Submit Button -->
                            <button type="submit" class="btn-custom">Login</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="customerRegister.php">Get Registered</a>
                        </div>
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
