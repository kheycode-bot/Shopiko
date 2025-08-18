<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Shopiko | Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&family=Playfair+Display:wght@700&display=swap">
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

        .registration-container {
            display: flex;
            max-width: 1000px;
            width: 90%;
            background: #ffffff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .registration-image {
            background-color: #c9af98;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .registration-image img {
            max-width: 80%;
            height: auto;
        }

        .registration-form {
            flex: 1;
            padding: 30px 25px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .registration-form .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .registration-form .logo img {
            width: 90px;
        }

        .registration-form h2 {
            font-size: 22px;
            font-weight: 500;
            margin-bottom: 10px;
            color: #3a4660;
            text-align: center;
        }

        .registration-form h2 span {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 700;
            color: #ed8a63;
        }

        .registration-form .form-group {
            margin-bottom: 15px;
        }

        .registration-form .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #cccccc;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.3s;
        }

        .registration-form .form-group input:focus {
            border-color: #ed8a63;
        }

        .registration-form button {
            background-color: #ed8a63;
            color: #ffffff;
            border: none;
            padding: 10px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            width: 100%;
            font-weight: 500;
        }

        .registration-form button:hover {
            background-color: #d87756;
            transform: scale(1.03);
        }

        .registration-form .text-muted {
            text-align: center;
            margin-top: 12px;
            font-size: 13px;
        }

        .registration-form .text-muted a {
            color: #845007;
            text-decoration: none;
            font-weight: 500;
        }

        .registration-form .text-muted a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="registration-container">
        <!-- Left side with image -->
        <div class="registration-image">
            <img src="user/assets/imgs/login.png" alt="Register Illustration">
        </div>

        <!-- Right side with form -->
        <div class="registration-form">
            <div class="logo">
                <img src="user/assets/imgs/logo/logo.png" alt="Shopiko Logo">
            </div>
            <h2>Create an <span>Account</span></h2>
            <form method="post" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
                    @error('name')
                    <span style="color:red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    @error('email')
                    <span style="color:red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="number" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required>
                    @error('phone')
                    <span style="color:red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="address" placeholder="Address" value="{{ old('address') }}" required>
                    @error('address')
                    <span style="color:red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                    @error('password')
                    <span style="color:red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
                <button type="submit">Submit &amp; Register</button>
            </form>
            <div class="text-muted">
                Already have an account? <a href="{{ route('login') }}">Sign in now</a>
            </div>
        </div>
    </div>
</body>

</html>
