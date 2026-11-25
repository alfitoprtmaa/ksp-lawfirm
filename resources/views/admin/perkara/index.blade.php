<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsultasi Perkara - Lawyer Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/admin/perkara/konsultasiperkara.css') }}">
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

            <!-- MENU AKTIF: KONSULTASI PERKARA -->
            <a href="{{ route('admin.perkara.index') }}" class="nav-item active">
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

        <main class="content">
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <span>/</span>
                <span class="current">Konsultasi Perkara</span>
            </div>

            <div class="page-header">
                <div>
                    <h2>Konsultasi Perkara</h2>
                    <p>Kelola perkara, seleksi advokat, dan pantau penugasan.</p>
                </div>
                <a href="#" class="btn-maroon">
                    <i class='bx bx-plus'></i>
                    <span>Tambah Perkara</span>
                </a>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <i class='bx bx-check-circle'></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- 4 SUMMARY CARDS -->
            <section class="summary-grid-4">
                <div class="metric-box">
                    <div class="metric-left">
                        <span class="metric-title">Total Perkara</span>
                        <strong class="metric-num">{{ $stats['total'] }}</strong>
                    </div>
                    <span class="metric-tag tag-maroon">Total</span>
                </div>

                <div class="metric-box">
                    <div class="metric-left">
                        <span class="metric-title">Dalam Proses</span>
                        <strong class="metric-num">{{ $stats['in_process'] }}</strong>
                    </div>
                    <span class="metric-tag tag-amber">Aktif</span>
                </div>

                <div class="metric-box">
                    <div class="metric-left">
                        <span class="metric-title">Kategori Perkara</span>
                        <strong class="metric-num">{{ $stats['categories'] }}</strong>
                    </div>
                    <span class="metric-tag tag-blue">Jenis</span>
                </div>

                <div class="metric-box">
                    <div class="metric-left">
                        <span class="metric-title">Selesai</span>
                        <strong class="metric-num">{{ $stats['completed'] }}</strong>
                    </div>
                    <span class="metric-tag tag-emerald">Tuntas</span>
                </div>
            </section>

            <!-- DAFTAR PERKARA TABLE CARD -->
            <section class="table-card">
                <div class="table-toolbar">
                    <div class="table-title-group">
                        <h3>Daftar perkara</h3>
                        <span id="caseCountSubtitle">{{ count($cases) }} perkara</span>
                    </div>

                    <div class="table-controls">
                        <div class="search-wrapper">
                            <i class='bx bx-search'></i>
                            <input type="text" id="searchCaseInput" placeholder="Cari perkara...">
                        </div>

                        <div class="filter-dropdown-wrap">
                            <button type="button" class="btn-filter" id="btnToggleCaseFilter">
                                <i class='bx bx-filter-alt'></i>
                                <span id="activeCategoryLabel">Filter</span>
                            </button>
                            <div class="filter-popover" id="caseFilterPopover">
                                <button type="button" class="filter-opt active" data-cat="all">Semua Kategori</button>
                                <button type="button" class="filter-opt" data-cat="Perdata">Perdata</button>
                                <button type="button" class="filter-opt" data-cat="Bisnis">Bisnis</button>
                                <button type="button" class="filter-opt" data-cat="Keluarga">Keluarga</button>
                                <button type="button" class="filter-opt" data-cat="Pidana">Pidana</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="col-check"><input type="checkbox" aria-label="Pilih semua"></th>
                                <th>Case ID</th>
                                <th>Judul Perkara</th>
                                <th>Klien</th>
                                <th>Advokat</th>
                                <th>Kategori</th>
                                <th>Dibuka</th>
                                <th>Status</th>
                                <th class="text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="casesTableBody">
                            @foreach($cases as $item)
                                @php
                                    $catClass = match($item['category_name']) {
                                        'Perdata'  => 'cat-purple',
                                        'Bisnis'   => 'cat-blue',
                                        'Keluarga' => 'cat-amber',
                                        'Pidana'   => 'cat-rose',
                                        default    => 'cat-blue',
                                    };
                                    $statusClass = $item['booking_status'] === 'Perlu Perbaikan' ? 'status-warning' : 'status-process';
                                @endphp
                                <tr data-search="{{ strtolower($item['case_code'] . ' ' . $item['consultation_title'] . ' ' . $item['applicant_name']) }}"
                                    data-category="{{ $item['category_name'] }}">
                                    <td class="col-check"><input type="checkbox" aria-label="Pilih {{ $item['case_code'] }}"></td>
                                    <td class="text-muted">{{ $item['case_code'] }}</td>
                                    <td class="font-semibold">{{ $item['consultation_title'] }}</td>
                                    <td>{{ $item['applicant_name'] }}</td>
                                    <td class="{{ $item['lawyer_name'] === 'Belum dipilih' ? 'text-muted' : 'font-medium' }}">
                                        {{ $item['lawyer_name'] }}
                                    </td>
                                    <td>
                                        <span class="cat-badge {{ $catClass }}">{{ $item['category_name'] }}</span>
                                    </td>
                                    <td class="text-muted">{{ $item['created_at'] }}</td>
                                    <td>
                                        <span class="status-pill {{ $statusClass }}">{{ $item['booking_status'] }}</span>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.perkara.show', $item['case_code']) }}" class="action-detail-link">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="table-footer">
                    <span id="tableRangeInfo">Menampilkan 1–{{ count($cases) }} dari {{ count($cases) }} perkara</span>
                    <span>Halaman 1 dari 1</span>
                </div>
            </section>
        </main>
    </div>
</div>

<script src="{{ asset('js/admin/konsultasiperkara.js') }}"></script>
</body>
</html>