<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Lawyer Admin</title>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
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
            <a href="{{ route('admin.dashboard') }}" class="nav-item active">
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

            <!-- MENU AKTIF: KONSULTASI PERKARA -->
            <a href="{{ route('admin.perkara.index') }}" class="nav-item ">
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

        <!-- Ornamen Pilar Bawah Sidebar -->
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

    <!-- MAIN CONTENT -->
    <div class="main-wrapper">
        <!-- TOPBAR -->
        <header class="topbar">
            <button class="menu-toggle" aria-label="Toggle Menu">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </button>

            <div class="topbar-actions">
                <button class="notif-btn" aria-label="Notifikasi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                    <span class="notif-dot"></span>
                </button>
                <div class="topbar-divider"></div>
                <div class="user-profile">
                    <div class="avatar">{{ $admin['initial'] }}</div>
                    <span class="user-name">{{ $admin['full_name'] }}</span>
                    <svg class="chevron-dark" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </div>
            </div>
        </header>

        <!-- DASHBOARD CONTENT -->
        <main class="content">
            <div class="breadcrumb">
                <span>Halaman Utama</span> / <span class="current">Dashboard</span>
            </div>

            <div class="page-header">
                <div>
                    <h2>Dashboard</h2>
                    <p>Selamat datang, {{ $admin['full_name'] }}. Berikut ringkasan aktivitas sistem.</p>
                </div>

                <!-- Dropdown Pemilih Bulan yang Berfungsi -->
                <div class="date-dropdown-wrapper" id="dateDropdown">
                    <button type="button" class="date-filter-btn" id="dateFilterBtn" aria-expanded="false">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <span>{{ $selectedMonthLabel }}</span>
                        <svg class="chevron-sm" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>

                    <div class="date-dropdown-menu" id="dateDropdownMenu">
                        @foreach($availableMonths as $monthKey => $monthLabel)
                            <a href="{{ route('admin.dashboard', ['month' => $monthKey]) }}"
                               class="date-option {{ $selectedMonth === $monthKey ? 'active' : '' }}">
                                <span>{{ $monthLabel }}</span>
                                @if($selectedMonth === $monthKey)
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- METRIC CARDS -->
            <section class="metrics-grid">
                <div class="metric-card">
                    <div class="metric-icon icon-maroon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Total Advokat</span>
                        <strong class="metric-value">{{ $metrics['total_lawyers'] }}</strong>
                        <span class="metric-sub">{{ $metrics['active_lawyers'] }} advokat aktif</span>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-icon icon-indigo">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Konsultasi Bulan Ini</span>
                        <strong class="metric-value">{{ $metrics['monthly_consultations'] }}</strong>
                        <span class="metric-sub text-green">↑ {{ $metrics['consultation_growth'] }} dari Oktober</span>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-icon icon-amber">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Perlu Konfirmasi</span>
                        <strong class="metric-value">{{ $metrics['pending_confirmations'] }}</strong>
                        <span class="metric-sub">Menunggu persetujuan</span>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-icon icon-emerald">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Konsultasi Selesai</span>
                        <strong class="metric-value">{{ $metrics['completed_consultations'] }}</strong>
                        <span class="metric-sub">{{ $metrics['completion_rate'] }} dari total konsultasi</span>
                    </div>
                </div>
            </section>

            <!-- CHART & SCHEDULE SECTION -->
            <section class="middle-grid">
                <!-- Bar Chart -->
                <div class="card chart-card">
                    <div class="card-header">
                        <h3>Tren Konsultasi</h3>
                        <p>Jumlah konsultasi per bulan · Juni–November 2026</p>
                    </div>

                    <div class="chart-container">
                        <div class="y-axis">
                            <span>160</span>
                            <span>120</span>
                            <span>80</span>
                            <span>40</span>
                            <span>0</span>
                        </div>
                        <div class="bars-area">
                            <div class="grid-lines">
                                <div></div><div></div><div></div><div></div><div></div>
                            </div>
                            <div class="bars-wrapper">
                                @foreach($consultationTrends as $trend)
                                    <div class="bar-column">
                                        <span class="bar-value {{ $trend['is_current'] ? 'highlight-text' : '' }}">{{ $trend['count'] }}</span>
                                        <div class="bar {{ $trend['is_current'] ? 'bar-active' : '' }}" style="height: {{ $trend['percentage'] }}%;"></div>
                                        <span class="bar-label {{ $trend['is_current'] ? 'highlight-text' : '' }}">{{ $trend['month'] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card-footer-note">
                        <span>{{ $selectedTrendNote }}</span>
                        <span class="text-muted">Contoh data</span>
                    </div>
                </div>

                <!-- Jadwal Terdekat (Proporsional & Sejajar) -->
                <div class="card schedule-card">
                    <div class="card-header">
                        <h3>Jadwal Terdekat</h3>
                        <p>{{ $scheduleDate }}</p>
                    </div>

                    <div class="schedule-list">
                        @foreach($upcomingSchedules as $schedule)
                            <div class="schedule-item">
                                <div class="time-badge">{{ $schedule['time'] }}</div>
                                <div class="schedule-details">
                                    <h4>{{ $schedule['event_title'] }}</h4>
                                    <p>{{ $schedule['lawyer_name'] }} · {{ $schedule['event_type'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="card-footer-note">
                        <span>{{ count($upcomingSchedules) }} jadwal terjadwal hari ini</span>
                        <a href="#" class="schedule-footer-link">
                            <span>Lihat kalender</span>
                            <i class='bx bx-right-arrow-alt'></i>
                        </a>
                    </div>
                </div>
            </section>

            <!-- TABLE PERKARA TERBARU -->
            <section class="card table-card">
                <div class="table-header">
                    <h3>Perkara Terbaru</h3>
                    <a href="#" class="view-all-link">
                        <span>Lihat semua</span>
                        <i class='bx bx-right-arrow-alt'></i>
                    </a>
                </div>

                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="col-check"><input type="checkbox" aria-label="Pilih semua"></th>
                                <th>Case ID</th>
                                <th>Judul Perkara</th>
                                <th>Klien</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Dibuka</th>
                                <th class="text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentCases as $case)
                                <tr>
                                    <td class="col-check"><input type="checkbox" aria-label="Pilih {{ $case['case_code'] }}"></td>
                                    <td class="text-muted">{{ $case['case_code'] }}</td>
                                    <td class="font-semibold">{{ $case['consultation_title'] }}</td>
                                    <td>{{ $case['applicant_name'] }}</td>
                                    <td>{{ $case['category_name'] }}</td>
                                    <td>
                                        <span class="status-badge status-process">{{ $case['booking_status'] }}</span>
                                    </td>
                                    <td class="text-muted">{{ $case['created_at'] }}</td>
                                    <td class="text-right">
                                        <a href="#" class="action-link">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="table-footer">
                    <span>Menampilkan {{ count($recentCases) }} dari {{ count($recentCases) }} data</span>
                    <span>Diurutkan berdasarkan tanggal dibuka terbaru</span>
                </div>
            </section>
        </main>
    </div>
</div>

<script src="{{ asset('js/admin/dashboard.js') }}"></script>
</body>
</html>