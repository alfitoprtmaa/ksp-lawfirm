<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk — Portal Ruang Adil</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/customer/login/login.css') }}">
</head>
<body>
    <main class="auth-wrapper">
        <!-- Panel Kiri: Branding & Informasi Portal -->
        <section class="auth-brand-panel">
            <div class="brand-top">
                <div class="brand-header">
                    <div class="brand-logo-slot">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Ruang Adil" class="brand-logo-img">
                    </div>
                    <div class="brand-title-group">
                        <span class="brand-name">RUANG ADIL</span>
                        <span class="brand-tagline">Layanan &amp; pendampingan hukum</span>
                    </div>
                </div>

                <div class="brand-hero">
                    <span class="hero-eyebrow">PORTAL RUANG ADIL</span>
                    <h1 class="hero-heading">Satu akses.<br>Bersama menuju<br>keadilan.</h1>
                    <p class="hero-subtext">
                        Kelola konsultasi, pantau perkembangan perkara, dan tetap terhubung dalam satu ruang.
                    </p>

                    <div class="hero-divider"></div>

                    <p class="hero-quote">
                        Solidaritas profesional.<br>
                        Pendampingan yang berpihak.
                    </p>
                </div>
            </div>

            <footer class="brand-footer">
                <span>RUANG ADIL &nbsp;/&nbsp; MARTABAT &amp; KEADILAN</span>
            </footer>
        </section>

        <!-- Panel Kanan: Form Login Customer -->
        <section class="auth-form-panel">
            <div class="form-panel-inner">
                <header class="form-top-nav">
                    <a href="{{ url('/') }}" class="back-link">Kembali ke beranda</a>
                </header>

                <div class="form-content-box">
                    <h2 class="form-title">Selamat datang kembali</h2>
                    <p class="form-subtitle">
                        Masuk menggunakan akun yang telah diberikan oleh admin Ruang Adil.
                    </p>

                    @if (session('error'))
                        <div class="alert-error" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('customer.login.submit') }}" method="POST" class="login-form">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-input @error('email') is-invalid @enderror"
                                placeholder="nama@email.com"
                                required
                                autofocus
                            >
                            @error('email')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Kata sandi</label>
                            <div class="password-input-wrapper">
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-input password-field @error('password') is-invalid @enderror"
                                    placeholder="Masukkan kata sandi"
                                    required
                                >
                                <button type="button" id="togglePasswordBtn" class="toggle-password-btn">
                                    Tampilkan
                                </button>
                            </div>
                            @error('password')
                                <span class="field-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-options">
                            <a href="#" class="forgot-password-link">Lupa kata sandi?</a>
                        </div>

                        <button type="submit" class="btn-submit">Masuk</button>
                    </form>

                    <div class="form-info-box">
                        <p class="info-title">Satu akun, akses sesuai peran Anda.</p>
                        <p class="info-desc">
                            Akun dikelola oleh admin. Jika belum memiliki akses atau mengalami kendala masuk, hubungi admin Ruang Adil.
                        </p>
                    </div>
                </div>

                <footer class="form-bottom-footer">
                    <span class="footer-portal-text">Portal Ruang Adil</span>
                    <a href="#" class="footer-contact-link">Hubungi admin</a>
                </footer>
            </div>
        </section>
    </main>

    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>