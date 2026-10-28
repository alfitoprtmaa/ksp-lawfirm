<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sign Up</title>
    <!-- Menghubungkan Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Menghubungkan file CSS murni -->
    <link rel="stylesheet" href="{{ asset('css/customer/login/signup.css') }}">
</head>
<body>

    <div class="split-layout">
        
        <!-- Sisi Kiri: Form Sign Up -->
        <div class="left-panel">
            <div class="form-wrapper">
                
                <!-- Konten Atas ke Tengah -->
                <div class="form-main-content">
                    <!-- Logo -->
                    <div class="logo">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 16l3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/>
                            <path d="M2 16l3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/>
                            <path d="M7 21h10"/>
                            <path d="M12 3v18"/>
                            <path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/>
                        </svg>
                    </div>

                    <!-- Header -->
                    <div class="header-text">
                        <h1>Create an Account</h1>
                        <p>Join us to discover your next journey.</p>
                    </div>

                    <!-- Form Input -->
                    <form action="#" method="POST">
                        
                        <!-- Nama Lengkap -->
                        <div class="input-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap Anda">
                        </div>

                        <!-- Email -->
                        <div class="input-group">
                            <label for="email">Email address</label>
                            <input type="email" id="email" name="email" placeholder="Example@gmail.com">
                        </div>

                        <!-- Nomor Handphone -->
                        <div class="input-group">
                            <label for="no_hp">Nomor Handphone</label>
                            <input type="tel" id="no_hp" name="no_hp" placeholder="08xxxxxxxxxx">
                        </div>

                        <!-- Alamat -->
                        <div class="input-group">
                            <label for="alamat">Alamat</label>
                            <textarea id="alamat" name="alamat" rows="2" placeholder="Masukkan alamat lengkap Anda"></textarea>
                        </div>

                        <!-- Password -->
                        <div class="input-group">
                            <label for="password">Password</label>
                            <div class="input-wrapper">
                                <input type="password" id="password" name="password" placeholder="Buat password">
                                <button type="button" class="eye-icon">
                                    <i class="fa-regular fa-eye-slash"></i>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="submit-btn">Sign up</button>
                    </form>

                    <!-- Link Login -->
                    <p class="signup-text">
                        Already have an account? <a href="{{ route('customer.login.signin') }}">Sign in</a>
                    </p>
                </div>

                <!-- Syarat & Ketentuan di bagian bawah -->
                <!-- <div class="terms-text">
                    By signing up you agree to our <a href="#">Terms & Conditions</a> and acknowledge our <a href="#">Privacy Policy.</a>
                </div> -->

            </div>
        </div>

        <!-- Sisi Kanan: Gambar -->
        <div class="right-panel">
            <div class="image-container">
                <div class="image-overlay"></div>
                
                <div class="image-content">
                    <div class="slider-indicators">
                        <div class="indicator"></div>
                        <div class="indicator active"></div>
                        <div class="indicator"></div>
                        <div class="indicator"></div>
                    </div>
                    <h2>Discover your next journey</h2>
                    <p>Explore ideas, stories, and experiences designed to inspire your everyday life, guiding you through meaningful moments and fresh insights every day.</p>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mengambil elemen tombol dan input password
            const togglePassword = document.querySelector('.eye-icon');
            const passwordInput = document.getElementById('password');
            const icon = togglePassword.querySelector('i');

            // Menambahkan event saat tombol ikon diklik
            togglePassword.addEventListener('click', function (e) {
                // Toggle tipe input antara 'password' dan 'text'
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                // Toggle ikon (mata terbuka / tertutup)
                if (type === 'text') {
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye'); // Ikon mata terbuka
                } else {
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash'); // Ikon mata tertutup
                }
            });
        });
    </script>
</body>
</html>