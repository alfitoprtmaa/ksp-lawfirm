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
    <link rel="stylesheet" href="{{ asset('css/admin/lawyer/index.css') }}">
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
            <a href="{{ route('admin.customer.index') }}" class="nav-item">
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
            <a href="#" class="nav-item active">
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
            <div class="lawyer-page">
                <div class="lawyer-heading">
                    <div>
                        <span class="lawyer-eyebrow">MANAJEMEN PENGGUNA</span>
                        <h1>Kelola Lawyer</h1>
                        <p>Kelola informasi, spesialisasi, dan status lawyer LegalSpace.</p>
                    </div>
                    <a href="#" class="lawyer-btn-primary">
                        <span>＋</span> Tambah Lawyer
                    </a>
                </div>

                <div class="lawyer-stats">
                    <div class="lawyer-stat-card">
                        <div class="lawyer-stat-icon navy-icon">♙</div>
                        <div>
                            <span>Total Lawyer</span>
                            <h2>10</h2>
                            <small>Seluruh lawyer terdaftar</small>
                        </div>
                    </div>

                    <div class="lawyer-stat-card">
                        <div class="lawyer-stat-icon green-icon">✓</div>
                        <div>
                            <span>Lawyer Aktif</span>
                            <h2>8</h2>
                            <small>Siap menerima konsultasi</small>
                        </div>
                    </div>

                    <div class="lawyer-stat-card">
                        <div class="lawyer-stat-icon gray-icon">Ⅱ</div>
                        <div>
                            <span>Lawyer Nonaktif</span>
                            <h2>2</h2>
                            <small>Tidak tersedia sementara</small>
                        </div>
                    </div>
                </div>

                <section class="lawyer-panel">
                    <div class="lawyer-panel-header">
                        <div>
                            <h2>Daftar Lawyer</h2>
                            <p>Informasi lawyer yang terdaftar di sistem.</p>
                        </div>
                        <span class="lawyer-count">
                            10 lawyer
                        </span>
                    </div>

                    <form action="#" method="GET" class="lawyer-filters">
                        <div class="lawyer-search">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <circle cx="11" cy="11" r="7"></circle>
                                <path d="m16 16 4 4"></path>
                            </svg>
                            <input
                                type="search"
                                name="search"
                                placeholder="Cari nama atau email lawyer..."
                                value=""
                            >
                        </div>

                        <select name="status" aria-label="Filter status">
                            <option value="">Semua Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>

                        <button type="button" class="lawyer-btn-filter">Filter</button>
                    </form>

                    <div class="lawyer-table-wrapper">
                        <table class="lawyer-table">
                            <thead>
                                <tr>
                                    <th>LAWYER</th>
                                    <th>KONTAK</th>
                                    <th>SPESIALISASI</th>
                                    <th>RANGKUMAN PROFIL</th>
                                    <th>STATUS</th>
                                    <th class="action-column">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Contoh Baris Data -->
                                <tr>
                                    <td>
                                        <div class="lawyer-identity">
                                            <div class="lawyer-avatar">
                                                B
                                            </div>
                                            <div>
                                                <strong>Budi Santoso, S.H.</strong>
                                                <small>ID: 1</small>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="lawyer-contact">
                                            <span>budi.santoso@email.com</span>
                                            <small>081234567890</small>
                                        </div>
                                    </td>

                                    <td>
                                        <span class="lawyer-specialty">
                                            Hukum Perusahaan
                                        </span>
                                    </td>

                                    <td>
                                        <p class="lawyer-summary" title="Berpengalaman 10 tahun menangani kontrak.">
                                            Berpengalaman 10 tahun menangani kontrak.
                                        </p>
                                    </td>

                                    <td>
                                        <span class="lawyer-status status-active">
                                            <span></span>
                                            Aktif
                                        </span>
                                    </td>

                                    <td>
                                        <div class="lawyer-actions">
                                            <a
                                                href="#"
                                                class="action-btn action-view"
                                                title="Lihat detail"
                                                aria-label="Lihat detail lawyer"
                                            >↗</a>

                                            <a
                                                href="#"
                                                class="action-btn action-edit"
                                                title="Edit lawyer"
                                                aria-label="Edit lawyer"
                                            >✎</a>

                                            <button type="button" class="action-btn action-delete" title="Hapus lawyer" aria-label="Hapus lawyer">×</button>
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