<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemeriksaan Permohonan Perkara - Lawyer Admin</title>
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
                <span class="current">Detail permohonan</span>
            </div>

            <div class="page-header">
                <div>
                    <h2>Pemeriksaan permohonan perkara</h2>
                    <p>Periksa data klien, kronologi, dan dokumen sebelum melanjutkan ke seleksi advokat.</p>
                </div>
            </div>

            <!-- STEPPER TAHAPAN PERKARA (TAHAP 1 DARI 4) -->
            <section class="stepper-card">
                <div class="stepper-top">
                    <h3>Tahapan Perkara</h3>
                    <span>Tahap 1 dari 4</span>
                </div>

                <div class="stepper-track">
                    <div class="step-item active">
                        <div class="step-circle">1</div>
                        <span>Pengajuan<br>Permohonan</span>
                    </div>
                    <div class="step-line"></div>
                    <div class="step-item">
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

            <!-- DETAIL GRID: KIRI (DOKUMEN) & KANAN (STATUS ACC) -->
            <section class="detail-split-grid">
                <div class="doc-detail-card">
                    <div class="field-block">
                        <span class="field-caption">Judul</span>
                        <h3 class="doc-heading">{{ $case['doc_title'] }}</h3>
                    </div>

                    <div class="field-block">
                        <span class="field-caption">Tanggal</span>
                        <p class="doc-date">{{ $case['submitted_datetime'] }}</p>
                    </div>

                    <div class="field-block">
                        <span class="field-caption bold-dark">Deskripsi</span>
                        <div class="doc-description">
                            {!! nl2br(e($case['case_summary'])) !!}
                        </div>
                    </div>

                    <div class="attachments-section">
                        <div class="attachment-heading">
                            <span class="att-icon-badge"><i class='bx bx-file'></i></span>
                            <h4>Lampiran</h4>
                        </div>

                        <div class="attachment-list">
                            @foreach($case['documents'] as $doc)
                                <div class="attachment-item">
                                    <div class="att-left">
                                        <div class="pdf-icon-box">
                                            <i class='bx bxs-file-pdf'></i>
                                        </div>
                                        <div>
                                            <strong>{{ $doc['document_name'] }}</strong>
                                            <span>{{ $doc['file_size'] }}</span>
                                        </div>
                                    </div>
                                    <a href="#" class="btn-download-att" title="Unduh {{ $doc['document_name'] }}">
                                        <i class='bx bx-download'></i>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- PANEL KANAN: MENUNGGU ACC ADMIN -->
                <aside class="status-side-card">
                    <h3 class="maroon-heading">Menunggu ACC admin</h3>
                    <p class="side-strong">Advokat belum ditugaskan.</p>
                    <p class="side-muted">
                        Setelah ACC, sistem menyeleksi advokat sesuai bidang hukum dan ketersediaan.
                    </p>
                    <p class="side-muted">
                        Admin meninjau hasil seleksi atau memilih advokat pengganti sebelum penugasan.
                    </p>
                </aside>
            </section>

            <!-- DAFTAR PEMERIKSAAN ADMIN -->
            <section class="checklist-card">
                <h3>Daftar pemeriksaan admin</h3>
                <ul class="admin-check-list">
                    <li>
                        <span class="check-circle-green"><i class='bx bx-check'></i></span>
                        <span>Data klien telah diverifikasi</span>
                    </li>
                    <li>
                        <span class="check-circle-green"><i class='bx bx-check'></i></span>
                        <span>Kronologi dan kategori perkara telah diperiksa</span>
                    </li>
                    <li>
                        <span class="check-circle-green"><i class='bx bx-check'></i></span>
                        <span>Dokumen dan kelengkapan permohonan telah diperiksa</span>
                    </li>
                </ul>
            </section>

            <p class="bottom-helper-text">
                ACC melanjutkan perkara ke seleksi advokat, belum mengaktifkan penugasan.
            </p>

            <div class="bottom-nav-actions">
                <button type="button" class="btn-outline-maroon" id="btnOpenRevisionModal">
                    Minta perbaikan
                </button>
                <a href="{{ route('admin.perkara.seleksi', $case['case_code']) }}" class="btn-maroon btn-wide">
                    ACC &amp; lanjut ke seleksi
                </a>
            </div>
        </main>
    </div>
</div>

<!-- MODAL MINTA PERBAIKAN -->
<div class="modal-overlay" id="revisionModal" aria-hidden="true">
    <div class="modal-box">
        <div class="modal-header">
            <div>
                <h3>Minta perbaikan dokumen</h3>
                <p>Berikan catatan perbaikan untuk klien ({{ $case['applicant_name'] }}).</p>
            </div>
            <button type="button" class="btn-close-modal" id="btnCloseRevisionModal">
                <i class='bx bx-x'></i>
            </button>
        </div>
        <form action="{{ route('admin.perkara.revisi', $case['case_code']) }}" method="POST">
            @csrf
            <div class="modal-body">
                <label for="revision_note">Catatan perbaikan *</label>
                <textarea
                    id="revision_note"
                    name="revision_note"
                    rows="4"
                    class="form-control"
                    placeholder="Contoh: Mohon unggah ulang salinan KTP dan halaman terakhir sertifikat tanah dengan resolusi lebih jelas."
                    required
                ></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" id="btnCancelRevisionModal">Batal</button>
                <button type="submit" class="btn-maroon">Kirim permintaan perbaikan</button>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('js/admin/konsultasiperkara.js') }}"></script>
</body>
</html>