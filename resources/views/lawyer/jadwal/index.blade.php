<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal - Lawyer Portal</title>
    <!-- Font Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/lawyer/jadwal/jadwal.css') }}">
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
                    <a href="{{ route('lawyer.index') }}" class="nav-item">
                        <i class='bx bx-grid-alt'></i>
                        <span>Overview</span>
                    </a>
                    <a href="{{ route('lawyer.kelolaperkara.index') }}" class="nav-item">
                        <i class='bx bx-shopping-bag'></i>
                        <span>Kelola Perkara</span>
                    </a>
                    <a href="{{ route('lawyer.jadwal.index') }}" class="nav-item active">
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
                        <span>Overview</span>
                        <i class='bx bx-chevron-right breadcrumb-sep'></i>
                        <span class="current">Jadwal</span>
                    </div>
                </div>

                <div class="topbar-right">
                    <button class="icon-btn notif-btn" title="Notifikasi">
                        <i class='bx bx-bell'></i>
                        <span class="notif-dot"></span>
                    </button>
                    <div class="user-profile">
                        <div class="avatar">
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
                <div class="page-header-row">
                    <div class="page-title-group">
                        <h2>Jadwal</h2>
                        <p>Kelola jadwal sidang, konsultasi, dan agenda perkara Anda.</p>
                    </div>
                    <button type="button" class="btn-primary-emerald" id="btnOpenScheduleModal">
                        <i class='bx bx-plus'></i> Tambah Jadwal
                    </button>
                </div>

                @if (session('success'))
                    <div class="alert-success" role="alert">
                        <i class='bx bx-check-circle'></i> {{ session('success') }}
                    </div>
                @endif

                <!-- Split Layout: Calendar (Left) & Agenda Detail (Right) -->
                <div class="schedule-layout">
                    
                    <!-- Left Section: Calendar -->
                    <div class="calendar-section">
                        <!-- Calendar Toolbar -->
                        <div class="calendar-toolbar">
                            <div class="toolbar-left">
                                <div class="nav-month">
                                    <button type="button" id="btnPrevMonth" title="Bulan Sebelumnya"><i class='bx bx-chevron-left'></i></button>
                                    <button type="button" id="btnNextMonth" title="Bulan Berikutnya"><i class='bx bx-chevron-right'></i></button>
                                </div>
                                <h3 class="current-month">
                                    <i class='bx bx-calendar'></i>
                                    <span id="calendarMonthLabel">Oktober 2026</span>
                                </h3>
                            </div>
                            <div class="toolbar-right">
                                <select class="dropdown-filter" id="categoryFilterSelect">
                                    <option value="all">Semua Kategori</option>
                                    <option value="Sidang">Sidang</option>
                                    <option value="Mediasi">Mediasi</option>
                                    <option value="Konsultasi">Konsultasi</option>
                                    <option value="Internal">Internal</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <button type="button" class="btn-outline" id="btnJumpToday">Hari Ini</button>
                            </div>
                        </div>

                        <!-- Calendar Grid -->
                        <div class="calendar-container">
                            <div class="calendar-header">
                                <div>Min</div><div>Sen</div><div>Sel</div><div>Rab</div><div>Kam</div><div>Jum</div><div>Sab</div>
                            </div>
                            <div class="calendar-grid" id="calendarGrid">
                                <!-- Di-render dinamis oleh JavaScript berdasarkan data schedules -->
                            </div>
                        </div>
                    </div>

                    <!-- Right Section: Agenda Panel (Default = Hari Ini) -->
                    <aside class="agenda-panel" id="agendaPanel">
                        <div class="agenda-header">
                            <h3 id="agendaSelectedDateHeading">-</h3>
                            <p id="agendaCountSubtitle">0 agenda hari ini</p>
                        </div>

                        <!-- Empty State jika hari terpilih tidak memiliki jadwal -->
                        <div class="agenda-empty-state" id="agendaEmptyState" style="display: none;">
                            <div class="empty-cal-icon">
                                <i class='bx bx-calendar-x'></i>
                            </div>
                            <h4 id="emptyStateTitle">Tidak ada jadwal di hari ini</h4>
                            <p id="emptyStateDesc">Pilih tanggal lain pada kalender untuk melihat detail agenda, atau tambahkan jadwal baru.</p>
                        </div>

                        <!-- Timeline & Detail Container jika hari terpilih memiliki jadwal -->
                        <div id="agendaFilledContainer" style="display: none;">
                            <div class="agenda-timeline" id="agendaTimelineList">
                                <!-- List item agenda hari terpilih di-render oleh JS -->
                            </div>

                            <hr class="panel-divider">

                            <!-- Detail View for Selected Event -->
                            <div class="event-detail-view" id="eventDetailView">
                                <span class="badge badge-blue-light" id="detailBadgeType">Sidang</span>
                                <h2 class="detail-title" id="detailEventTitle">-</h2>
                                
                                <div class="detail-datetime">
                                    <div><i class='bx bx-calendar'></i> <span id="detailFullDate">-</span></div>
                                    <div><i class='bx bx-time-five'></i> <span id="detailTimeRange">-</span></div>
                                </div>

                                <div class="detail-grid">
                                    <div class="d-label"><i class='bx bx-briefcase'></i> Case ID</div>
                                    <div class="d-value">: <span id="detailCaseId">-</span></div>

                                    <div class="d-label"><i class='bx bx-map'></i> Lokasi</div>
                                    <div class="d-value">: <span id="detailLocation">-</span></div>

                                    <div class="d-label"><i class='bx bx-user'></i> Agenda</div>
                                    <div class="d-value">: <span id="detailAgendaType">-</span></div>
                                </div>

                                <div class="detail-notes">
                                    <h4><i class='bx bx-notepad'></i> Catatan</h4>
                                    <p id="detailDescription">-</p>
                                </div>
                            </div>
                        </div>
                    </aside>

                </div>
            </div>
        </main>
    </div>

    <!-- ==================== MODAL TAMBAH JADWAL ==================== -->
    <div class="modal-overlay" id="addScheduleModal" aria-hidden="true">
        <div class="modal-container" role="dialog" aria-modal="true" aria-labelledby="modalScheduleTitle">
            <!-- Modal Header -->
            <div class="modal-header">
                <div class="header-left-group">
                    <div class="header-icon-box">
                        <i class='bx bx-calendar-plus'></i>
                    </div>
                    <h2 id="modalScheduleTitle" class="modal-title">Tambah Jadwal</h2>
                </div>
                <button type="button" class="btn-close-modal" id="btnCloseScheduleModal" aria-label="Tutup">
                    <i class='bx bx-x'></i>
                </button>
            </div>

            <form action="{{ route('lawyer.jadwal.store') }}" method="POST" id="addScheduleForm" class="modal-form">
                @csrf
                <div class="modal-body">
                    <!-- Nama Kegiatan -->
                    <div class="form-group">
                        <label for="event_title">Nama Kegiatan <span class="text-red">*</span></label>
                        <input
                            type="text"
                            id="event_title"
                            name="event_title"
                            class="form-input"
                            placeholder="Contoh: Koordinasi Persiapan Sidang"
                            required
                        >
                    </div>

                    <!-- Jenis Kegiatan (5 Kotak Pilihan) -->
                    <div class="form-group">
                        <label>Jenis Kegiatan <span class="text-red">*</span></label>
                        <div class="activity-type-grid">
                            <label class="activity-card">
                                <input type="radio" name="event_type" value="Sidang" checked>
                                <div class="activity-card-inner">
                                    <i class='bx bx-building'></i>
                                    <span>Sidang</span>
                                </div>
                            </label>

                            <label class="activity-card">
                                <input type="radio" name="event_type" value="Mediasi">
                                <div class="activity-card-inner">
                                    <i class='bx bx-group'></i>
                                    <span>Mediasi</span>
                                </div>
                            </label>

                            <label class="activity-card">
                                <input type="radio" name="event_type" value="Konsultasi">
                                <div class="activity-card-inner">
                                    <i class='bx bx-message-rounded-dots'></i>
                                    <span>Konsultasi</span>
                                </div>
                            </label>

                            <label class="activity-card">
                                <input type="radio" name="event_type" value="Internal">
                                <div class="activity-card-inner">
                                    <i class='bx bx-briefcase'></i>
                                    <span>Internal</span>
                                </div>
                            </label>

                            <label class="activity-card">
                                <input type="radio" name="event_type" value="Lainnya" id="radioTypeLainnya">
                                <div class="activity-card-inner">
                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                    <span>Lainnya</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Input Kegiatan (Custom) - Muncul otomatis jika "Lainnya" dipilih -->
                    <div class="form-group hidden" id="customActivityGroup">
                        <label for="custom_event_type">Kegiatan (Custom) <span class="text-red">*</span></label>
                        <input
                            type="text"
                            id="custom_event_type"
                            name="custom_event_type"
                            class="form-input input-focus-blue"
                            placeholder="Masukkan nama jenis kegiatan"
                        >
                    </div>

                    <!-- Tanggal -->
                    <div class="form-group">
                        <label for="schedule_date">Tanggal <span class="text-red">*</span></label>
                        <div class="input-with-icon">
                            <i class='bx bx-calendar left-icon'></i>
                            <input
                                type="date"
                                id="schedule_date"
                                name="schedule_date"
                                value="{{ $todayDate }}"
                                class="form-input has-left-icon"
                                required
                            >
                        </div>
                    </div>

                    <!-- Waktu Mulai & Waktu Selesai -->
                    <div class="form-row-2">
                        <div class="form-group">
                            <label for="start_time">Waktu Mulai <span class="text-red">*</span></label>
                            <div class="input-with-icon">
                                <i class='bx bx-time-five left-icon'></i>
                                <input
                                    type="time"
                                    id="start_time"
                                    name="start_time"
                                    value="10:00"
                                    class="form-input has-left-icon"
                                    required
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="end_time">Waktu Selesai <span class="text-red">*</span></label>
                            <div class="input-with-icon">
                                <i class='bx bx-time-five left-icon'></i>
                                <input
                                    type="time"
                                    id="end_time"
                                    name="end_time"
                                    value="12:00"
                                    class="form-input has-left-icon"
                                    required
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Lokasi -->
                    <div class="form-group">
                        <label for="location">Lokasi</label>
                        <div class="input-with-icon">
                            <i class='bx bx-map left-icon'></i>
                            <input
                                type="text"
                                id="location"
                                name="location"
                                class="form-input has-left-icon"
                                placeholder="Contoh: Pengadilan Negeri Mojokerto"
                            >
                        </div>
                    </div>

                    <!-- Deskripsi (Opsional) -->
                    <div class="form-group">
                        <label for="description">Deskripsi <span class="optional-tag">(Opsional)</span></label>
                        <textarea
                            id="description"
                            name="description"
                            rows="3"
                            class="form-textarea"
                            placeholder="Tambahkan catatan atau rincian kegiatan..."
                        ></textarea>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn-batal" id="btnCancelScheduleModal">Batal</button>
                    <button type="submit" class="btn-simpan-blue">
                        <i class='bx bx-calendar-check'></i> Simpan Jadwal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Data Jadwal dari Controller untuk dirender di Kalender & Panel Kanan -->
    <script>
        window.SCHEDULE_DATA = @json($schedules);
        window.TODAY_DATE_STR = @json($todayDate);
    </script>
    <script src="{{ asset('js/lawyer/jadwal.js') }}"></script>
</body>
</html>