<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Mifta Motor Sport</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
</head>
<body>
    <a href="/" class="chevron-back">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 19L8 12L15 5" stroke="#FE8400" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </a>
    <div class="signup-container">
        <div class="signup-form-section">
            <h2>Create Your Account</h2>
            <p>Create your profile and explore all that Mifta Motor Sport has to offer.</p>
            <form class="signup-form" action="/register" method="POST" >
                @csrf
                <div style="display: flex; gap: 1.1875rem; width: 25.0625rem;">
                    <div>
                        <label for="name">Name</label>
                        <div class="input-wrapper input-short">
                            <input name="name" type="text" id="name" name="name" class="input-underline" placeholder="Name" required style="width:11.875rem;height:4.375rem;">
                        </div>
                    </div>
                    <div>
                        <label for="phone">Phone Number</label>
                        <div class="input-wrapper input-short">
                            <input name="phone" type="text" id="phone" name="phone" class="input-underline" placeholder="Phone Number" required style="width:11.875rem;height:4.375rem;">
                        </div>
                    </div>
                </div>
                <div>
                    <label for="username">Username</label>
                    <div class="input-wrapper">
                        <input name="username" type="text" id="username" name="username" class="input-underline" placeholder="Type your username here" required>
                    </div>
                </div>
                <div>
                    <label for="password">Enter your Password</label>
                    <input name="password" type="password" id="password" name="password" placeholder="Type your password here" required>
                </div>
                <button type="submit" class="signup-btn">Sign Up</button>
                <p class="register-link">Already have an account? <a href="/login" class="login-link">Log in here!</a></p>
            </form>
        </div>
        <div class="signup-image-section">
            <img src="{{ asset('images/tampilan1.png') }}" alt="Tampilan 1" class="signup-image" />
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
        function handleSignup(event) {
            event.preventDefault();
            
            // Get form data
            const formData = new FormData(event.target);
            const name = formData.get('name');
            const phone = formData.get('phone');
            const username = formData.get('username');
            const password = formData.get('password');
            
            // Simple validation
            if (!name || !phone || !username || !password) {
                alert('Please fill in all fields');
                return;
            }
            
            // Show success message (since we're not implementing backend yet)
            alert('Registration successful! You can now login with your credentials.');
            
            // Redirect to login page
            window.location.href = '/login';
        }
    </script>
</body>
</html> 