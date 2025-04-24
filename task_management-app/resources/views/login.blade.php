<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Manager - Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #E6EEFF;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            display: flex;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 800px;
        }
        .image-section {
            background: white;
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding:20px;
        }
        .form-section {
            width: 50%;
            padding: 40px;
        }
        .form-section h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .header {
            position: absolute;
            top: 10px;
            left: 20px;
            font-size: 30px;
            font-weight: bold;
        }
        .btn-primary {
            width: 100%;
            background-color: #007BFF;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="image-section">
            <img src="{{ asset('images/task.jpeg') }}" alt="Login Image" width="400">
        </div>
        <div class="form-section">
            <div class="header">Welcome to Task Manager</div>
            <h2>Sign In</h2>
            <p class="text-center">Keep track of your task.</p>
            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                </div>
                <div class="mb-3">
                    <div class="d-grid">
                        <button class="btn btn-primary">Log In</button>
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('register') }}">Create an account</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>