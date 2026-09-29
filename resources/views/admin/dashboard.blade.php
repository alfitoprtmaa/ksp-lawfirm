<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
</head>

<body>

<div class="admin-shell" id="adminShell">
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">

        <!-- Logo -->
        <div class="brand">
            <div class="brand-mark">
                <svg viewBox="0 0 32 32">
                    <path d="M16 4 27 9v7c0 7.1-4.6 11.5-11 13C9.6 27.5 5 23.1 5 16V9l11-5Z"/>
                    <path
                        d="M11 16.2 14.2 19 21 12"
                        class="brand-check"
                    />
                </svg>
            </div>

            <div class="brand-text">
                <strong>
                    Legal<span>Space</span>
                </strong>

                <small>Admin Panel</small>
            </div>

            <button
                class="sidebar-close"
                id="sidebarClose"
                aria-label="Tutup menu"
            >
                ×
            </button>
        </div>

        <!-- Navigation -->
        <nav class="sidebar-nav">

            {{-- Dashboard --}}
            <a href="#" class="nav-item active">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24">
                        <rect x="3" y="3" width="7" height="7" rx="1"/>
                        <rect x="14" y="3" width="7" height="7" rx="1"/>
                        <rect x="3" y="14" width="7" height="7" rx="1"/>
                        <rect x="14" y="14" width="7" height="7" rx="1"/>
                    </svg>
                </span>
                <span>Dashboard</span>
            </a>

            {{-- OPERASIONAL --}}
            <div class="nav-section">
                OPERASIONAL
            </div>

            {{-- Booking --}}
            <a href="#" class="nav-item">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M7 3v3M17 3v3"/>
                        <path d="M4 9h16"/>
                        <path d="M6 5h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z"/>
                        <path d="M8 13h3M8 17h6"/>
                    </svg>
                </span>
                <span>Booking</span>
                <span class="nav-badge">
                    12
                </span>
            </a>

            {{-- Konsultasi --}}
            <a href="#" class="nav-item">

                <span class="nav-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M20 11.5a7.5 7.5 0 0 1-8 7.5 8.8 8.8 0 0 1-3.2-.6L4 20l1.6-4A7.4 7.4 0 0 1 4.5 12 7.5 7.5 0 0 1 12 4.5a7.5 7.5 0 0 1 8 7Z"/>
                        <path d="M8 10h8M8 14h5"/>
                    </svg>
                </span>

                <span>Konsultasi</span>

                <span class="nav-badge">
                    8
                </span>
            </a>

            {{-- Kalender --}}
            <a href="#" class="nav-item">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="17" rx="2"/>
                        <path d="M7 2v4M17 2v4M3 9h18"/>
                        <path d="M8 13h3v3H8z"/>
                    </svg>
                </span>
                <span>Kalender</span>
            </a>

            {{-- PENGGUNA --}}
            <div class="nav-section">
                PENGGUNA
            </div>

            {{-- Customer --}}
            <a href="#" class="nav-item">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24">
                        <circle cx="9" cy="8" r="3"/>
                        <path d="M3 20a6 6 0 0 1 12 0"/>
                        <path d="M16 11a3 3 0 1 0 0-6"/>
                        <path d="M18 14a5 5 0 0 1 3 6"/>
                    </svg>
                </span>
                <span>Customer</span>
            </a>

            {{-- Lawyer --}}
            <a href="#" class="nav-item">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24">
                        <circle cx="9" cy="8" r="3"/>
                        <path d="M3 20a6 6 0 0 1 12 0"/>
                        <path d="M16 12h5"/>
                        <path d="M18.5 9.5v5"/>
                    </svg>
                </span>
                <span>Lawyer</span>
            </a>

            {{-- WEBSITE --}}
            <div class="nav-section">
                WEBSITE
            </div>

            {{-- Layanan --}}
            <a href="#" class="nav-item">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M4 6.5h16"/>
                        <path d="M4 12h16"/>
                        <path d="M4 17.5h10"/>
                        <circle cx="18" cy="17.5" r="2"/>
                    </svg>
                </span>
                <span>Layanan</span>
            </a>

            {{-- Artikel --}}
            <a href="#" class="nav-item">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M5 4h14v16H5z"/>
                        <path d="M8 8h8M8 12h8M8 16h5"/>
                    </svg>
                </span>
                <span>Artikel</span>
            </a>

            {{-- Testimoni --}}
            <a href="#" class="nav-item">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="m12 4 2.2 4.5 5 .7-3.6 3.5.9 5-4.5-2.4-4.5 2.4.9-5-3.6-3.5 5-.7L12 4Z"/>
                    </svg>
                </span>
                <span>Testimoni</span>
            </a>

            {{-- Konten Website --}}
            <a href="#" class="nav-item">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24">
                        <rect x="4" y="4" width="16" height="16" rx="2"/>
                        <path d="M8 9h8M8 13h8M8 17h5"/>
                    </svg>
                </span>
                <span>Konten Website</span>
            </a>

            {{-- LAINNYA --}}
            <div class="nav-section">
                LAINNYA
            </div>

            {{-- Logout --}}
            <a href="#" class="nav-item logout">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M10 5H6a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h4"/>
                        <path d="m15 8 4 4-4 4"/>
                        <path d="M19 12H9"/>
                    </svg>
                </span>
                <span>Logout</span>
            </a>

        </nav>

        {{-- Sidebar Footer --}}
        <div class="sidebar-footer">

            <div class="support-card">
                <div class="support-icon">
                    ?
                </div>

                <div>
                    <strong>Butuh bantuan?</strong>
                    <p>Lihat panduan admin</p>
                </div>

                <a href="#">
                    →
                </a>
            </div>

            <div class="sidebar-copy">
                © {{ date('Y') }} Ketut Surya & Partner
            </div>

        </div>

    </aside>

    <!-- Main Content -->
    <main class="main-content">

        {{-- TOPBAR --}}
        <header class="topbar">
            {{-- Mobile Menu --}}
            <button
                class="mobile-menu"
                id="mobileMenu"
                aria-label="Buka menu"
            >
                <svg viewBox="0 0 24 24">
                    <path d="M4 6h16"/>
                    <path d="M4 12h16"/>
                    <path d="M4 18h16"/>
                </svg>
            </button>

            {{-- Search --}}
            <div class="search-box">
                <svg viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="6.5"/>
                    <path d="m16 16 4 4"/>
                </svg>

                <input
                    type="search"
                    placeholder="Search anything..."
                >

                <kbd>
                    ⌘ K
                </kbd>
            </div>

            {{-- Topbar Actions --}}
            <div class="topbar-actions">
                {{-- Dark Mode --}}
                <button
                    class="icon-button theme-toggle"
                    id="themeToggle"
                    title="Ganti mode"
                >
                    {{-- Sun --}}
                    <svg
                        class="sun-icon"
                        viewBox="0 0 24 24"
                    >
                        <circle cx="12" cy="12" r="4"/>
                        <path d="M12 2v2"/>
                        <path d="M12 20v2"/>
                        <path d="M4.93 4.93l1.42 1.42"/>
                        <path d="M17.65 17.65l1.42 1.42"/>
                        <path d="M2 12h2"/>
                        <path d="M20 12h2"/>
                        <path d="M4.93 19.07l1.42-1.42"/>
                        <path d="M17.65 6.35l1.42-1.42"/>
                    </svg>

                    {{-- Moon --}}
                    <svg
                        class="moon-icon"
                        viewBox="0 0 24 24"
                    >
                        <path d="M20 15.5A8.5 8.5 0 0 1 8.5 4 8.5 8.5 0 1 0 20 15.5Z"/>
                    </svg>
                </button>

                {{-- Notification --}}
                <button
                    class="icon-button notification-button"
                    title="Notifikasi"
                >
                    <svg viewBox="0 0 24 24">
                        <path d="M18 9a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"/>
                        <path d="M10 21h4"/>
                    </svg>

                    <span></span>
                </button>

                {{-- Profile --}}
                <div class="profile">
                    <div class="avatar">
                        AD
                    </div>

                    <div class="profile-info">
                        <strong>Admin</strong>
                        <small>Administrator</small>
                    </div>

                    <svg
                        class="chevron"
                        viewBox="0 0 24 24"
                    >
                        <path d="m6 9 6 6 6-6"/>
                    </svg>
                </div>

            </div>

        </header>

        <!-- Page -->
        <div class="page">

            <!-- Page Heading -->
            <div class="page-heading">
                <div>
                    <p class="eyebrow">
                        ADMIN PANEL
                    </p>

                    <h1>
                        Dashboard
                    </h1>

                    <p class="page-description">
                        Pantau aktivitas dan performa layanan hukum Anda.
                    </p>
                </div>

                <div class="heading-actions">
                    <button class="date-filter">
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="17" rx="2"/>
                            <path d="M7 2v4"/>
                            <path d="M17 2v4"/>
                            <path d="M3 9h18"/>
                        </svg>
                        1 Jan 2025 – 31 Jan 2025
                        <svg
                            class="chevron"
                            viewBox="0 0 24 24"
                        >
                            <path d="m6 9 6 6 6-6"/>
                        </svg>
                    </button>

                    <button class="primary-button">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 3v12"/>
                            <path d="M7 10l5 5 5-5"/>
                            <path d="M5 20h14"/>
                        </svg>
                        Export
                    </button>
                </div>
            </div>

            <!-- Statistics -->
            <section class="stats-grid">

                <!-- Total Booking -->
                <article class="stat-card">
                    <div class="stat-top">
                        <span>
                            Total Booking
                        </span>

                        <span class="stat-icon blue">
                            <svg viewBox="0 0 24 24">
                                <path d="M7 3v3M17 3v3"/>
                                <path d="M4 9h16"/>
                                <path d="M6 5h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z"/>
                            </svg>
                        </span>
                    </div>

                    <div class="stat-value">
                        1,284
                    </div>

                    <div class="stat-meta">
                        <span class="positive">
                            ↗ 12.8%
                        </span>

                        <span>
                            vs. bulan lalu
                        </span>
                    </div>
                </article>

                <!-- Konsultasi -->
                <article class="stat-card">
                    <div class="stat-top">
                        <span>
                            Konsultasi
                        </span>

                        <span class="stat-icon violet">
                            <svg viewBox="0 0 24 24">
                                <path d="M20 11.5a7.5 7.5 0 0 1-8 7.5 8.8 8.8 0 0 1-3.2-.6L4 20l1.6-4A7.4 7.4 0 0 1 4.5 12 7.5 7.5 0 0 1 12 4.5a7.5 7.5 0 0 1 8 7Z"/>
                            </svg>
                        </span>
                    </div>

                    <div class="stat-value">
                        642
                    </div>

                    <div class="stat-meta">
                        <span class="positive">
                            ↗ 8.4%
                        </span>

                        <span>
                            vs. bulan lalu
                        </span>
                    </div>
                </article>

                <!-- Customer -->
                <article class="stat-card">
                    <div class="stat-top">
                        <span>
                            Customer Aktif
                        </span>

                        <span class="stat-icon green">

                            <svg viewBox="0 0 24 24">
                                <circle cx="9" cy="8" r="3"/>
                                <path d="M3 20a6 6 0 0 1 12 0"/>
                            </svg>
                        </span>
                    </div>

                    <div class="stat-value">
                        2,884
                    </div>

                    <div class="stat-meta">
                        <span class="positive">
                            ↗ 5.6%
                        </span>

                        <span>
                            vs. bulan lalu
                        </span>
                    </div>
                </article>

                <!-- Lawyer -->
                <article class="stat-card">
                    <div class="stat-top">
                        <span>
                            Lawyer Aktif
                        </span>

                        <span class="stat-icon orange">
                            <svg viewBox="0 0 24 24">
                                <circle cx="9" cy="8" r="3"/>
                                <path d="M3 20a6 6 0 0 1 12 0"/>
                            </svg>
                        </span>
                    </div>

                    <div class="stat-value">
                        86
                    </div>

                    <div class="stat-meta">
                        <span class="negative">
                            ↘ 2.1%
                        </span>

                        <span>
                            vs. bulan lalu
                        </span>
                    </div>
                </article>

            </section>

            <!-- Dashboard Grid -->
            <section class="dashboard-grid">

                <!-- Activity Chart -->
                <article class="card performance-card">
                    <div class="card-header">
                        <div>
                            <h2>
                                Aktivitas Layanan
                            </h2>

                            <p>
                                Booking dan konsultasi selama periode terpilih
                            </p>
                        </div>

                        <div class="legend">
                            <span>
                                <i class="dot booking"></i>
                                Booking
                            </span>

                            <span>
                                <i class="dot consultation"></i>
                                Konsultasi
                            </span>
                        </div>
                    </div>

                    <div class="chart-summary">
                        <div>
                            <strong>
                                7,426
                            </strong>

                            <span>
                                Total aktivitas
                            </span>
                        </div>

                        <div class="chart-growth">
                            ↗ 14.2%

                            <small>
                                dibanding periode sebelumnya
                            </small>
                        </div>
                    </div>

                    <!-- Chart -->
                    <div class="line-chart">
                        <div class="y-axis">
                            <span>1.200</span>
                            <span>900</span>
                            <span>600</span>
                            <span>300</span>
                            <span>0</span>
                        </div>

                        <div class="chart-area">
                            <svg
                                viewBox="0 0 760 250"
                                preserveAspectRatio="none"
                            >
                                <defs>
                                    <linearGradient
                                        id="areaBooking"
                                        x1="0"
                                        x2="0"
                                        y1="0"
                                        y2="1"
                                    >
                                        <stop
                                            offset="0%"
                                            stop-color="currentColor"
                                            stop-opacity=".20"
                                        />

                                        <stop
                                            offset="100%"
                                            stop-color="currentColor"
                                            stop-opacity="0"
                                        />
                                    </linearGradient>
                                </defs>

                                <!-- Grid -->
                                <g class="grid-lines">
                                    <line x1="0" y1="20" x2="760" y2="20"/>
                                    <line x1="0" y1="72" x2="760" y2="72"/>
                                    <line x1="0" y1="124" x2="760" y2="124"/>
                                    <line x1="0" y1="176" x2="760" y2="176"/>
                                    <line x1="0" y1="228" x2="760" y2="228"/>
                                </g>

                                <!-- Area -->
                                <path
                                    class="area-fill"
                                    d="
                                    M0 190
                                    L40 180
                                    L80 194
                                    L120 154
                                    L160 164
                                    L200 120
                                    L240 142
                                    L280 100
                                    L320 115
                                    L360 82
                                    L400 98
                                    L440 64
                                    L480 88
                                    L520 54
                                    L560 75
                                    L600 48
                                    L640 64
                                    L680 35
                                    L720 58
                                    L760 28
                                    L760 228
                                    L0 228
                                    Z"
                                />

                                <!-- Booking -->
                                <polyline
                                    class="line booking-line"
                                    points="
                                    0,190
                                    40,180
                                    80,194
                                    120,154
                                    160,164
                                    200,120
                                    240,142
                                    280,100
                                    320,115
                                    360,82
                                    400,98
                                    440,64
                                    480,88
                                    520,54
                                    560,75
                                    600,48
                                    640,64
                                    680,35
                                    720,58
                                    760,28
                                    "
                                />

                                <!-- Konsultasi -->
                                <polyline
                                    class="line consultation-line"
                                    points="
                                    0,205
                                    40,198
                                    80,202
                                    120,185
                                    160,188
                                    200,168
                                    240,176
                                    280,158
                                    320,170
                                    360,148
                                    400,160
                                    440,138
                                    480,150
                                    520,132
                                    560,145
                                    600,125
                                    640,137
                                    680,118
                                    720,129
                                    760,110
                                    "
                                />
                            </svg>

                            <div class="x-axis">
                                <span>1 Jan</span>
                                <span>5 Jan</span>
                                <span>10 Jan</span>
                                <span>15 Jan</span>
                                <span>20 Jan</span>
                                <span>25 Jan</span>
                                <span>31 Jan</span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Activity Today -->
                <article class="card active-card">
                    <div class="card-header">
                        <div>
                            <h2>
                                Hari Ini
                            </h2>

                            <p>
                                Aktivitas operasional
                            </p>
                        </div>

                        <button class="more-button">
                            •••
                        </button>
                    </div>

                    <div class="today-total">
                        <strong>
                            124
                        </strong>

                        <span>
                            aktivitas
                        </span>
                    </div>

                    <div class="mini-bars">
                        <div class="bar-item">
                            <div class="bar" style="height:44%"></div>
                            <span>Sen</span>
                        </div>

                        <div class="bar-item">
                            <div class="bar" style="height:62%"></div>
                            <span>Sel</span>
                        </div>

                        <div class="bar-item active">
                            <div class="bar" style="height:90%">
                                <b>124</b>
                            </div>
                            <span>Rab</span>
                        </div>

                        <div class="bar-item">
                            <div class="bar" style="height:58%"></div>
                            <span>Kam</span>
                        </div>

                        <div class="bar-item">
                            <div class="bar" style="height:73%"></div>
                            <span>Jum</span>
                        </div>

                        <div class="bar-item">
                            <div class="bar" style="height:40%"></div>
                            <span>Sab</span>
                        </div>

                        <div class="bar-item">
                            <div class="bar" style="height:30%"></div>
                            <span>Min</span>
                        </div>
                    </div>
                </article>

                <!-- Booking Table -->
                <article class="card booking-card">
                    <div class="card-header">
                        <div>
                            <h2>
                                Booking Terbaru
                            </h2>

                            <p>
                                Jadwal konsultasi yang baru masuk
                            </p>

                        </div>

                        <a
                            href="#"
                            class="text-link"
                        >
                            Lihat semua →
                        </a>
                    </div>

                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Lawyer</th>
                                    <th>Layanan</th>
                                    <th>Jadwal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- Row 1 --}}
                                <tr>
                                    <td>
                                        <div class="person">
                                            <span class="table-avatar a1">
                                                AR
                                            </span>

                                            <div>
                                                <strong>
                                                    Andi Ramadhan
                                                </strong>

                                                <small>
                                                    andi@email.com
                                                </small>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        F. Pratama, S.H.
                                    </td>

                                    <td>
                                        Hukum Bisnis
                                    </td>

                                    <td>
                                        10:00 WIB
                                    </td>

                                    <td>
                                        <span class="status confirmed">
                                            Dikonfirmasi
                                        </span>
                                    </td>
                                </tr>

                                <!-- Row 2 -->
                                <tr>
                                    <td>
                                        <div class="person">
                                            <span class="table-avatar a2">
                                                NS
                                            </span>

                                            <div>
                                                <strong>
                                                    Nadia Salsabila
                                                </strong>

                                                <small>
                                                    nadia@email.com
                                                </small>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        R. Wijaya, S.H.
                                    </td>

                                    <td>
                                        Hukum Keluarga
                                    </td>

                                    <td>
                                        11:30 WIB
                                    </td>

                                    <td>
                                        <span class="status pending">
                                            Menunggu
                                        </span>
                                    </td>
                                </tr>

                                <!-- Row 3 -->
                                <tr>
                                    <td>
                                        <div class="person">
                                            <span class="table-avatar a3">
                                                DM
                                            </span>

                                            <div>
                                                <strong>
                                                    Dimas Mahendra
                                                </strong>

                                                <small>
                                                    dimas@email.com
                                                </small>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        A. Putri, S.H.
                                    </td>

                                    <td>
                                        Hukum Pidana
                                    </td>

                                    <td>
                                        13:00 WIB
                                    </td>

                                    <td>
                                        <span class="status confirmed">
                                            Dikonfirmasi
                                        </span>
                                    </td>
                                </tr>

                                <!-- Row 4 -->
                                <tr>
                                    <td>
                                        <div class="person">
                                            <span class="table-avatar a4">
                                                SA
                                            </span>

                                            <div>
                                                <strong>
                                                    Siti Aulia
                                                </strong>

                                                <small>
                                                    siti@email.com
                                                </small>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        H. Nugraha, S.H.
                                    </td>

                                    <td>
                                        Hukum Perdata
                                    </td>

                                    <td>
                                        15:30 WIB
                                    </td>

                                    <td>
                                        <span class="status canceled">
                                            Dibatalkan
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </article>

                <!-- Right Side -->
                <aside class="side-stack">
                    {{-- Layanan Terpopuler --}}
                    <article class="card service-card">
                        <div class="card-header">
                            <div>
                                <h2>
                                    Layanan Terpopuler
                                </h2>

                                <p>
                                    Distribusi konsultasi
                                </p>
                            </div>

                            <button class="more-button">
                                •••
                            </button>
                        </div>

                        <div class="donut-wrap">
                            <div class="donut">
                                <div>
                                    <strong>
                                        68%
                                    </strong>

                                    <span>
                                        Hukum Bisnis
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="service-list">
                            <div>
                                <span>
                                    <i class="dot d1"></i>
                                    Hukum Bisnis
                                </span>

                                <b>
                                    68%
                                </b>
                            </div>

                            <div>
                                <span>
                                    <i class="dot d2"></i>
                                    Hukum Keluarga
                                </span>

                                <b>
                                    17%
                                </b>
                            </div>

                            <div>
                                <span>
                                    <i class="dot d3"></i>
                                    Hukum Perdata
                                </span>

                                <b>
                                    9%
                                </b>
                            </div>

                            <div>
                                <span>
                                    <i class="dot d4"></i>
                                    Lainnya
                                </span>

                                <b>
                                    6%
                                </b>
                            </div>
                        </div>
                    </article>

                    <!-- Quick Actions -->
                    <article class="card quick-card">
                        <div class="card-header">
                            <div>
                                <h2>
                                    Quick Actions
                                </h2>

                                <p>
                                    Akses menu yang sering digunakan
                                </p>
                            </div>
                        </div>

                        <div class="quick-grid">
                            <a href="#">
                                <span class="quick-icon blue-bg">
                                    ＋
                                </span>

                                <b>
                                    Tambah Lawyer
                                </b>
                            </a>

                            <a href="#">
                                <span class="quick-icon purple-bg">
                                    ▤
                                </span>

                                <b>
                                    Artikel Baru
                                </b>
                            </a>

                            <a href="#">
                                <span class="quick-icon green-bg">
                                    ✓
                                </span>

                                <b>
                                    Booking
                                </b>
                            </a>

                            <a href="#">
                                <span class="quick-icon orange-bg">
                                    ↗
                                </span>

                                <b>
                                    Laporan
                                </b>
                            </a>
                        </div>
                    </article>
                </aside>

            </section>

        </div>

    </main>

</div>

<!-- Overlay mobile -->
<div
    class="sidebar-overlay"
    id="sidebarOverlay"
></div>

<!-- Javascript -->
<script>
    document.addEventListener("DOMContentLoaded", function () {

        const root = document.documentElement;

        const themeToggle =
            document.getElementById("themeToggle");

        const mobileMenu =
            document.getElementById("mobileMenu");

        const sidebarClose =
            document.getElementById("sidebarClose");

        const sidebarOverlay =
            document.getElementById("sidebarOverlay");

        // Load saved theme from localStorage
        const savedTheme =
            localStorage.getItem("admin-theme");

        if (savedTheme === "dark") {

            root.classList.add("dark");
        }

        // Dark mode toggle
        themeToggle?.addEventListener(
            "click",
            function () {

                root.classList.toggle("dark");

                const isDark =
                    root.classList.contains("dark");

                localStorage.setItem(
                    "admin-theme",
                    isDark ? "dark" : "light"
                );

            }
        );

        // Mobile sidebar
        function openSidebar() {

            document.body.classList.add(
                "sidebar-open"
            );
        }

        function closeSidebar() {
            document.body.classList.remove(
                "sidebar-open"
            );
        }

        mobileMenu?.addEventListener(
            "click",
            openSidebar
        );

        sidebarClose?.addEventListener(
            "click",
            closeSidebar
        );

        sidebarOverlay?.addEventListener(
            "click",
            closeSidebar
        );

    });
</script>

</body>
</html>