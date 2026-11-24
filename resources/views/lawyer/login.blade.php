<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Advokat — Portal Ruang Adil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/lawyer/login.css') }}">
</head>
<body>
    <main class="auth-wrapper">
        <!-- Panel Kiri: Branding & Informasi Portal Advokat -->
        <section class="auth-brand-panel">
            <div class="brand-top">
                <div class="brand-header">
                    <div class="brand-logo-slot">
                        {{-- Ganti src di bawah dengan path asset logo milikmu --}}
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Ruang Adil" class="brand-logo-img">
                    </div>
                    <div class="brand-title-group">
                        <span class="brand-name">RUANG ADIL</span>
                        <span class="brand-tagline">Portal Advokat &amp; Penanganan Perkara</span>
                    </div>
                </div>

                <div class="brand-hero">
                    <span class="hero-eyebrow">PORTAL ADVOKAT • RUANG ADIL</span>
                    <h1 class="hero-heading">Dedikasi hukum.<br>Terukur dalam<br>setiap perkara.</h1>
                    <p class="hero-subtext">
                        Kelola penugasan perkara, perbarui progres eksekusi hukum, dan pantau jadwal sidang dalam satu ruang kerja terpadu.
                    </p>

                    <div class="hero-divider"></div>

                    <p class="hero-quote">
                        Integritas advokat.<br>
                        Kepastian dalam pendampingan.
                    </p>
                </div>
            </div>

            <footer class="brand-footer">
                <span>RUANG ADIL &nbsp;/&nbsp; ADVOCATE WORKSPACE</span>
            </footer>
        </section>

        <!-- Panel Kanan: Form Login Lawyer -->
        <section class="auth-form-panel">
            <div class="form-panel-inner">
                <header class="form-top-nav">
                    <a href="{{ url('/') }}" class="back-link">Kembali ke beranda</a>
                    <span class="role-pill">Akses Advokat</span>
                </header>

                <div class="form-content-box">
                    <h2 class="form-title">Masuk ke Ruang Advokat</h2>
                    <p class="form-subtitle">
                        Gunakan kredensial advokat terdaftar untuk mengakses daftar perkara yang ditugaskan kepada Anda.
                    </p>

                    @if (session('error'))
                        <div class="alert-error" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('lawyer.login.submit') }}" method="POST" class="login-form">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="form-label">Email Advokat</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-input @error('email') is-invalid @enderror"
                                placeholder="advokat@ksp-law.id"
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

                        <button type="submit" class="btn-submit">Masuk sebagai Advokat</button>
                    </form>

                    <div class="form-info-box">
                        <p class="info-title">Otorisasi khusus tim hukum terdaftar.</p>
                        <p class="info-desc">
                            Akun advokat dikelola oleh administrator kantor hukum. Jika terdapat kendala akses atau perubahan penugasan, hubungi admin Ruang Adil.
                        </p>
                    </div>
                </div>

                <footer class="form-bottom-footer">
                    <span class="footer-portal-text">Portal Advokat Ruang Adil</span>
                    <a href="#" class="footer-contact-link">Hubungi admin</a>
                </footer>
            </div>
        </section>
    </main>

    <script src="{{ asset('js/lawyer/login.js') }}"></script>
</body>
</html>