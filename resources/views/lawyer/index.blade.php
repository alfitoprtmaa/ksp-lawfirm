<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview - Lawyer Portal</title>
    <!-- Font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/lawyer/index.css') }}">
</head>
<body>
    <div class="layout-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="KSP Logo" class="logo-img">
                </div>
                <div class="brand-info">
                    <h2 class="brand-name">KETUT SURYA PUTRA<br>& PARTNERS</h2>
                    <p class="brand-sub">Legal Client Portal</p>
                </div>
            </div>

            <div class="sidebar-menu">
                <p class="menu-label">RUANG Lawyer</p>
                <nav class="nav-links">
                    <a href="#" class="nav-item active">
                        <i class='bx bx-grid-alt'></i>
                        <span>Overview</span>
                    </a>
                    <a href="{{ route('lawyer.kelolaperkara.index') }}" class="nav-item">
                        <i class='bx bx-briefcase'></i>
                        <span>Kelola Perkara</span>
                    </a>
                    <a href="{{ route('lawyer.jadwal.index') }}" class="nav-item">
                        <i class='bx bx-calendar-event'></i>
                        <span>Jadwal</span>
                    </a>
                    <a href="{{ route('lawyer.pusatreferensi.index') }}" class="nav-item">
                        <i class='bx bx-folder-open'></i>
                        <span>Pusat Refrensi</span>
                    </a>
                </nav>
            </div>

            <div class="sidebar-footer">
                <a href="{{ route('lawyer.akun.index') }}" class="nav-item">
                    <i class='bx bx-cog'></i>
                    <span>Pengaturan akun</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="topbar">
                <div class="topbar-left" style="display: flex; align-items: center; gap: 15px;">
                    <button class="mobile-toggle-btn" id="mobileMenuBtn">
                        <i class='bx bx-menu'></i>
                    </button>
                    <div class="breadcrumbs">
                        <span>Portal Lawyer</span> / <span class="current">Overview</span>
                    </div>
                </div>

                <div class="topbar-right">
                    <button class="icon-btn"><i class='bx bx-bell'></i></button>
                    <div class="user-profile">
                        <div class="avatar">
                            <i class='bx bx-user'></i>
                        </div>
                        <div class="user-info">
                            <span class="user-name">Akun Anda</span>
                            <span class="user-role">Lawyer</span>
                        </div>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">
                
                <!-- Welcome Banner -->
                <div class="welcome-banner">
                    <div class="welcome-text">
                        <p class="greeting">Selamat datang,</p>
                        <h2 class="lawyer-name">Adv. Adi Pratama</h2>
                        <p class="greeting-sub">Berikut ringkasan perkara yang Anda tangani.</p>
                    </div>
                    <div class="welcome-illustration">
                        <img src="{{ asset('images/Ilustrasi_hukum.png') }}" alt="Justice Illustration">
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="stats-grid">
                    
                    <!-- Card 1: Total Perkara -->
                    <div class="stat-card">
                        <div class="icon-wrapper blue">
                            <i class='bx bx-file'></i>
                        </div>
                        <h3 class="stat-number">124</h3>
                        <p class="stat-title">Total Perkara</p>
                        <p class="stat-desc">Seluruh perkara yang Anda tangani.</p>
                        <i class='bx bx-briefcase bg-icon'></i>
                    </div>

                    <!-- Card 2: Dalam Proses -->
                    <div class="stat-card">
                        <div class="icon-wrapper light-blue">
                            <i class='bx bx-time-five'></i>
                        </div>
                        <h3 class="stat-number">56</h3>
                        <p class="stat-title">Dalam Proses</p>
                        <p class="stat-desc">Perkara yang sedang ditangani.</p>
                        <i class='bx bx-time-five bg-icon'></i>
                    </div>

                    <!-- Card 3: Menunggu Dokumen -->
                    <div class="stat-card">
                        <div class="icon-wrapper yellow">
                            <i class='bx bx-file-blank'></i>
                        </div>
                        <h3 class="stat-number">23</h3>
                        <p class="stat-title">Menunggu Dokumen</p>
                        <p class="stat-desc">Perkara yang menunggu kelengkapan dokumen.</p>
                        <i class='bx bx-file-blank bg-icon'></i>
                    </div>

                    <!-- Card 4: Selesai -->
                    <div class="stat-card">
                        <div class="icon-wrapper green">
                            <i class='bx bx-check-circle'></i>
                        </div>
                        <h3 class="stat-number">38</h3>
                        <p class="stat-title">Selesai</p>
                        <p class="stat-desc">Perkara yang selesai ditangani.</p>
                        <i class='bx bx-check-circle bg-icon'></i>
                    </div>

                    <!-- Card 5: Ditutup -->
                    <div class="stat-card">
                        <div class="icon-wrapper red">
                            <i class='bx bx-x-circle'></i>
                        </div>
                        <h3 class="stat-number">7</h3>
                        <p class="stat-title">Ditutup</p>
                        <p class="stat-desc">Perkara yang telah ditutup.</p>
                        <i class='bx bx-x-circle bg-icon'></i>
                    </div>

                </div>

            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const sidebar = document.querySelector('.sidebar');

            // Toggle Sidebar saat tombol hamburger diklik
            mobileMenuBtn.addEventListener('click', function(e) {
                e.stopPropagation(); // Mencegah event klik menjalar ke dokumen
                sidebar.classList.toggle('active');
            });

            // Otomatis menutup sidebar jika user mengklik area di luar sidebar
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 768) {
                    if (!sidebar.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                        sidebar.classList.remove('active');
                    }
                }
            });
        });
    </script>
</body>
</html>