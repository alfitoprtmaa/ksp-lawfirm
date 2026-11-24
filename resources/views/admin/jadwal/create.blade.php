<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal - Lawyer Admin</title>
    
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

            <div class="nav-group">
                <button type="button" class="nav-item has-dropdown">
                    <div class="nav-label">
                        <i class='bx bx-video nav-icon'></i>
                        <span>Kelola Konsultasi</span>
                    </div>
                    <i class='bx bx-chevron-down chevron'></i>
                </button>
                <ul class="submenu">
                    <li><a href="#">Konsultasi Online</a></li>
                    <li><a href="#">Jadwal Konsultasi</a></li>
                </ul>
            </div>

            <a href="#" class="nav-item">
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
                    <li><a href="#">Data Advokat</a></li>
                    <li><a href="#">Data Role</a></li>
                    <li><a href="#">Data Pengguna</a></li>
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

        <!-- FORM CONTENT -->
        <main class="content">
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <span>/</span>
                <a href="{{ route('admin.jadwal.index') }}">Kelola Jadwal</a>
                <span>/</span>
                <span class="current">Tambah Jadwal</span>
            </div>

            <div class="page-header">
                <div>
                    <h2>Tambah Jadwal</h2>
                    <p>Buat agenda baru dan tentukan lawyer yang bertugas.</p>
                </div>
                <a href="{{ route('admin.jadwal.index') }}" class="btn-back">
                    <i class='bx bx-left-arrow-alt'></i>
                    <span>Kembali</span>
                </a>
            </div>

            @if ($errors->any())
                <div class="alert-error">
                    <i class='bx bx-error-circle'></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('admin.jadwal.store') }}" method="POST" id="createScheduleForm">
                @csrf
                <div class="create-schedule-grid">
                    <!-- KIRI: INFORMASI JADWAL -->
                    <div class="form-card">
                        <div class="form-card-header">
                            <h3>Informasi Jadwal</h3>
                            <p>Lengkapi detail agenda untuk tim Anda.</p>
                        </div>

                        <div class="form-group">
                            <label for="event_title">Judul jadwal *</label>
                            <input
                                type="text"
                                id="event_title"
                                name="event_title"
                                class="form-control"
                                value="{{ old('event_title', 'Sidang pemeriksaan saksi') }}"
                                placeholder="Masukkan judul agenda jadwal"
                                required
                            >
                        </div>

                        <div class="form-row-2">
                            <div class="form-group">
                                <label for="event_type">Kategori *</label>
                                <div class="select-wrapper">
                                    <select id="event_type" name="event_type" class="form-control" required>
                                        <option value="Sidang" selected>Sidang</option>
                                        <option value="Konsultasi">Konsultasi</option>
                                        <option value="Mediasi">Mediasi</option>
                                        <option value="Internal">Internal</option>
                                    </select>
                                    <i class='bx bx-chevron-down'></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="case_code">Perkara terkait (opsional)</label>
                                <div class="select-wrapper">
                                    <select id="case_code" name="case_code" class="form-control">
                                        <option value="">Tanpa perkara</option>
                                        @foreach($bookings as $booking)
                                            <option value="{{ $booking['case_code'] }}" {{ $booking['case_code'] === 'CASE-001' ? 'selected' : '' }}>
                                                {{ $booking['case_code'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <i class='bx bx-chevron-down'></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="schedule_date">Tanggal *</label>
                            <div class="select-wrapper">
                                <input
                                    type="date"
                                    id="schedule_date"
                                    name="schedule_date"
                                    class="form-control"
                                    value="{{ old('schedule_date', '2026-10-21') }}"
                                    required
                                >
                            </div>
                        </div>

                        <div class="form-row-2">
                            <div class="form-group">
                                <label for="start_time">Waktu mulai *</label>
                                <div class="select-wrapper">
                                    <select id="start_time" name="start_time" class="form-control" required>
                                        @foreach(['08:00', '08:30', '09:00', '09:30', '10:00', '11:00', '13:00', '14:00', '15:00', '16:00'] as $time)
                                            <option value="{{ $time }}" {{ $time === '09:00' ? 'selected' : '' }}>{{ $time }}</option>
                                        @endforeach
                                    </select>
                                    <i class='bx bx-chevron-down'></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="end_time">Waktu selesai *</label>
                                <div class="select-wrapper">
                                    <select id="end_time" name="end_time" class="form-control" required>
                                        @foreach(['10:00', '10:30', '11:00', '11:30', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'] as $time)
                                            <option value="{{ $time }}" {{ $time === '11:00' ? 'selected' : '' }}>{{ $time }}</option>
                                        @endforeach
                                    </select>
                                    <i class='bx bx-chevron-down'></i>
                                </div>
                            </div>
                        </div>
                        <p class="timezone-hint">Zona waktu: WITA (UTC+8)</p>

                        <div class="form-group">
                            <label for="location">Lokasi / tautan pertemuan *</label>
                            <input
                                type="text"
                                id="location"
                                name="location"
                                class="form-control"
                                value="{{ old('location', 'Pengadilan Negeri Denpasar') }}"
                                placeholder="Contoh: Pengadilan Negeri Denpasar atau tautan meeting"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="description">Catatan (opsional)</label>
                            <textarea
                                id="description"
                                name="description"
                                rows="3"
                                class="form-control"
                                placeholder="Tambahkan catatan agenda..."
                            >{{ old('description', 'Bawa dokumen pendukung dan salinan bukti perkara.') }}</textarea>
                        </div>
                    </div>

                    <!-- KANAN: PILIH LAWYER -->
                    <div class="lawyer-picker-card">
                        <div class="form-card-header">
                            <h3>Pilih Lawyer *</h3>
                            <p>Pilih satu atau lebih anggota tim.</p>
                        </div>

                        <input
                            type="text"
                            id="lawyerSearchInput"
                            class="form-control lawyer-search-input"
                            placeholder="Cari nama atau spesialisasi..."
                        >

                        <div class="selection-status-info">
                            <strong id="selectedLawyerCountLabel">2 lawyer dipilih</strong>
                            <span id="availabilitySubLabel">Ketersediaan: 21 Okt, 09:00–11:00</span>
                        </div>

                        <div class="lawyer-checklist" id="lawyerChecklist">
                            @foreach($lawyers as $index => $lawyer)
                                @php
                                    $isChecked = in_array($lawyer['lawyer_id'], [1, 2]);
                                @endphp
                                <label class="lawyer-option-card {{ $isChecked ? 'selected' : '' }}"
                                       data-search="{{ strtolower($lawyer['full_name'] . ' ' . $lawyer['specialization']) }}">
                                    <input
                                        type="checkbox"
                                        name="lawyer_ids[]"
                                        value="{{ $lawyer['lawyer_id'] }}"
                                        class="lawyer-checkbox"
                                        {{ $isChecked ? 'checked' : '' }}
                                    >
                                    <span class="custom-checkbox">
                                        <i class='bx bx-check'></i>
                                    </span>

                                    <img
                                        src="{{ asset($lawyer['photo_path']) }}"
                                        alt="{{ $lawyer['full_name'] }}"
                                        class="lawyer-avatar"
                                        onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($lawyer['short_name']) }}&background=6B2130&color=fff'"
                                    >

                                    <div class="lawyer-meta">
                                        <h4>{{ $lawyer['full_name'] }}</h4>
                                        <span class="lawyer-spec">{{ $lawyer['specialization'] }}</span>
                                        @if($lawyer['is_conflict'])
                                            <span class="status-conflict">Jadwal bentrok</span>
                                        @else
                                            <span class="status-available">Tersedia</span>
                                        @endif
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- BOTTOM ACTION BAR -->
                <div class="form-action-footer">
                    <div class="footer-hint">
                        <span>* Wajib diisi</span>
                        <p id="footerSelectedSummary">Jadwal akan ditambahkan untuk 2 lawyer terpilih.</p>
                    </div>
                    <div class="footer-buttons">
                        <a href="{{ route('admin.jadwal.index') }}" class="btn-cancel">Batal</a>
                        <button type="submit" class="btn-maroon btn-submit">Simpan Jadwal</button>
                    </div>
                </div>
            </form>
        </main>
    </div>
</div>

<script src="{{ asset('js/admin/jadwal.js') }}"></script>
</body>
</html>