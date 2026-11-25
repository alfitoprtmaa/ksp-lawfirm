<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftarkan Akun Pengguna - Lawyer Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/dataklien/index.css') }}">
</head>
<body>

<div class="admin-layout">
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Kantor Hukum" class="brand-logo">
            <div class="brand-text">
                <h1>Lawyer Admin</h1>
                <span>Sistem Manajemen Advokat</span>
            </div>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="nav-item">
                <i class='bx bx-home-alt nav-icon'></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.jadwal.index') }}" class="nav-item">
                <i class='bx bx-calendar nav-icon'></i>
                <span>Kelola Jadwal</span>
            </a>

            <a href="{{ route('admin.konsultasionline.index') }}" class="nav-item">
                <i class='bx bx-video nav-icon'></i>
                <span>Kelola Konsultasi</span>
            </a>

            <a href="{{ route('admin.perkara.index') }}" class="nav-item">
                <i class='bx bx-folder nav-icon'></i>
                <span>Konsultasi Perkara</span>
            </a>

            <!-- MENU AKTIF: AKSES PENGGUNA -> DATA KLIEN -->
            <div class="nav-group open">
                <button type="button" class="nav-item has-dropdown">
                    <div class="nav-label">
                        <i class='bx bx-group nav-icon'></i>
                        <span>Akses Pengguna</span>
                    </div>
                    <i class='bx bx-chevron-down chevron'></i>
                </button>
                <ul class="submenu">
                    <li><a href="{{ route('admin.advokat.index') }}">Data Advokat</a></li>
                    <li><a href="{{ route('admin.role.index') }}">Data Role</a></li>
                    <li><a href="{{ route('admin.klien.index') }}" class="active-sub">Data Klien</a></li>
                </ul>
            </div>

            <div class="nav-group open">
                <button type="button" class="nav-item has-dropdown">
                    <div class="nav-label">
                        <i class='bx bx-briefcase nav-icon'></i>
                        <span>Manajemen Konten</span>
                    </div>
                    <i class='bx bx-chevron-down chevron'></i>
                </button>
                <ul class="submenu">
                    <li><a href="#">Data Layanan</a></li>
                    <li><a href="#">Data Artikel Kegiatan</a></li>
                    <li><a href="#">Data FAQ</a></li>
                </ul>
            </div>

            <a href="#" class="nav-item">
                <i class='bx bx-book-open nav-icon'></i>
                <span>Kelola Pusat Referensi</span>
            </a>
        </nav>

        <div class="sidebar-watermark">
            <svg viewBox="0 0 200 100" fill="currentColor">
                <polygon points="100,10 15,45 185,45" />
                <rect x="25" y="48" width="150" height="6" />
                <rect x="35" y="58" width="14" height="42" />
                <rect x="64" y="58" width="14" height="42" />
                <rect x="93" y="58" width="14" height="42" />
                <rect x="122" y="58" width="14" height="42" />
                <rect x="151" y="58" width="14" height="42" />
            </svg>
        </div>
    </aside>

    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">
        <!-- TOPBAR -->
        <header class="topbar">
            <button type="button" class="menu-toggle" aria-label="Toggle Menu">
                <i class='bx bx-menu'></i>
            </button>

            <div class="topbar-actions">
                <button type="button" class="notif-btn" aria-label="Notifikasi">
                    <i class='bx bx-bell'></i>
                    <span class="notif-dot"></span>
                </button>
                <div class="topbar-divider"></div>
                <div class="user-profile">
                    <div class="avatar">{{ $admin['initial'] }}</div>
                    <span class="user-name">{{ $admin['full_name'] }}</span>
                    <i class='bx bx-chevron-down chevron-dark'></i>
                </div>
            </div>
        </header>

        <!-- PAGE CONTENT -->
        <main class="content">
            <div class="breadcrumb">
                <a href="{{ route('admin.klien.index') }}">Akses pengguna</a>
                <span>/</span>
                <span class="current">Pendaftaran</span>
            </div>

            <div class="page-header">
                <div>
                    <h2>Daftarkan akun pengguna</h2>
                    <p>Admin membuat akun dan menetapkan role untuk akses ke portal.</p>
                </div>
            </div>

            @if($errors->any())
                <div class="alert-error">
                    <i class='bx bx-error-circle'></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <!-- INFO BANNER MAROON SOFT -->
            <div class="info-banner-maroon">
                <strong>Tidak ada pendaftaran mandiri</strong>
                <p>Pengguna masuk menggunakan email dan kata sandi yang diberikan oleh admin.</p>
            </div>

            <form action="{{ route('admin.klien.store') }}" method="POST">
                @csrf
                <div class="register-split-grid">
                    <!-- KIRI: FORM DATA PENGGUNA -->
                    <div class="form-card">
                        <h3>Data pengguna</h3>

                        <div class="form-group">
                            <label>Role pengguna *</label>
                            <div class="role-radio-row">
                                <label class="role-radio-pill selected">
                                    <input type="radio" name="role_name" value="Klien" checked>
                                    <span class="radio-circle"></span>
                                    <span>Klien</span>
                                </label>

                                <label class="role-radio-pill">
                                    <input type="radio" name="role_name" value="Lawyer">
                                    <span class="radio-circle"></span>
                                    <span>Lawyer</span>
                                </label>

                                <label class="role-radio-pill">
                                    <input type="radio" name="role_name" value="Admin">
                                    <span class="radio-circle"></span>
                                    <span>Admin</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="full_name">Nama lengkap *</label>
                            <input
                                type="text"
                                id="full_name"
                                name="full_name"
                                class="form-control"
                                value="{{ old('full_name', 'Rina Wijaya') }}"
                                placeholder="Masukkan nama lengkap pengguna"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="whatsapp">Nomor WhatsApp *</label>
                            <input
                                type="text"
                                id="whatsapp"
                                name="whatsapp"
                                class="form-control"
                                value="{{ old('whatsapp', '0812-3456-7890') }}"
                                placeholder="Contoh: 0812-3456-7890"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="email">Email untuk masuk *</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email', 'rina.wijaya@email.com') }}"
                                placeholder="Contoh: nama@email.com"
                                required
                            >
                            <span class="field-hint">Email ini menjadi identitas masuk pengguna ke portal.</span>
                        </div>

                        <div class="form-group">
                            <label for="password">Kata sandi awal *</label>
                            <div class="password-input-wrap">
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control"
                                    value="KspLaw2026"
                                    placeholder="Minimal 8 karakter"
                                    required
                                >
                                <button type="button" class="btn-toggle-pass" id="btnTogglePassword" aria-label="Tampilkan sandi">
                                    <i class='bx bx-show'></i>
                                </button>
                            </div>
                            <span class="field-hint">Ditetapkan admin. Minimal 8 karakter, kombinasi huruf dan angka.</span>
                        </div>
                    </div>

                    <!-- KANAN: PENYERAHAN AKSES -->
                    <aside class="steps-side-card">
                        <h3>Penyerahan akses</h3>

                        <div class="access-step-list">
                            <div class="access-step-item">
                                <span class="step-num">01</span>
                                <div>
                                    <h4>Admin membuat akun</h4>
                                    <p>Periksa data pengguna dan tentukan role yang sesuai.</p>
                                </div>
                            </div>

                            <div class="access-step-item">
                                <span class="step-num">02</span>
                                <div>
                                    <h4>Admin memberikan akses</h4>
                                    <p>Sampaikan email dan kata sandi melalui kontak pengguna yang terverifikasi.</p>
                                </div>
                            </div>

                            <div class="access-step-item">
                                <span class="step-num">03</span>
                                <div>
                                    <h4>Pengguna masuk ke portal</h4>
                                    <p>Akses fitur portal sesuai role: Klien, Lawyer, atau Admin.</p>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>

                <!-- BLUE CREDENTIAL REMINDER BANNER -->
                <div class="info-banner-blue">
                    Berikan kredensial hanya kepada pengguna terverifikasi. Sarankan penggantian kata sandi setelah masuk pertama kali.
                </div>

                <!-- ACTION BUTTONS -->
                <div class="register-footer-actions">
                    <a href="{{ route('admin.klien.index') }}" class="btn-cancel">Batal</a>
                    <button type="submit" class="btn-maroon btn-create-user">Buat akun pengguna</button>
                </div>

                <p class="footer-bottom-caption">
                    Setelah akun dibuat, admin memberikan email dan kata sandi kepada pengguna.
                </p>
            </form>
        </main>
    </div>
</div>

<script src="{{ asset('js/admin/dataklien.js') }}"></script>
</body>
</html>