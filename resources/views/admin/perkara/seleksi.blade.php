<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleksi &amp; Penugasan Advokat - Lawyer Admin</title>
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
            <img src="{{ asset('images/logo-ksp.png') }}" alt="Logo Kantor Hukum" class="brand-logo">
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
                <a href="{{ route('admin.perkara.index') }}">Konsultasi Perkara</a>
                <span>/</span>
                <span class="current">Seleksi advokat</span>
            </div>

            <div class="page-header">
                <div>
                    <h2>Seleksi &amp; penugasan advokat</h2>
                    <p>Jalankan seleksi sistem, tinjau rekomendasi, lalu setujui advokat untuk menangani perkara.</p>
                </div>
            </div>

            <!-- STEPPER TAHAPAN PERKARA (TAHAP 2 DARI 4) -->
            <section class="stepper-card">
                <div class="stepper-top">
                    <h3>Tahapan Perkara</h3>
                    <span>Tahap 2 dari 4</span>
                </div>

                <div class="stepper-track">
                    <div class="step-item completed">
                        <div class="step-circle"><i class='bx bx-check'></i></div>
                        <span>Pengajuan<br>Permohonan</span>
                    </div>
                    <div class="step-line completed-line"></div>
                    <div class="step-item active">
                        <div class="step-circle">2</div>
                        <span>Seleksi &amp;<br>Penugasan</span>
                    </div>
                    <div class="step-line"></div>
                    <div class="step-item">
                        <div class="step-circle">3</div>
                        <span>Proses<br>Perkara</span>
                    </div>
                    <div class="step-line"></div>
                    <div class="step-item">
                        <div class="step-circle">4</div>
                        <span>Perkara Selesai</span>
                    </div>
                </div>
            </section>

            <!-- CASE SUMMARY BANNER -->
            <section class="case-banner-card">
                <h3>{{ $case['case_code'] }} &bull; {{ $case['consultation_title'] }}</h3>
                <p>{{ $case['applicant_name'] }} &bull; {{ $case['category_name'] }} &bull; Dibuka {{ $case['created_at'] }}</p>
            </section>

            <!-- SELEKSI SYSTEM & STATUS PANEL -->
            <form action="{{ route('admin.perkara.tugaskan', $case['case_code']) }}" method="POST" id="assignLawyerForm">
                @csrf
                <input type="hidden" name="selected_lawyer_id" id="selectedLawyerIdInput" value="">

                <section class="selection-split-grid">
                    <!-- KIRI: SELEKSI ADVOKAT OLEH SISTEM -->
                    <div class="selection-card">
                        <span class="eyebrow-maroon">SELEKSI ADVOKAT OLEH SISTEM</span>

                        <!-- State Awal: Belum ada rekomendasi -->
                        <div id="beforeSelectionState">
                            <h3 class="selection-heading">Belum ada rekomendasi</h3>
                            <p class="field-line"><strong>Bidang hukum:</strong> {{ $case['legal_field_name'] }}</p>
                            <p class="criteria-title">Kriteria seleksi</p>
                            <p class="criteria-desc">
                                Sesuai bidang hukum dan ketersediaan.<br>
                                Jalankan seleksi untuk melihat rekomendasi.
                            </p>
                            <button
                                type="button"
                                class="btn-maroon"
                                id="btnRunSelection"
                                data-rec-id="{{ $recommendedLawyer['lawyer_id'] }}"
                                data-rec-name="{{ $recommendedLawyer['full_name'] }}"
                            >
                                Jalankan seleksi
                            </button>
                        </div>

                        <!-- State Setelah Klik "Jalankan seleksi" -->
                        <div id="afterSelectionState" style="display: none;">
                            <h3 class="selection-heading">Rekomendasi Advokat Terbaik</h3>
                            <div class="recommended-lawyer-box">
                                <div class="rec-top">
                                    <div>
                                        <h4>{{ $recommendedLawyer['full_name'] }}</h4>
                                        <span>Spesialisasi: Hukum {{ $recommendedLawyer['specialization'] }} &bull; {{ $recommendedLawyer['experience'] }}</span>
                                    </div>
                                    <span class="match-badge">{{ $recommendedLawyer['match_score'] }}</span>
                                </div>
                                <div class="rec-meta">
                                    <span><i class='bx bx-briefcase'></i> {{ $recommendedLawyer['active_cases'] }} perkara aktif</span>
                                    <span class="text-emerald"><i class='bx bx-check-circle'></i> {{ $recommendedLawyer['availability'] }}</span>
                                </div>
                            </div>
                            <button type="button" class="btn-re-run" id="btnResetSelection">
                                <i class='bx bx-refresh'></i> Jalankan ulang seleksi
                            </button>
                        </div>
                    </div>

                    <!-- KANAN: MENUNGGU SELEKSI -->
                    <aside class="status-side-card">
                        <h3 class="emerald-heading" id="sideStatusHeading">Menunggu seleksi</h3>
                        <p class="side-strong" id="sideStatusStrong">Penugasan belum aktif.</p>
                        <p class="side-muted">
                            Admin meninjau rekomendasi sistem atau memilih advokat pengganti sebelum menyetujui penugasan.
                        </p>
                        <p class="side-muted" id="sideStatusNote">
                            Hasil seleksi perlu ditinjau admin.
                        </p>
                    </aside>
                </section>

                <!-- PILIHAN ADVOKAT PENGGANTI -->
                <section class="substitute-card">
                    <h3>Pilihan advokat pengganti</h3>
                    <p>Gunakan jika rekomendasi sistem perlu diganti.</p>

                    <label for="substituteLawyerSelect">Advokat pengganti</label>
                    <div class="select-wrapper">
                        <select id="substituteLawyerSelect" class="form-control">
                            <option value="">Pilih advokat yang tersedia</option>
                            @foreach($lawyers as $lawyer)
                                <option value="{{ $lawyer['lawyer_id'] }}" data-name="{{ $lawyer['full_name'] }}">
                                    {{ $lawyer['full_name'] }} — Bidang {{ $lawyer['specialization'] }} ({{ $lawyer['availability'] }})
                                </option>
                            @endforeach
                        </select>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                </section>

                <p class="bottom-helper-text">
                    Pilih advokat dan tinjau hasil seleksi sebelum menyetujui penugasan.
                </p>

                <div class="bottom-nav-actions">
                    <a href="{{ route('admin.perkara.show', $case['case_code']) }}" class="btn-outline-maroon">
                        Kembali ke pemeriksaan
                    </a>
                    <button type="submit" class="btn-approve-disabled" id="btnApproveAssignment" disabled>
                        Setujui penugasan
                    </button>
                </div>
            </form>
        </main>
    </div>
</div>

<script src="{{ asset('js/admin/konsultasiperkara.js') }}"></script>
</body>
</html>