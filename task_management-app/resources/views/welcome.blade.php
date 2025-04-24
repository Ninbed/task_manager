<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager - Welcome</title>
    <style>
        /* General Page Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('https://source.unsplash.com/1600x900/?productivity,office') no-repeat center center/cover;
            text-align: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* Dark Overlay for Better Readability */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        /* Navigation Bar */
        .navbar {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            padding: 20px 40px;
            position: absolute;
            top: 0;
            z-index: 2;
        }

        .nav-buttons {
            display: flex;
            gap: 15px;
        }

        .nav-buttons a {
            text-decoration: none;
            padding: 12px 20px;
            color: white;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s ease;
        }

        .login-btn {
            background-color: #007bff;
        }

        .signup-btn {
            background-color: #28a745;
        }

        .nav-buttons a:hover {
            opacity: 0.8;
            transform: scale(1.05);
        }

        /* Welcome Message */
        .welcome-container {
            position: relative;
            z-index: 2;
            color: white;
            text-align: center;
            animation: fadeIn 1.5s ease-in-out;
        }

        .welcome-container h1 {
            font-size: 50px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .welcome-container p {
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
</head>
<body>

    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Navigation Bar -->
    <div class="navbar">
        <div class="nav-buttons">
            <a href="{{ route('login') }}"class="login-btn">Log In</a>
            <a href="{{ route('register') }}"class="signup-btn">Create Account</a>
        </div>
    </div>

    <!-- Welcome Message -->
    <div class="welcome-container">
        <h1>Welcome to Task Manager</h1>
        <p>Here you get to work and complete under desired time.</p>
    </div>

</body>
</html>
