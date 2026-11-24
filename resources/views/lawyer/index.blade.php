<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview - Lawyer Portal</title>
    <!-- Font Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
                    {{-- Tempat asset logo milikmu --}}
                    <img src="{{ asset('images/logo.png') }}" alt="KSP Logo" class="logo-img">
                </div>
                <div class="brand-info">
                    <h2 class="brand-name">KETUT SURYA PUTRA<br>&amp; PARTNERS</h2>
                    <p class="brand-sub">Legal Client Portal</p>
                </div>
            </div>

            <div class="sidebar-menu">
                <p class="menu-label">RUANG KLIEN</p>
                <nav class="nav-links">
                    <a href="{{ route('lawyer.index') }}" class="nav-item active">
                        <i class='bx bx-grid-alt'></i>
                        <span>Overview</span>
                    </a>
                    <a href="{{ route('lawyer.kelolaperkara.index') }}" class="nav-item">
                        <i class='bx bx-shopping-bag'></i>
                        <span>Kelola Perkara</span>
                    </a>
                    <a href="{{ route('lawyer.jadwal.index') }}" class="nav-item">
                        <i class='bx bx-calendar-event'></i>
                        <span>Jadwal</span>
                    </a>
                    <a href="{{ route('lawyer.pusatreferensi.index') }}" class="nav-item">
                        <i class='bx bx-message-square-detail'></i>
                        <span>Pusat Referensi</span>
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
                <div class="topbar-left">
                    <button class="mobile-toggle-btn" id="mobileMenuBtn">
                        <i class='bx bx-menu'></i>
                    </button>
                    <div class="breadcrumbs">
                        <span>Dashboard</span>
                        <i class='bx bx-chevron-right breadcrumb-sep'></i>
                        <span class="current">Overview</span>
                    </div>
                </div>

                <div class="topbar-right">
                    <button class="icon-btn notif-btn" title="Notifikasi">
                        <i class='bx bx-bell'></i>
                        <span class="notif-dot"></span>
                    </button>
                    <div class="user-profile">
                        <div class="avatar">
                            {{-- Tempat asset foto profil lawyer milikmu --}}
                            <img src="{{ asset($lawyer['photo_path'] ?? 'images/lawyer-default.png') }}" alt="{{ $lawyer['full_name'] }}">
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{ $lawyer['full_name'] }}</span>
                            <span class="user-role">{{ $lawyer['role_name'] ?? 'Lawyer' }}</span>
                        </div>
                        <i class='bx bx-chevron-down dropdown-arrow'></i>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">
                
                <!-- Welcome Banner -->
                <div class="welcome-banner">
                    <div class="welcome-text">
                        <p class="greeting">Selamat datang,</p>
                        <h2 class="lawyer-name">{{ $lawyer['full_name'] }}</h2>
                        <p class="greeting-sub">Berikut ringkasan perkara yang Anda tangani.</p>
                    </div>
                    <div class="welcome-illustration">
                        {{-- Tempat asset ilustrasi timbangan & dokumen milikmu --}}
                        <img src="{{ asset('images/Ilustrasi_hukum.png') }}" alt="Ilustrasi Hukum">
                    </div>
                </div>

                <!-- Stats Grid (4 Kartu sesuai mockup) -->
                <div class="stats-grid">
                    
                    <!-- Card 1: Total Perkara -->
                    <div class="stat-card card-blue">
                        <div class="stat-card-top">
                            <div class="icon-wrapper blue">
                                <i class='bx bx-file'></i>
                            </div>
                            <i class='bx bx-briefcase watermark-icon blue'></i>
                        </div>
                        <h3 class="stat-number">{{ $stats['total_cases'] }}</h3>
                        <p class="stat-title">Total Perkara</p>
                        <p class="stat-desc">Seluruh perkara yang Anda tangani.</p>
                    </div>

                    <!-- Card 2: Dalam Proses -->
                    <div class="stat-card card-indigo">
                        <div class="stat-card-top">
                            <div class="icon-wrapper indigo">
                                <i class='bx bx-time-five'></i>
                            </div>
                            <i class='bx bx-time-five watermark-icon indigo'></i>
                        </div>
                        <h3 class="stat-number">{{ $stats['in_progress'] }}</h3>
                        <p class="stat-title">Dalam Proses</p>
                        <p class="stat-desc">Perkara yang sedang ditangani.</p>
                    </div>

                    <!-- Card 3: Menunggu Dokumen -->
                    <div class="stat-card card-amber">
                        <div class="stat-card-top">
                            <div class="icon-wrapper amber">
                                <i class='bx bx-file-blank'></i>
                            </div>
                            <i class='bx bx-file-blank watermark-icon amber'></i>
                        </div>
                        <h3 class="stat-number">{{ $stats['waiting_documents'] }}</h3>
                        <p class="stat-title">Menunggu Dokumen</p>
                        <p class="stat-desc">Perkara yang menunggu kelengkapan dokumen.</p>
                    </div>

                    <!-- Card 4: Selesai -->
                    <div class="stat-card card-green">
                        <div class="stat-card-top">
                            <div class="icon-wrapper green">
                                <i class='bx bx-check-circle'></i>
                            </div>
                            <i class='bx bx-check-circle watermark-icon green'></i>
                        </div>
                        <h3 class="stat-number">{{ $stats['completed'] }}</h3>
                        <p class="stat-title">Selesai</p>
                        <p class="stat-desc">Perkara yang selesai ditangani.</p>
                    </div>

                </div>

            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const sidebar = document.querySelector('.sidebar');

            if (mobileMenuBtn && sidebar) {
                mobileMenuBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    sidebar.classList.toggle('active');
                });

                document.addEventListener('click', function(e) {
                    if (window.innerWidth <= 768) {
                        if (!sidebar.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                            sidebar.classList.remove('active');
                        }
                    }
                });
            }
        });
    </script>
</body>
</html>