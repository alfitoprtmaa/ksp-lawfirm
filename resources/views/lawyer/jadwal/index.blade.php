<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal - Lawyer Portal</title>
    <!-- Font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                    <img src="{{ asset('images/logo.png') }}" alt="KSP Logo" class="logo-img">
                </div>
                <div class="brand-info">
                    <h2 class="brand-name">KETUT SURYA PUTRA<br>& PARTNERS</h2>
                    <p class="brand-sub">Legal Client Portal</p>
                </div>
            </div>

            <div class="sidebar-menu">
                <p class="menu-label">RUANG Lawyer</p>
                <nav class="nav-links">
                    <a href="{{ route('lawyer.index') }}" class="nav-item">
                        <i class='bx bx-grid-alt'></i>
                        <span>Overview</span>
                    </a>
                    <a href="{{ route('lawyer.kelolaperkara.index') }}" class="nav-item">
                        <i class='bx bx-briefcase'></i>
                        <span>Kelola Perkara</span>
                    </a>
                    <a href="#" class="nav-item active">
                        <i class='bx bx-calendar-event'></i>
                        <span>Jadwal</span>
                    </a>
                    <a href="{{ route('lawyer.pusatreferensi.index') }}" class="nav-item">
                        <i class='bx bx-folder-open'></i>
                        <span>Pusat Refrensi</span>
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
                <div class="topbar-left" style="display: flex; align-items: center; gap: 15px;">
                    <button class="mobile-toggle-btn" id="mobileMenuBtn">
                        <i class='bx bx-menu'></i>
                    </button>
                    <div class="breadcrumbs">
                        <span>Portal Lawyer</span> / <span class="current">Jadwal</span>
                    </div>
                </div>

                <div class="topbar-right">
                    <button class="icon-btn"><i class='bx bx-bell'></i></button>
                    <div class="user-profile">
                        <div class="avatar">
                            <i class='bx bx-user'></i>
                        </div>
                        <div class="user-info">
                            <span class="user-name">Akun Anda</span>
                            <span class="user-role">Lawyer</span>
                        </div>
                        <i class='bx bx-chevron-down'></i>
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
                    <button class="btn-primary" onclick="openModal()">
                        <i class='bx bx-plus'></i> Tambah Jadwal
                    </button>
                </div>

                <!-- Tabs -->
                <div class="content-tabs">
                    <button class="tab-btn active">Kalender</button>
                    <button class="tab-btn">Daftar Jadwal</button>
                    <button class="tab-btn">Sidang</button>
                    <button class="tab-btn">Konsultasi</button>
                    <button class="tab-btn">Agenda</button>
                </div>

                <!-- Split Layout: Calendar (Left) & Agenda Detail (Right) -->
                <div class="schedule-layout">
                    
                    <!-- Left Section: Calendar -->
                    <div class="calendar-section">
                        <!-- Calendar Toolbar -->
                        <div class="calendar-toolbar">
                            <div class="toolbar-left">
                                <div class="nav-month">
                                    <button><i class='bx bx-chevron-left'></i></button>
                                    <button><i class='bx bx-chevron-right'></i></button>
                                </div>
                                <h3 class="current-month"><i class='bx bx-calendar'></i> Oktober 2026</h3>
                            </div>
                            <div class="toolbar-right">
                                <select class="dropdown-filter">
                                    <option>Semua Kategori</option>
                                    <option>Sidang</option>
                                    <option>Konsultasi</option>
                                </select>
                                <button class="btn-outline">Hari Ini</button>
                            </div>
                        </div>

                        <!-- Calendar Grid -->
                        <div class="calendar-container">
                            <div class="calendar-header">
                                <div>Min</div><div>Sen</div><div>Sel</div><div>Rab</div><div>Kam</div><div>Jum</div><div>Sab</div>
                            </div>
                            <div class="calendar-grid">
                                <!-- Week 1 -->
                                <div class="cal-cell prev-month"><span class="date">27</span></div>
                                <div class="cal-cell prev-month"><span class="date">28</span></div>
                                <div class="cal-cell prev-month"><span class="date">29</span></div>
                                <div class="cal-cell prev-month"><span class="date">30</span></div>
                                <div class="cal-cell">
                                    <span class="date">1</span>
                                    <div class="event-pill event-blue">
                                        <span class="dot"></span>
                                        <div class="event-info">
                                            <strong>09:00 Sidang</strong>
                                            <span>CASE-001</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="cal-cell"><span class="date">2</span></div>
                                <div class="cal-cell">
                                    <span class="date">3</span>
                                    <div class="event-pill event-green">
                                        <span class="dot"></span>
                                        <div class="event-info">
                                            <strong>14:00 Konsultasi</strong>
                                            <span>Budi Santoso</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Week 2 -->
                                <div class="cal-cell"><span class="date">4</span></div>
                                <div class="cal-cell">
                                    <span class="date">5</span>
                                    <div class="event-pill event-yellow">
                                        <span class="dot"></span>
                                        <div class="event-info">
                                            <strong>10:00 Agenda</strong>
                                            <span>Rapat Internal</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="cal-cell"><span class="date">6</span></div>
                                <div class="cal-cell">
                                    <span class="date">7</span>
                                    <div class="event-pill event-purple">
                                        <span class="dot"></span>
                                        <div class="event-info">
                                            <strong>13:00 Sidang</strong>
                                            <span>CASE-009</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="cal-cell"><span class="date">8</span></div>
                                <div class="cal-cell"><span class="date">9</span></div>
                                <div class="cal-cell">
                                    <span class="date">10</span>
                                    <div class="event-pill event-green">
                                        <span class="dot"></span>
                                        <div class="event-info">
                                            <strong>11:00 Konsultasi</strong>
                                            <span>PT Maju Jaya</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Week 3 -->
                                <div class="cal-cell"><span class="date">11</span></div>
                                <div class="cal-cell">
                                    <span class="date">12</span>
                                    <div class="event-pill event-blue">
                                        <span class="dot"></span>
                                        <div class="event-info">
                                            <strong>09:00 Sidang</strong>
                                            <span>CASE-007</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="cal-cell"><span class="date">13</span></div>
                                <div class="cal-cell">
                                    <span class="date">14</span>
                                    <div class="event-pill event-green">
                                        <span class="dot"></span>
                                        <div class="event-info">
                                            <strong>15:00 Konsultasi</strong>
                                            <span>Andi Pratama</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="cal-cell"><span class="date">15</span></div>
                                <div class="cal-cell"><span class="date">16</span></div>
                                <div class="cal-cell">
                                    <span class="date">17</span>
                                    <div class="event-pill event-purple">
                                        <span class="dot"></span>
                                        <div class="event-info">
                                            <strong>10:00 Agenda</strong>
                                            <span>Mediasi</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Week 4 (Active/Selected Date) -->
                                <div class="cal-cell"><span class="date">18</span></div>
                                <div class="cal-cell"><span class="date">19</span></div>
                                <div class="cal-cell active-date-cell">
                                    <span class="date active-date">20</span>
                                    <div class="event-pill event-blue">
                                        <span class="dot"></span>
                                        <div class="event-info">
                                            <strong>09:00 Sidang</strong>
                                            <span>CASE-001</span>
                                        </div>
                                    </div>
                                    <div class="event-pill event-green">
                                        <span class="dot"></span>
                                        <div class="event-info">
                                            <strong>13:00 Konsultasi</strong>
                                            <span>CV Maju Mandiri</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="cal-cell"><span class="date">21</span></div>
                                <div class="cal-cell">
                                    <span class="date">22</span>
                                    <div class="event-pill event-yellow">
                                        <span class="dot"></span>
                                        <div class="event-info">
                                            <strong>10:00 Agenda</strong>
                                            <span>Rapat Tim</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="cal-cell"><span class="date">23</span></div>
                                <div class="cal-cell">
                                    <span class="date">24</span>
                                    <div class="event-pill event-blue">
                                        <span class="dot"></span>
                                        <div class="event-info">
                                            <strong>14:00 Sidang</strong>
                                            <span>CASE-006</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Week 5 -->
                                <div class="cal-cell"><span class="date">25</span></div>
                                <div class="cal-cell"><span class="date">26</span></div>
                                <div class="cal-cell"><span class="date">27</span></div>
                                <div class="cal-cell">
                                    <span class="date">28</span>
                                    <div class="event-pill event-green">
                                        <span class="dot"></span>
                                        <div class="event-info">
                                            <strong>09:00 Konsultasi</strong>
                                            <span>Dewi Sari</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="cal-cell"><span class="date">29</span></div>
                                <div class="cal-cell">
                                    <span class="date">30</span>
                                    <div class="event-pill event-blue">
                                        <span class="dot"></span>
                                        <div class="event-info">
                                            <strong>11:00 Sidang</strong>
                                            <span>CASE-012</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="cal-cell"><span class="date">31</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Section: Agenda Panel -->
                    <div class="agenda-panel">
                        <div class="agenda-header">
                            <h3>Sel, 20 Oktober 2026</h3>
                            <p>2 agenda hari ini</p>
                        </div>

                        <!-- Timeline List -->
                        <div class="agenda-timeline">
                            <!-- Timeline Item 1 -->
                            <div class="timeline-item active">
                                <div class="timeline-dot dot-blue"></div>
                                <div class="timeline-content">
                                    <div class="time">09:00 - 11:00</div>
                                    <div class="title">Sidang Pemeriksaan Saksi</div>
                                    <div class="subtitle">CASE-001 • Pengadilan Negeri</div>
                                </div>
                            </div>

                            <!-- Timeline Item 2 -->
                            <div class="timeline-item">
                                <div class="timeline-dot dot-green"></div>
                                <div class="timeline-content">
                                    <div class="time">13:00 - 14:00</div>
                                    <div class="title">Konsultasi dengan Klien</div>
                                    <div class="subtitle">CV Maju Mandiri • Kantor</div>
                                </div>
                            </div>
                        </div>

                        <hr class="panel-divider">

                        <!-- Detail View for Selected Event -->
                        <div class="event-detail-view">
                            <span class="badge badge-blue-light">Sidang</span>
                            <h2 class="detail-title">Sidang Pemeriksaan Saksi</h2>
                            
                            <div class="detail-datetime">
                                <i class='bx bx-calendar'></i> Selasa, 20 Oktober 2026<br>
                                <i class='bx bx-time-five'></i> 09:00 - 11:00
                            </div>

                            <div class="detail-grid">
                                <div class="d-label"><i class='bx bx-briefcase'></i> Case ID</div>
                                <div class="d-value">: CASE-001</div>

                                <div class="d-label"><i class='bx bx-map'></i> Lokasi</div>
                                <div class="d-value">: Pengadilan Negeri</div>

                                <div class="d-label"><i class='bx bx-user'></i> Agenda</div>
                                <div class="d-value">: Sidang Pemeriksaan</div>

                                <div class="d-label"><i class='bx bx-flag'></i> Status</div>
                                <div class="d-value">: <span class="badge badge-blue-light">Akan Datang</span></div>
                            </div>

                            <div class="detail-notes">
                                <h4><i class='bx bx-notepad'></i> Catatan</h4>
                                <p>Harap membawa seluruh dokumen pendukung dan salinan bukti yang diperlukan.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <!-- Modal Overlay & Container -->
    <div class="modal-overlay" id="addScheduleModal">
        <div class="modal-container">
            <!-- Modal Header -->
            <div class="modal-header">
                <div class="header-content">
                    <div class="header-icon-wrapper">
                        <i class='bx bx-calendar'></i>
                    </div>
                    <div class="header-text">
                        <div class="title-row">
                            <h2>Tambah Jadwal Baru</h2>
                            <span class="badge-portal">Legal Portal</span>
                        </div>
                        <p>Jadwalkan agenda sidang, konsultasi klien, mediasi, atau rapat internal perkara.</p>
                    </div>
                </div>
                <button class="btn-close-modal" onclick="closeModal()">
                    <i class='bx bx-x'></i>
                </button>
            </div>

            <div class="modal-body">
                <!-- Section: Kategori Agenda -->
                <div class="form-section-flat">
                    <label class="section-label">TIPE / KATEGORI AGENDA <span class="text-red">*</span></label>
                    <div class="category-grid">
                        <!-- Option 1 -->
                        <label class="category-card">
                            <input type="radio" name="agenda_type" value="sidang" checked>
                            <div class="card-content">
                                <div class="icon-box icon-blue"><i class='bx bx-buildings'></i></div>
                                <h4>Sidang Pengadilan</h4>
                                <p>PN / PT / MA</p>
                            </div>
                        </label>
                        <!-- Option 2 -->
                        <label class="category-card">
                            <input type="radio" name="agenda_type" value="konsultasi">
                            <div class="card-content">
                                <div class="icon-box icon-green"><i class='bx bx-user-voice'></i></div>
                                <h4>Konsultasi Klien</h4>
                                <p>Kantor / Virtual</p>
                            </div>
                        </label>
                        <!-- Option 3 -->
                        <label class="category-card">
                            <input type="radio" name="agenda_type" value="mediasi">
                            <div class="card-content">
                                <div class="icon-box icon-purple"><i class='bx bx-message-rounded-dots'></i></div>
                                <h4>Mediasi</h4>
                                <p>Negosiasi / Damai</p>
                            </div>
                        </label>
                        <!-- Option 4 -->
                        <label class="category-card">
                            <input type="radio" name="agenda_type" value="rapat">
                            <div class="card-content">
                                <div class="icon-box icon-yellow"><i class='bx bx-building-house'></i></div>
                                <h4>Rapat Internal</h4>
                                <p>Briefing Perkara</p>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Section: Informasi Perkara & Klien -->
                <div class="form-box">
                    <div class="box-header">
                        <i class='bx bx-file'></i>
                        <h3>Informasi Perkara & Klien</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-row-2">
                            <div class="form-group">
                                <label>Hubungkan ke Perkara <span class="text-red">*</span></label>
                                <div class="select-wrapper">
                                    <select>
                                        <option>CASE-001 - Sengketa Tanah PT Maju Jaya</option>
                                    </select>
                                    <i class='bx bx-chevron-down'></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Klien / Pihak Terkait</label>
                                <input type="text" value="Budi Santoso / PT Maju Jaya" readonly class="bg-gray">
                            </div>
                        </div>
                        
                        <div class="form-group mt-16">
                            <label>Kuasa Hukum / Advokat Penanggung Jawab</label>
                            <div class="chips-container">
                                <div class="chip chip-primary">
                                    <div class="avatar-sm bg-green">AP</div>
                                    <span class="chip-name">Adv. Adi Pratama, S.H.</span>
                                    <span class="chip-role">Lead Counsel</span>
                                </div>
                                <div class="chip chip-default">
                                    <div class="avatar-sm bg-gray-icon">KS</div>
                                    <span class="chip-name">Ketut Surya Putra, S.H., M.H.</span>
                                    <span class="chip-role">Senior Partner</span>
                                </div>
                                <button class="btn-add-team">
                                    <i class='bx bx-plus'></i> Tambah Tim
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: Waktu & Lokasi Pelaksanaan -->
                <div class="form-box">
                    <div class="box-header">
                        <i class='bx bx-time-five'></i>
                        <h3>Waktu & Lokasi Pelaksanaan</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-row-3">
                            <div class="form-group">
                                <label>Tanggal Sidang/Kegiatan <span class="text-red">*</span></label>
                                <input type="text" value="10/20/2026">
                            </div>
                            <div class="form-group">
                                <label>Waktu Mulai <span class="text-red">*</span></label>
                                <input type="time" value="09:00">
                            </div>
                            <div class="form-group">
                                <label>Waktu Selesai</label>
                                <input type="time" value="11:00">
                            </div>
                        </div>

                        <div class="form-row-2 mt-16 form-row-uneven">
                            <div class="form-group">
                                <label>Pengingat Jadwal (Alarm)</label>
                                <div class="select-wrapper">
                                    <select>
                                        <option>1 Hari sebelumnya</option>
                                    </select>
                                    <i class='bx bx-chevron-down'></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="label-flex">
                                    <label>Lokasi / Tempat Agenda <span class="text-red">*</span></label>
                                    <span class="status-badge green">Tatap Muka / Fisik</span>
                                </div>
                                <div class="input-icon">
                                    <i class='bx bx-map'></i>
                                    <input type="text" value="Pengadilan Negeri Jakarta Selatan, Ruang Sidang Utama H.R. Purwoto G">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: Materi Agenda & Dokumen -->
                <div class="form-box border-only">
                    <div class="box-header">
                        <i class='bx bx-edit-alt'></i>
                        <h3>Materi Agenda & Dokumen Persidangan</h3>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <div class="footer-note">
                    <div class="dot-green-sm"></div>
                    Agenda otomatis disinkronkan ke kalender klien & tim internal
                </div>
                <div class="footer-actions">
                    <button class="btn-text" onclick="closeModal()">Batal</button>
                    <button class="btn-outline-gray">Simpan Draf</button>
                    <button class="btn-primary-green">
                        <i class='bx bx-check'></i> Simpan & Jadwalkan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk mengontrol Modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const sidebar = document.querySelector('.sidebar');

            // Toggle Sidebar saat tombol hamburger diklik
            mobileMenuBtn.addEventListener('click', function(e) {
                e.stopPropagation(); // Mencegah event klik menjalar ke dokumen
                sidebar.classList.toggle('active');
            });

            // Otomatis menutup sidebar jika user mengklik area di luar sidebar
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 768) {
                    if (!sidebar.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                        sidebar.classList.remove('active');
                    }
                }
            });
        });

        function openModal() {
            document.getElementById('addScheduleModal').classList.add('show');
            document.body.classList.add('modal-open'); // Mengunci scroll halaman belakang
        }

        function closeModal() {
            document.getElementById('addScheduleModal').classList.remove('show');
            document.body.classList.remove('modal-open'); // Mengembalikan scroll halaman belakang
        }
    </script>
</body>
</html>