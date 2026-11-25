<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Jadwal - Lawyer Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/admin/jadwal/jadwal.css') }}">
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

            <a href="{{ route('admin.jadwal.index') }}" class="nav-item active">
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
                    <li><a href="{{ route('admin.role.index') }}" >Data Role</a></li>
                    <li><a href="{{ route('admin.klien.index') }}" >Data Klien</a></li>
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
                    <li><a href="{{ route('admin.layanan.index') }}">Data Layanan</a></li>
                    <li><a href="{{ route('admin.artikel.index') }}">Data Artikel Kegiatan</a></li>
                    <li><a href="{{ route('admin.faq.index') }}">Data FAQ</a></li>
                </ul>
            </div>

            <a href="{{ route('admin.referensi.index') }}" class="nav-item">
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
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <span>/</span>
                <span class="current">Kelola Jadwal</span>
            </div>

            <div class="page-header">
                <div>
                    <h2>Kelola Jadwal</h2>
                    <p>Atur agenda dan penugasan seluruh tim lawyer dalam satu tempat.</p>
                </div>
                <a href="{{ route('admin.jadwal.create') }}" class="btn-maroon">
                    <i class='bx bx-plus'></i>
                    <span>Tambah Jadwal</span>
                </a>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <i class='bx bx-check-circle'></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- 3 SUMMARY CARDS -->
            <section class="summary-grid">
                <div class="summary-card">
                    <span class="summary-label">Jadwal bulan ini</span>
                    <div class="summary-bottom">
                        <strong class="summary-value" id="statMonthlyCount">{{ $stats['monthly_count'] }}</strong>
                        <span class="summary-sub">Sidang, konsultasi &amp; agenda tim</span>
                    </div>
                </div>

                <div class="summary-card">
                    <span class="summary-label">Jadwal hari ini</span>
                    <div class="summary-bottom">
                        <strong class="summary-value">{{ $stats['today_count'] }}</strong>
                        <span class="summary-sub">{{ $stats['today_label'] }}</span>
                    </div>
                </div>

                <div class="summary-card">
                    <span class="summary-label">Lawyer terjadwal</span>
                    <div class="summary-bottom">
                        <strong class="summary-value">{{ $stats['scheduled_lawyers'] }}</strong>
                        <span class="summary-sub">Anggota tim dengan agenda aktif</span>
                    </div>
                </div>
            </section>

            <!-- FILTER BAR -->
            <section class="filter-bar">
                <div class="search-input-box">
                    <input type="text" id="filterSearchInput" placeholder="Cari judul jadwal atau perkara...">
                </div>

                <div class="filter-select-wrapper">
                    <select id="filterLawyerSelect">
                        <option value="all">Semua lawyer</option>
                        @foreach($lawyers as $lawyer)
                            <option value="{{ $lawyer['lawyer_id'] }}">{{ $lawyer['short_name'] }}</option>
                        @endforeach
                    </select>
                    <i class='bx bx-chevron-down'></i>
                </div>

                <div class="filter-select-wrapper">
                    <select id="filterCategorySelect">
                        <option value="all">Semua kategori</option>
                        <option value="Sidang">Sidang</option>
                        <option value="Konsultasi">Konsultasi</option>
                        <option value="Mediasi">Mediasi</option>
                        <option value="Internal">Internal</option>
                    </select>
                    <i class='bx bx-chevron-down'></i>
                </div>

                <div class="filter-select-wrapper filter-month-box">
                    <select id="filterMonthSelect">
                        <option value="2026-10" selected>Bulan</option>
                        <option value="2026-09">September 2026</option>
                        <option value="2026-10">Oktober 2026</option>
                        <option value="2026-11">November 2026</option>
                    </select>
                    <i class='bx bx-chevron-down'></i>
                </div>

                <button type="button" class="btn-reset" id="btnResetFilters">Reset</button>
            </section>

            <!-- SPLIT LAYOUT: KALENDER & DETAIL PANEL -->
            <section class="schedule-split">
                <!-- KIRI: KALENDER -->
                <div class="calendar-card">
                    <div class="calendar-top-toolbar">
                        <h3 id="calendarMonthTitle">Oktober 2026</h3>
                        <div class="calendar-nav-group">
                            <button type="button" class="btn-cal-nav" id="btnPrevMonth" aria-label="Bulan sebelumnya">
                                <i class='bx bx-chevron-left'></i>
                            </button>
                            <button type="button" class="btn-cal-today" id="btnToday">Hari ini</button>
                            <button type="button" class="btn-cal-nav" id="btnNextMonth" aria-label="Bulan berikutnya">
                                <i class='bx bx-chevron-right'></i>
                            </button>
                            <span class="agenda-total-badge" id="calendarAgendaCount">18 agenda</span>
                        </div>
                    </div>

                    <div class="calendar-weekdays">
                        <div>Sen</div>
                        <div>Sel</div>
                        <div>Rab</div>
                        <div>Kam</div>
                        <div>Jum</div>
                        <div>Sab</div>
                        <div>Min</div>
                    </div>

                    <div class="calendar-days-grid" id="adminCalendarGrid">
                        <!-- Di-render dinamis oleh JS -->
                    </div>
                </div>

                <!-- KANAN: PANEL DETAIL HARIAN -->
                <aside class="day-detail-card">
                    <div class="day-detail-header">
                        <h3 id="selectedDayTitle">Selasa, 20 Oktober</h3>
                        <p id="selectedDaySubtitle">3 agenda untuk tim lawyer</p>
                    </div>

                    <div class="day-agenda-list" id="dayAgendaList">
                        <!-- Di-render dinamis oleh JS -->
                    </div>

                    <div class="day-detail-footer">
                        Semua waktu dalam WIB (UTC+7)
                    </div>
                </aside>
            </section>
        </main>
    </div>
</div>

<!-- MODAL DETAIL SINGLE AGENDA (SAAT KLIK "Detail ->") -->
<div class="detail-modal-overlay" id="singleDetailModal">
    <div class="detail-modal-box">
        <div class="detail-modal-header">
            <span class="pill-tag" id="modalCatBadge">Sidang</span>
            <button type="button" class="btn-close-detail" id="btnCloseDetailModal">
                <i class='bx bx-x'></i>
            </button>
        </div>
        <h3 id="modalEvTitle">-</h3>
        <div class="detail-meta-list">
            <div><i class='bx bx-calendar'></i> <span id="modalEvDate">-</span></div>
            <div><i class='bx bx-time-five'></i> <span id="modalEvTime">-</span></div>
            <div><i class='bx bx-user'></i> <span id="modalEvLawyer">-</span></div>
            <div><i class='bx bx-map'></i> <span id="modalEvLocation">-</span></div>
            <div><i class='bx bx-briefcase'></i> <span id="modalEvCase">-</span></div>
        </div>
        <div class="detail-note-box">
            <strong>Catatan Agenda</strong>
            <p id="modalEvDesc">-</p>
        </div>
    </div>
</div>

<script>
    window.ADMIN_SCHEDULES = @json($schedules);
    window.ADMIN_TODAY_DATE = @json($todayDate);
</script>
<script src="{{ asset('js/admin/jadwal.js') }}"></script>
</body>
</html>