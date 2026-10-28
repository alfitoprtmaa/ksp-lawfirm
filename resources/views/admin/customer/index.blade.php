<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Kelola Customer</title>

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    <!-- Pastikan kamu sudah membuat file ini dengan meng-copy dari CSS lawyer -->
    <link rel="stylesheet" href="{{ asset('css/admin/customer/index.css') }}">
</head>

<body>

<div class="admin-shell" id="adminShell">
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">

        <!-- Logo -->
        <div class="brand">
            <div class="brand-mark">
                <img src="{{ asset('images/logo.png') }}" alt="Ketut Surya & Partners">
            </div>

            <div class="brand-text">
                <strong>
                    Dash<span>board</span>
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
            <a href="{{ route('admin.dashboard.index') }}" class="nav-item">
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
            <a href="#" class="nav-item active">
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
            <a href="{{ route('admin.lawyer.index') }}" class="nav-item">
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
            <a href="{{ route('admin.artikel.index') }}" class="nav-item">
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
            <div class="customer-page">
                <div class="customer-heading">
                    <div>
                        <span class="customer-eyebrow">MANAJEMEN PENGGUNA</span>
                        <h1>Kelola Customer</h1>
                        <p>Kelola informasi, kontak, dan alamat customer LegalSpace.</p>
                    </div>
                    <a href="#" class="customer-btn-primary">
                        <span>＋</span> Tambah Customer
                    </a>
                </div>

                <div class="customer-stats">
                    <div class="customer-stat-card">
                        <div class="customer-stat-icon navy-icon">♙</div>
                        <div>
                            <span>Total Customer</span>
                            <h2>45</h2>
                            <small>Seluruh customer terdaftar</small>
                        </div>
                    </div>

                    <div class="customer-stat-card">
                        <div class="customer-stat-icon green-icon">✓</div>
                        <div>
                            <span>Customer Aktif</span>
                            <h2>42</h2>
                            <small>Akun aktif & terverifikasi</small>
                        </div>
                    </div>

                    <div class="customer-stat-card">
                        <div class="customer-stat-icon gray-icon">Ⅱ</div>
                        <div>
                            <span>Customer Nonaktif</span>
                            <h2>3</h2>
                            <small>Akun diblokir / belum verifikasi</small>
                        </div>
                    </div>
                </div>

                <section class="customer-panel">
                    <div class="customer-panel-header">
                        <div>
                            <h2>Daftar Customer</h2>
                            <p>Informasi pelanggan yang terdaftar di sistem.</p>
                        </div>
                        <span class="customer-count">
                            45 customer
                        </span>
                    </div>

                    <form action="#" method="GET" class="customer-filters">
                        <div class="customer-search">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <circle cx="11" cy="11" r="7"></circle>
                                <path d="m16 16 4 4"></path>
                            </svg>
                            <input
                                type="search"
                                name="search"
                                placeholder="Cari nama atau email customer..."
                                value=""
                            >
                        </div>

                        <select name="status" aria-label="Filter status">
                            <option value="">Semua Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>

                        <button type="button" class="customer-btn-filter">Filter</button>
                    </form>

                    <div class="customer-table-wrapper">
                        <table class="customer-table">
                            <thead>
                                <tr>
                                    <th>CUSTOMER</th>
                                    <th>KONTAK</th>
                                    <th>ALAMAT</th>
                                    <th>STATUS</th>
                                    <th class="action-column">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Contoh Baris Data -->
                                <tr>
                                    <td>
                                        <div class="customer-identity">
                                            <div class="customer-avatar">
                                                A
                                            </div>
                                            <div>
                                                <strong>Andi Saputra</strong>
                                                <small>ID: 1001</small>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="customer-contact">
                                            <span>andi.saputra@email.com</span>
                                            <small>081299887766</small>
                                        </div>
                                    </td>

                                    <td>
                                        <p class="customer-summary" title="Jl. Sudirman No. 10, Jakarta Selatan, DKI Jakarta">
                                            Jl. Sudirman No. 10, Jakarta Selatan, DKI Jakarta
                                        </p>
                                    </td>

                                    <td>
                                        <span class="customer-status status-active">
                                            <span></span>
                                            Aktif
                                        </span>
                                    </td>

                                    <td>
                                        <div class="customer-actions">
                                            <a
                                                href="#"
                                                class="action-btn action-view"
                                                title="Lihat detail"
                                                aria-label="Lihat detail customer"
                                            >↗</a>

                                            <a
                                                href="#"
                                                class="action-btn action-edit"
                                                title="Edit customer"
                                                aria-label="Edit customer"
                                            >✎</a>

                                            <button type="button" class="action-btn action-delete" title="Hapus customer" aria-label="Hapus customer">×</button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Contoh Baris Data 2 -->
                                <tr>
                                    <td>
                                        <div class="customer-identity">
                                            <div class="customer-avatar">
                                                R
                                            </div>
                                            <div>
                                                <strong>Rina Melati</strong>
                                                <small>ID: 1002</small>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="customer-contact">
                                            <span>rina.m@email.com</span>
                                            <small>085611223344</small>
                                        </div>
                                    </td>

                                    <td>
                                        <p class="customer-summary" title="Perumahan Indah Asri Blok C2, Bandung, Jawa Barat">
                                            Perumahan Indah Asri Blok C2, Bandung, Jawa Barat
                                        </p>
                                    </td>

                                    <td>
                                        <span class="customer-status status-inactive">
                                            <span></span>
                                            Nonaktif
                                        </span>
                                    </td>

                                    <td>
                                        <div class="customer-actions">
                                            <a
                                                href="#"
                                                class="action-btn action-view"
                                                title="Lihat detail"
                                                aria-label="Lihat detail customer"
                                            >↗</a>

                                            <a
                                                href="#"
                                                class="action-btn action-edit"
                                                title="Edit customer"
                                                aria-label="Edit customer"
                                            >✎</a>

                                            <button type="button" class="action-btn action-delete" title="Hapus customer" aria-label="Hapus customer">×</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </section>
            </div>

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