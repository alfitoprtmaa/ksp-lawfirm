<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sign In</title>
    <!-- Menghubungkan Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Menghubungkan file CSS murni -->
    <link rel="stylesheet" href="{{ asset('css/customer/login/signin.css') }}">
</head>
<body>

    <div class="split-layout">
        
        <!-- Sisi Kiri: Form Login -->
        <div class="left-panel">
            <div class="form-wrapper">
                
                <!-- Konten Atas ke Tengah -->
                <div class="form-main-content">
                    <!-- Logo -->
                    <div class="logo">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2L12 6M12 18L12 22M4.9282 4.9282L7.75664 7.75664M16.2434 16.2434L19.0718 19.0718M2 12L6 12M18 12L22 12M4.9282 19.0718L7.75664 16.2434M16.2434 7.75664L19.0718 4.9282M12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>

                    <!-- Header -->
                    <div class="header-text">
                        <h1>Welcome Back!</h1>
                        <p>Sign in to continue where you left off.</p>
                    </div>

                    <!-- Login Sosial -->
                    <div class="social-login">
                        <a href="#" class="social-btn">
                            <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google">
                            Continue with Google
                        </a>
                        <a href="#" class="social-btn">
                            <i class="fa-brands fa-apple"></i>
                            Continue with Apple
                        </a>
                    </div>

                    <!-- Garis Pemisah -->
                    <div class="divider">OR</div>

                    <!-- Form Input -->
                    <form action="#" method="POST">
                        
                        <div class="input-group">
                            <label for="email">Email address</label>
                            <input type="email" id="email" name="email" placeholder="Example@gmail.com">
                        </div>

                        <div class="input-group">
                            <div class="label-row">
                                <label for="password">Password</label>
                                <a href="#" class="forgot-link">Forgot Password?</a>
                            </div>
                            <div class="input-wrapper">
                                <input type="password" id="password" name="password" placeholder="Enter your password">
                                <button type="button" class="eye-icon">
                                    <i class="fa-regular fa-eye-slash"></i>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="submit-btn">Log in</button>
                    </form>

                    <p class="signup-text">
                        Don't have account yet? <a href="{{ route('customer.login.signup') }}">Sign up</a>
                    </p>
                </div>

                <!-- Syarat & Ketentuan di bagian bawah -->
                <div class="terms-text">
                    By continuing you agree to our <a href="#">Terms & Conditions</a> and acknowledge our <a href="#">Privacy Policy.</a>
                </div>

            </div>
        </div>

        <!-- Sisi Kanan: Gambar -->
        <div class="right-panel">
            <div class="image-container">
                <div class="image-overlay"></div>
                
                <div class="image-content">
                    <div class="slider-indicators">
                        <div class="indicator active"></div>
                        <div class="indicator"></div>
                        <div class="indicator"></div>
                        <div class="indicator"></div>
                    </div>
                    <h2>Discover your next journey</h2>
                    <p>Explore ideas, stories, and experiences designed to inspire your everyday life, guiding you through meaningful moments and fresh insights every day.</p>
                </div>
            </div>
        </div>

    </div>

</body>
</html>