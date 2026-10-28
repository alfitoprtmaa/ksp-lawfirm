@php
    $articles = [
        [
            'id' => 1,
            'title' => 'Pentingnya Perjanjian Bisnis dalam Kerja Sama Perusahaan',
            'category' => 'Hukum Bisnis',
            'author' => 'Admin',
            'date' => '08 Okt 2026',
            'status' => 'Terbit',
            'views' => 1248,
            'initials' => 'PB',
        ],
        [
            'id' => 2,
            'title' => 'Memahami Hak dan Kewajiban dalam Kontrak Kerja',
            'category' => 'Hukum Ketenagakerjaan',
            'author' => 'Admin',
            'date' => '06 Okt 2026',
            'status' => 'Terbit',
            'views' => 856,
            'initials' => 'HK',
        ],
        [
            'id' => 3,
            'title' => 'Langkah Hukum dalam Menyelesaikan Sengketa Bisnis',
            'category' => 'Litigasi',
            'author' => 'Admin',
            'date' => '05 Okt 2026',
            'status' => 'Draft',
            'views' => 0,
            'initials' => 'SH',
        ],
        [
            'id' => 4,
            'title' => 'Panduan Mendirikan Badan Usaha di Indonesia',
            'category' => 'Legalitas Usaha',
            'author' => 'Admin',
            'date' => '03 Okt 2026',
            'status' => 'Terbit',
            'views' => 642,
            'initials' => 'BU',
        ],
        [
            'id' => 5,
            'title' => 'Mengenal Proses Mediasi dalam Sengketa Perdata',
            'category' => 'Mediasi',
            'author' => 'Admin',
            'date' => '01 Okt 2026',
            'status' => 'Review',
            'views' => 0,
            'initials' => 'PM',
        ],
    ];
@endphp

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Artikel</title>

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin/artikel/index.css') }}">
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
            <a href="#" class="nav-item active">
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

                <!-- {{-- Notification --}}
                <button
                    class="icon-button notification-button"
                    title="Notifikasi"
                >
                    <svg viewBox="0 0 24 24">
                        <path d="M18 9a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"/>
                        <path d="M10 21h4"/>
                    </svg>

                    <span></span>
                </button> -->

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
        <div class="article-page">

            {{-- Page Heading --}}
            <div class="article-heading">
                <div>
                    <p class="article-eyebrow">WEBSITE MANAGEMENT</p>
                    <h1>Manajemen Artikel</h1>
                    <p class="article-description">
                        Kelola artikel dan informasi hukum untuk pengunjung website.
                    </p>
                </div>

                <a href="{{ url('/admin/artikel/create') }}" class="article-primary-btn">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 5v14M5 12h14"/>
                    </svg>
                    Tambah Artikel
                </a>
            </div>

            {{-- Statistics --}}
            <div class="article-stats">
                <div class="article-stat-card">
                    <div class="article-stat-top">
                        <span>Total Artikel</span>
                        <span class="article-stat-icon navy-icon">▤</span>
                    </div>
                    <strong>{{ count($articles) }}</strong>
                    <small>Artikel tersimpan</small>
                </div>

                <div class="article-stat-card">
                    <div class="article-stat-top">
                        <span>Artikel Terbit</span>
                        <span class="article-stat-icon green-icon">✓</span>
                    </div>
                    <strong>{{ count(array_filter($articles, fn($a) => $a['status'] === 'Terbit')) }}</strong>
                    <small>Ditampilkan di website</small>
                </div>

                <div class="article-stat-card">
                    <div class="article-stat-top">
                        <span>Draft</span>
                        <span class="article-stat-icon orange-icon">✎</span>
                    </div>
                    <strong>{{ count(array_filter($articles, fn($a) => $a['status'] === 'Draft')) }}</strong>
                    <small>Belum dipublikasikan</small>
                </div>

                <div class="article-stat-card">
                    <div class="article-stat-top">
                        <span>Menunggu Review</span>
                        <span class="article-stat-icon purple-icon">◷</span>
                    </div>
                    <strong>{{ count(array_filter($articles, fn($a) => $a['status'] === 'Review')) }}</strong>
                    <small>Perlu ditinjau</small>
                </div>
            </div>

            {{-- Article Table --}}
            <div class="article-panel">
                <div class="article-panel-heading">
                    <div>
                        <h2>Semua Artikel</h2>
                        <p>Daftar artikel yang tersimpan di sistem.</p>
                    </div>
                    <span class="article-total">{{ count($articles) }} artikel</span>
                </div>

                {{-- Search & Filter --}}
                <div class="article-toolbar">
                    <label class="article-search">
                        <svg viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="7"/>
                            <path d="m16 16 4 4"/>
                        </svg>
                        <input type="search" id="articleSearch"
                            placeholder="Cari judul atau kategori...">
                    </label>

                    <select id="articleStatus" class="article-filter">
                        <option value="">Semua Status</option>
                        <option value="terbit">Terbit</option>
                        <option value="draft">Draft</option>
                        <option value="review">Review</option>
                    </select>

                    <select id="articleCategory" class="article-filter">
                        <option value="">Semua Kategori</option>
                        <option value="Hukum Bisnis">Hukum Bisnis</option>
                        <option value="Hukum Ketenagakerjaan">Hukum Ketenagakerjaan</option>
                        <option value="Litigasi">Litigasi</option>
                        <option value="Legalitas Usaha">Legalitas Usaha</option>
                        <option value="Mediasi">Mediasi</option>
                    </select>
                </div>

                {{-- Table --}}
                <div class="article-table-wrap">
                    <table class="article-table" id="articleTable">
                        <thead>
                            <tr>
                                <th>ARTIKEL</th>
                                <th>KATEGORI</th>
                                <th>PENULIS</th>
                                <th>TANGGAL</th>
                                <th>STATUS</th>
                                <th>DILIHAT</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($articles as $article)
                            <tr data-status="{{ strtolower($article['status']) }}"
                                data-category="{{ $article['category'] }}">
                                <td>
                                    <div class="article-title-cell">
                                        <div class="article-thumbnail">
                                            {{ $article['initials'] }}
                                        </div>
                                        <div>
                                            <strong>{{ $article['title'] }}</strong>
                                            <small>ID artikel #{{ str_pad($article['id'], 3, '0', STR_PAD_LEFT) }}</small>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <span class="article-category">
                                        {{ $article['category'] }}
                                    </span>
                                </td>

                                <td>{{ $article['author'] }}</td>
                                <td>{{ $article['date'] }}</td>

                                <td>
                                    <span class="article-status {{ strtolower($article['status']) }}">
                                        <span></span>
                                        {{ $article['status'] }}
                                    </span>
                                </td>

                                <td>{{ number_format($article['views'], 0, ',', '.') }}</td>

                                <td>
                                    <div class="article-actions">
                                        <a href="{{ url('/admin/artikel/'.$article['id'].'/edit') }}"
                                        class="article-action edit-action"
                                        title="Edit artikel" aria-label="Edit artikel">
                                            <svg viewBox="0 0 24 24">
                                                <path d="m15 5 4 4M4 20l4-.8L19 8a2.8 2.8 0 0 0-4-4L4 15z"/>
                                            </svg>
                                        </a>

                                        <button type="button"
                                                class="article-action delete-action"
                                                data-id="{{ $article['id'] }}"
                                                data-title="{{ $article['title'] }}"
                                                title="Hapus artikel"
                                                aria-label="Hapus artikel">
                                            <svg viewBox="0 0 24 24">
                                                <path d="M3 6h18M8 6V4h8v2m3 0-1 14H6L5 6m4 4v6m6-6v6"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            <tr id="articleEmpty" hidden>
                                <td colspan="7" class="article-empty">
                                    Artikel tidak ditemukan.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Pagination UI --}}
                <div class="article-pagination">
                    <span>Menampilkan <strong id="visibleArticles">{{ count($articles) }}</strong> dari {{ count($articles) }} artikel</span>
                    <div>
                        <button type="button" disabled>‹</button>
                        <button type="button" class="current-page">1</button>
                        <button type="button" disabled>›</button>
                    </div>
                </div>
            </div>

        </div>

        {{-- Delete confirmation --}}
        <div class="article-modal" id="deleteArticleModal" aria-hidden="true">
            <div class="article-modal-box" role="dialog" aria-modal="true"
                aria-labelledby="deleteArticleTitle">
                <div class="article-modal-icon">!</div>
                <h2 id="deleteArticleTitle">Hapus Artikel?</h2>
                <p>Apakah kamu yakin ingin menghapus artikel ini?</p>
                <strong id="deleteArticleName"></strong>

                <div class="article-modal-actions">
                    <button type="button" id="cancelDelete" class="article-cancel-btn">
                        Batal
                    </button>
                    <button type="button" id="confirmDelete" class="article-confirm-btn">
                        Hapus
                    </button>
                </div>
            </div>
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

    document.addEventListener('DOMContentLoaded', function () {
        const search = document.getElementById('articleSearch');
        const status = document.getElementById('articleStatus');
        const category = document.getElementById('articleCategory');
        const rows = [...document.querySelectorAll('#articleTable tbody tr[data-status]')];
        const empty = document.getElementById('articleEmpty');
        const visibleCount = document.getElementById('visibleArticles');

        function filterArticles() {
            const query = search.value.toLowerCase().trim();
            let count = 0;

            rows.forEach(row => {
                const matchesText = row.innerText.toLowerCase().includes(query);
                const matchesStatus = !status.value || row.dataset.status === status.value;
                const matchesCategory = !category.value || row.dataset.category === category.value;
                const visible = matchesText && matchesStatus && matchesCategory;

                row.hidden = !visible;
                if (visible) count++;
            });

            empty.hidden = count !== 0;
            visibleCount.textContent = count;
        }

        [search, status, category].forEach(input => {
            input.addEventListener('input', filterArticles);
            input.addEventListener('change', filterArticles);
        });

        const modal = document.getElementById('deleteArticleModal');
        const articleName = document.getElementById('deleteArticleName');
        let selectedRow = null;

        document.querySelectorAll('.delete-action').forEach(button => {
            button.addEventListener('click', function () {
                selectedRow = this.closest('tr');
                articleName.textContent = this.dataset.title;
                modal.classList.add('show');
                modal.setAttribute('aria-hidden', 'false');
            });
        });

        function closeModal() {
            modal.classList.remove('show');
            modal.setAttribute('aria-hidden', 'true');
            selectedRow = null;
        }

        document.getElementById('cancelDelete').addEventListener('click', closeModal);

        document.getElementById('confirmDelete').addEventListener('click', function () {
            if (selectedRow) {
                selectedRow.remove();
                filterArticles();
            }
            closeModal();
        });

        modal.addEventListener('click', function (event) {
            if (event.target === modal) closeModal();
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') closeModal();
        });
    });
</script>

</body>
</html>