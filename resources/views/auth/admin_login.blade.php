<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #3a4660, #c9af98); /* Gradient background */
            font-family: 'Spartan', sans-serif;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-card {
            background: #fff;
            padding: 30px;
            border-radius: 30px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .login-card h2 {
            font-size: 28px;
            color: #3a4660; /* Theme primary color */
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .login-card .form-group label {
            font-weight: 600;
            color: #3a4660; /* Text color */
            font-size: 14px;
        }

        .login-card .form-control {
            border-radius: 15px;
            height: 45px;
            font-size: 14px;
            border: 1px solid #c9af98; /* Border matching theme */
        }

        .login-card button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #845007; /* Button background */
            border: none;
            border-radius: 20px;
            color: white;
            transition: background-color 0.3s ease;
        }

        .login-card button:hover {
            background-color: #3a4660; /* Hover button color */
        }

        .login-card .form-control:focus {
            border-color: #845007; /* Focus color */
            box-shadow: 0 0 0 2px rgba(132, 80, 7, 0.2);
        }

        .forgot-password {
            margin-top: 15px;
            font-size: 14px;
            color: #845007;
            text-decoration: none;
            display: block;
            text-align: center; /* Center alignment */
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .create-account {
            margin-top: 10px;
            font-size: 14px;
            color: #3a4660;
            text-decoration: none;
        }

        .create-account:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="login-card">
            <h2>ADMIN</h2>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <button type="submit">Login</button>
                <a href="{{ route('password.request') }}" class="forgot-password">Forgot password?</a>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
