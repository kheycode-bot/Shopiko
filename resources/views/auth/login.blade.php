<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Shopiko | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@700&display=swap">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #3a4660, #c9af98);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            display: flex;
            max-width: 1000px;
            width: 90%;
            background: #ffffff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .login-image {
            background-color: #c9af98; /* Comfortably Tan */
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-image img {
            max-width: 90%;
            height: auto;
        }

        .login-form {
            flex: 1;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .login-form .logo {
            text-align: center;
            margin-bottom: 2px; 
        }

        .login-form .logo img {
            width: 100px;
        }

        .login-form h2 {
            font-size: 24px;
            font-weight: 400;
            margin-top: -20px;
            margin-bottom: 5px;
            color: #3a4660; 
            text-align: center;
        }

        .login-form h2 span {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            color: #ed8a63; 
        }

        .login-form .form-group {
            margin-bottom: 15px;
        }

        .login-form .form-group input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #cccccc;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.3s;
        }

        .login-form .form-group input:focus {
            border-color: #ed8a63; 
        }

        .login-form .forgot-password {
            text-align: right;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .login-form .forgot-password a {
            color: #845007; 
            text-decoration: none;
        }

        .login-form .forgot-password a:hover {
            text-decoration: underline;
        }

        .login-form button {
            background-color: #ed8a63; 
            color: #ffffff;
            border: none;
            padding: 12px;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            width: 100%;
        }

        .login-form button:hover {
            background-color: #d87756; 
            transform: scale(1.03);
        }

        .login-form .create-account {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .login-form .create-account a {
            color: #845007; 
            text-decoration: none;
            font-weight: 500;
        }

        .login-form .create-account a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-image">
            <img src="user/assets/imgs/login.png" alt="Login Illustration">
        </div>

        <div class="login-form">
            <div class="logo">
                <img src="user/assets/imgs/logo/logo.png" alt="Shopiko Logo">
            </div>
            <h2>Welcome to <span>SHOPIKO</span></h2>
            <form method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="forgot-password">
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                </div>
                <button type="submit">Sign in</button>
            </form>
            <div class="create-account">
                New to Shopiko? <a href="{{ route('register') }}">Create Account</a>
            </div>
        </div>
    </div>
</body>

</html>
