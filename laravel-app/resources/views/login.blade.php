<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mifta Motor Sport</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <a href="/" class="chevron-back">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 19L8 12L15 5" stroke="#FE8400" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </a>
    <div class="login-container">
        <div class="login-form-section">
            <h2>Login to Your Account</h2>
            <p>Enter your username and password to access your account.</p>
            <form class="login-form" onsubmit="handleLogin(event)">
                @csrf
                <div>
                    <label for="username">Username</label>
                    <div class="input-wrapper">
                        <input type="text" id="username" name="username" class="input-underline" placeholder="Type your username here" required>
                    </div>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Type your password here" required>
                </div>
                <button type="submit" class="login-btn">Log In</button>
                <p class="register-link">Don't have an account? <a href="/register" class="join-link">Join us today</a></p>
            </form>
        </div>
        <div class="login-image-section">
            <img src="{{ asset('images/tampilan1.png') }}" alt="Tampilan 1" class="login-image" />
            <svg class="ellipse-bg" width="27" height="26" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.5 0.5C20.6977 0.5 26.5 6.11406 26.5 13C26.5 19.8859 20.6977 25.5 13.5 25.5C6.30235 25.5 0.5 19.8859 0.5 13C0.5 6.11406 6.30234 0.5 13.5 0.5Z" stroke="white" stroke-opacity="0.5" stroke-width="1"/>
            </svg>
            <svg class="ellipse-bg-bottom" width="27" height="26" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.5 0.5C20.6977 0.5 26.5 6.11406 26.5 13C26.5 19.8859 20.6977 25.5 13.5 25.5C6.30235 25.5 0.5 19.8859 0.5 13C0.5 6.11406 6.30234 0.5 13.5 0.5Z" stroke="white" stroke-opacity="0.5" stroke-width="1"/>
            </svg>
            <svg class="ellipse-bg-large" width="47" height="45" viewBox="0 0 47 45" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M23.5 0.5C36.2233 0.5 46.5 10.37 46.5 22.5C46.5 34.63 36.2233 44.5 23.5 44.5C10.7767 44.5 0.5 34.63 0.5 22.5C0.5 10.37 10.7767 0.5 23.5 0.5Z" stroke="white" stroke-opacity="0.5" stroke-width="1"/>
            </svg>
        </div>
    </div>

    <script>
        function handleLogin(event) {
            event.preventDefault();
            
            // Simulate loading
            const loginBtn = document.querySelector('.login-btn');
            const originalText = loginBtn.textContent;
            loginBtn.textContent = 'Logging in...';
            loginBtn.disabled = true;
            
            // Simulate API call delay
            setTimeout(() => {
                // Redirect to customer dashboard
                window.location.href = '/customer/dashboard';
            }, 1000);
        }
    </script>
</body>
</html>
