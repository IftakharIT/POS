<!-- 在Blade模板中引入logo和登录/注册按钮 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Up</title>
    <link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @keyframes zoomInOut {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        .logo {
            animation: borderColorChange 2s infinite, zoomInOut 2s infinite;
        }
    </style>
</head>
<body>
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">

        <img width="150" height="150" src="{{ asset('assets/images/MoneyUpblack.png') }}" alt="Logo" class="logo mb-4">
        
        <div class="d-flex">
            <a href="{{ route('login') }}" class="btn btn-primary mx-2">Log In</a>
            <a href="{{ route('register') }}" class="btn btn-primary mx-2">Register</a>
        </div>
    </div>
</body>
</html>
