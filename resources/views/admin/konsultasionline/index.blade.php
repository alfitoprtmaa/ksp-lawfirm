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
    
    <link rel="stylesheet" href="{{ asset('css/admin/konsultasi/konsultasionline.css') }}">
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

            <a href="{{ route('admin.konsultasionline.index') }}" class="nav-item active">
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
                <a href="{{ route('admin.dashboard') }}">Halaman Utama</a>
                <span>/</span>
                <span class="current">Konsultasi Perkara</span>
            </div>

            <div class="page-header">
                <div>
                    <h2>Konsultasi Perkara</h2>
                    <p>Pantau pemesanan konsultasi online gratis dan jadwal pertemuan.</p>
                </div>
                <button type="button" class="btn-maroon" id="btnOpenAvailabilityModal">
                    Atur ketersediaan
                </button>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <i class='bx bx-check-circle'></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="alert-error">
                    <i class='bx bx-error-circle'></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <!-- 3 SUMMARY CARDS -->
            <section class="summary-grid">
                <div class="summary-card">
                    <span class="summary-label">Konsultasi terjadwal</span>
                    <strong class="summary-value">{{ $stats['scheduled_total'] }}</strong>
                    <span class="summary-sub">{{ $stats['today_sessions'] }} sesi berlangsung hari ini</span>
                </div>

                <div class="summary-card">
                    <span class="summary-label">Slot tersedia hari ini</span>
                    <strong class="summary-value">{{ $stats['available_slots'] }}</strong>
                    <span class="summary-sub">Durasi {{ $stats['slot_duration'] }} menit per sesi</span>
                </div>

                <div class="summary-card">
                    <span class="summary-label">Konsultasi selesai</span>
                    <strong class="summary-value">{{ $stats['completed_total'] }}</strong>
                    <span class="summary-sub">{{ $stats['period_label'] }}</span>
                </div>
            </section>

            <!-- INFO BANNER MAROON SOFT -->
            <div class="info-banner-maroon">
                <strong>Konsultasi online gratis &bull; link meeting otomatis</strong>
                <p>Klien memilih slot, lalu menerima jadwal dan link pertemuan melalui email, tanpa pembayaran.</p>
            </div>

            <!-- DAFTAR KONSULTASI CARD -->
            <section class="table-card">
                <div class="table-card-top">
                    <h3>Daftar konsultasi</h3>
                    <div class="status-filter-wrapper">
                        <select id="statusFilterSelect" aria-label="Filter status">
                            <option value="all">Semua status</option>
                            <option value="Terkirim">Terkirim</option>
                            <option value="Menunggu">Menunggu</option>
                        </select>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                </div>

                <div class="table-filter-row">
                    <div class="search-box">
                        <input type="text" id="searchConsultationInput" placeholder="Cari judul atau email klien...">
                    </div>
                    <div class="period-badge-box">
                        10–30 November 2026
                    </div>
                </div>

                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>JUDUL / KLIEN</th>
                                <th>JADWAL</th>
                                <th>DURASI</th>
                                <th>STATUS EMAIL</th>
                                <th class="text-right">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="consultationTableBody">
                            <!-- Di-render dinamis oleh JS agar pagination & filter instan -->
                        </tbody>
                    </table>
                </div>

                <div class="table-footer">
                    <span id="paginationInfoText">Menampilkan 4 dari {{ count($consultations) }} konsultasi</span>
                    <div class="pagination-buttons">
                        <button type="button" class="btn-page" id="btnPrevPage">Sebelumnya</button>
                        <button type="button" class="btn-page" id="btnNextPage">Berikutnya</button>
                    </div>
                </div>
            </section>

            <div class="bottom-disclaimer">
                Konsultasi gratis &bull; Identitas penanggung jawab tidak ditampilkan kepada klien &bull; Semua jadwal dalam WIB
            </div>
        </main>
    </div>
</div>

<!-- ==================== MODAL POP-UP: ATUR KETERSEDIAAN ==================== -->
<div class="modal-overlay" id="availabilityModal" aria-hidden="true">
    <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="modalAvailabilityTitle">
        <div class="modal-header">
            <div>
                <h3 id="modalAvailabilityTitle">Atur ketersediaan</h3>
                <p>Atur slot konsultasi online gratis yang dapat dipesan klien.</p>
            </div>
            <button type="button" class="btn-modal-close" id="btnCloseAvailabilityModal" aria-label="Tutup">
                <i class='bx bx-x'></i>
            </button>
        </div>

        <form action="{{ route('admin.konsultasi.availability') }}" method="POST" id="availabilityForm">
            @csrf
            <div class="modal-body">
                <!-- Periode Ketersediaan -->
                <div class="form-group">
                    <label>Periode ketersediaan</label>
                    <div class="range-input-row">
                        <input
                            type="date"
                            name="start_date"
                            id="availStartDate"
                            class="form-control"
                            value="{{ $availability['start_date'] }}"
                            required
                        >
                        <span class="range-sep">-</span>
                        <input
                            type="date"
                            name="end_date"
                            id="availEndDate"
                            class="form-control"
                            value="{{ $availability['end_date'] }}"
                            required
                        >
                    </div>
                </div>

                <!-- Hari Tersedia (Sen - Min) -->
                <div class="form-group">
                    <label>Hari tersedia</label>
                    <div class="days-selector-grid" id="daysSelectorGrid">
                        @foreach(['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'] as $day)
                            @php $active = in_array($day, $availability['days']); @endphp
                            <label class="day-pill-option {{ $active ? 'active' : '' }}">
                                <input type="checkbox" name="days[]" value="{{ $day }}" {{ $active ? 'checked' : '' }}>
                                <span>{{ $day }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Jam Tersedia -->
                <div class="form-group">
                    <div class="label-between">
                        <label>Jam tersedia</label>
                        <span class="timezone-note">Zona waktu: WIB (UTC+7)</span>
                    </div>

                    <div class="time-headers">
                        <span>Mulai</span>
                        <span>Selesai</span>
                        <span></span>
                    </div>

                    <div class="time-ranges-list" id="timeRangesList">
                        @foreach($availability['time_slots'] as $slot)
                            <div class="time-range-row">
                                <div class="select-wrapper">
                                    <select name="start_times[]" class="form-control time-start-select">
                                        @foreach(['08.00', '09.00', '10.00', '11.00', '13.00', '14.00', '15.00', '16.00'] as $t)
                                            @php $val = str_replace('.', ':', $t); @endphp
                                            <option value="{{ $val }}" {{ $slot['start'] === $val ? 'selected' : '' }}>{{ $t }}</option>
                                        @endforeach
                                    </select>
                                    <i class='bx bx-chevron-down'></i>
                                </div>

                                <span class="range-sep">-</span>

                                <div class="select-wrapper">
                                    <select name="end_times[]" class="form-control time-end-select">
                                        @foreach(['09.00', '10.00', '11.00', '12.00', '14.00', '15.00', '16.00', '17.00'] as $t)
                                            @php $val = str_replace('.', ':', $t); @endphp
                                            <option value="{{ $val }}" {{ $slot['end'] === $val ? 'selected' : '' }}>{{ $t }}</option>
                                        @endforeach
                                    </select>
                                    <i class='bx bx-chevron-down'></i>
                                </div>

                                <button type="button" class="btn-remove-range">Hapus</button>
                            </div>
                        @endforeach
                    </div>

                    <button type="button" class="btn-add-range" id="btnAddTimeRange">
                        + Tambah rentang waktu
                    </button>
                </div>

                <!-- Durasi Per Sesi -->
                <div class="form-group">
                    <label for="durationSelect">Durasi per sesi</label>
                    <div class="duration-summary-row">
                        <div class="select-wrapper duration-select-box">
                            <select name="duration" id="durationSelect" class="form-control">
                                <option value="15" {{ $availability['duration'] == 15 ? 'selected' : '' }}>15 menit</option>
                                <option value="30" {{ $availability['duration'] == 30 ? 'selected' : '' }}>30 menit</option>
                                <option value="45" {{ $availability['duration'] == 45 ? 'selected' : '' }}>45 menit</option>
                                <option value="60" {{ $availability['duration'] == 60 ? 'selected' : '' }}>60 menit</option>
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>

                        <div class="slot-summary-pill" id="slotSummaryPill">
                            8 slot per hari &bull; Senin–Jum
                        </div>
                    </div>
                    <p class="helper-note">Jadwal yang sudah dipesan tidak akan berubah.</p>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-cancel" id="btnCancelAvailabilityModal">Batal</button>
                <button type="submit" class="btn-maroon btn-save">Simpan ketersediaan</button>
            </div>
        </form>
    </div>
</div>

<!-- ==================== MODAL LIHAT DETAIL KONSULTASI ==================== -->
<div class="modal-overlay" id="consultationDetailModal" aria-hidden="true">
    <div class="modal-box detail-modal-sm" role="dialog" aria-modal="true">
        <div class="modal-header">
            <div>
                <h3 id="detailConsultTitle">-</h3>
                <p id="detailConsultClient">-</p>
            </div>
            <button type="button" class="btn-modal-close" id="btnCloseConsultDetail">
                <i class='bx bx-x'></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="detail-info-grid">
                <div><span>Jadwal</span><strong id="detailConsultSchedule">-</strong></div>
                <div><span>Durasi</span><strong id="detailConsultDuration">-</strong></div>
                <div><span>Status Email</span><strong id="detailConsultEmailStatus">-</strong></div>
                <div>
                    <span>Link Meeting Otomatis</span>
                    <a href="#" target="_blank" id="detailConsultMeetLink" class="meet-link-text">-</a>
                </div>
            </div>
            <div class="detail-desc-box">
                <span>Topik / Keluhan Klien</span>
                <p id="detailConsultDesc">-</p>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-maroon" id="btnOkConsultDetail">Tutup</button>
        </div>
    </div>
</div>

<script>
    window.ONLINE_CONSULTATIONS = @json($consultations);
</script>
<script src="{{ asset('js/admin/konsultasionline.js') }}"></script>
</body>
</html>