<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perkara Saya - Ketut Surya Putra & Partners</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS Utama & CSS Halaman Perkara Saya -->
    <link rel="stylesheet" href="{{ asset('css/customer/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/perkaralama/perkaralama.css') }}">
    
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="app-container">
        
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="KSP Logo" class="logo-img">
                </div>
                <div class="brand-info">
                    <h2 class="brand-name">KETUT SURYA PUTRA<br>&amp; PARTNERS</h2>
                    <p class="brand-sub">Legal Client Portal</p>
                </div>
            </div>

            <div class="sidebar-menu">
                <p class="menu-label">RUANG KLIEN</p>
                <ul>
                    <li><a href="{{ route('customer.index') }}"><i class='bx bx-grid-alt'></i> Overview</a></li>
                    <li class="active-blue"><a href="{{ route('customer.perkaralama.index') }}"><i class='bx bx-git-pull-request'></i> Perkara Saya</a></li>
                    <li><a href="{{ route('customer.buatkonsultasi.index') }}"><i class='bx bx-copy'></i> Perkara Baru</a></li>
                    <li><a href="{{ route('customer.tracking.index') }}"><i class='bx bx-message'></i> Track Your Case</a></li>
                </ul>
            </div>

            <div class="sidebar-footer">
                <!-- <div class="help-box">
                    <i class='bx bx-headphone'></i>
                    <h4>Butuh bantuan?</h4>
                    <p>Tim kami siap membantu penggunaan portal Anda.</p>
                    <a href="#" class="help-link">Pusat bantuan <i class='bx bx-link-external'></i></a>
                </div> -->
                <a href="{{ route('customer.akun.index') }}" class="settings-link"><i class='bx bx-cog'></i> Pengaturan akun</a>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="main-wrapper">
            
            <!-- TOP NAVBAR -->
            <header class="topbar">
                <div class="topbar-left" style="display: flex; align-items: center; gap: 15px;">
                    <button class="mobile-toggle-btn" id="mobileMenuBtn">
                        <i class='bx bx-menu'></i>
                    </button>
                    <div class="breadcrumbs">
                        <span>Portal Klien</span> / <span class="current">Perkara Saya</span>
                    </div>
                </div>
                <div class="topbar-right">
                    <button class="icon-btn"><i class='bx bx-bell'></i></button>
                    <div class="user-profile">
                        <div class="avatar">
                            <i class='bx bx-user'></i>
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{ $customer['full_name'] ?? 'Akun Anda' }}</span>
                            <span class="user-role">Klien</span>
                        </div>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                </div>
            </header>

            <!-- PAGE CONTENT -->
            <div class="content-area">
                
                <!-- Page Header -->
                <div class="welcome-section mb-4">
                    <h1 class="page-title text-dark">Perkara Saya</h1>
                    <p class="page-subtitle">Pantau status dan timeline perkara Anda.</p>
                </div>

                @if (session('success'))
                    <div class="alert-success" role="alert">
                        <i class='bx bx-check-circle'></i> {{ session('success') }}
                    </div>
                @endif

                <!-- Main Card untuk Tabel -->
                <div class="card p-0 bg-white border-none rounded-lg shadow-sm">
                    
                    <!-- Card Header -->
                    <div class="card-header-table px-4 py-4 border-bottom">
                        <div class="header-title-wrap">
                            <div class="icon-box-sm bg-light-blue text-blue rounded-md"><i class='bx bx-file'></i></div>
                            <h3 class="text-lg font-bold text-dark m-0">Perkara Saya</h3>
                        </div>
                        <a href="{{ route('customer.perkaralama.index') }}" class="text-blue font-medium text-sm text-decoration-none hover-underline">
                            Lihat Semua <i class='bx bx-right-arrow-alt text-lg'></i>
                        </a>
                    </div>

                    <!-- Table Container -->
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th width="6%">No.</th>
                                    <th width="18%">Nomor Perkara</th>
                                    <th width="26%">Jenis Perkara</th>
                                    <th width="18%">Status</th>
                                    <th width="18%">Tanggal Masuk</th>
                                    <th width="14%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bookings as $index => $case)
                                    <tr>
                                        <td>{{ $index + 1 }}.</td>
                                        <td class="font-medium text-dark">{{ $case['case_number'] }}</td>
                                        <td>{{ $case['legal_field_name'] }}</td>
                                        <td>
                                            @if ($case['display_status'] === 'Selesai')
                                                <span class="status-badge badge-green"><i class='bx bxs-circle'></i> Selesai</span>
                                            @else
                                                <span class="status-badge badge-blue"><i class='bx bxs-circle'></i> {{ $case['display_status'] }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $case['formatted_date'] }}</td>
                                        <td class="text-center">
                                            @if ($case['display_status'] === 'Selesai')
                                                <button
                                                    type="button"
                                                    class="btn-action btn-action-detail open-case-modal-btn"
                                                    data-mode="detail"
                                                    data-case='@json($case)'
                                                >
                                                    Detail
                                                </button>
                                            @else
                                                <button
                                                    type="button"
                                                    class="btn-action btn-action-edit open-case-modal-btn"
                                                    data-mode="edit"
                                                    data-case='@json($case)'
                                                >
                                                    Edit
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-muted">
                                            Belum ada data perkara yang terdaftar.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Footer -->
                    <div class="pagination-footer px-4 py-3 border-top">
                        <div class="pagination-info text-sm text-muted">
                            Menampilkan <span class="font-semibold text-dark">1-{{ count($bookings) }}</span> dari <span class="font-semibold text-dark">{{ $totalBookings }}</span> perkara
                        </div>
                        <div class="pagination-controls">
                            <button class="btn-page btn-page-nav text-muted" disabled><i class='bx bx-chevron-left'></i> Sebelumnya</button>
                            <button class="btn-page active">1</button>
                            <button class="btn-page">2</button>
                            <button class="btn-page">3</button>
                            <button class="btn-page">4</button>
                            <span class="page-dots text-muted">...</span>
                            <button class="btn-page">5</button>
                            <button class="btn-page btn-page-nav text-dark">Selanjutnya <i class='bx bx-chevron-right'></i></button>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <!-- ==================== MODAL INFORMASI REGISTRASI PERKARA ==================== -->
    <div class="modal-backdrop" id="caseModalBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="dialog" aria-modal="true" aria-labelledby="modalCaseTitle">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <div class="modal-header-left">
                    <div class="modal-folder-icon">
                        <i class='bx bx-folder'></i>
                    </div>
                    <div>
                        <h3 id="modalCaseTitle" class="modal-title">
                            Informasi Registrasi Perkara ( <span id="modalRegNumber" class="text-blue">KP-2026-001</span> )
                        </h3>
                        <p class="modal-subtitle">Data dan berkas awal yang diinputkan saat pendaftaran perkara portal hukum</p>
                    </div>
                </div>
                <button type="button" class="modal-close-btn" id="closeCaseModalBtn" aria-label="Tutup">
                    <i class='bx bx-x'></i>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- BAGIAN 1: DATA DIRI KLIEN -->
                <div class="modal-section">
                    <div class="section-heading-row">
                        <h4 class="section-heading">BAGIAN 1: DATA DIRI KLIEN</h4>
                        <span class="verified-note" id="modalVerifiedNote">Terverifikasi via KTP Digital</span>
                    </div>

                    <div class="info-grid-3">
                        <div class="info-item">
                            <span class="info-label">NAMA LENGKAP KLIEN</span>
                            <span class="info-value" id="modalApplicantName">-</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">NIK / NO. IDENTITAS</span>
                            <span class="info-value" id="modalNik">-</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">NOMOR TELEPON / WHATSAPP</span>
                            <div class="phone-value-wrap">
                                <span class="info-value text-green" id="modalPhone">-</span>
                                <span class="badge-aktif">Aktif</span>
                            </div>
                        </div>
                        <div class="info-item">
                            <span class="info-label">EMAIL KLIEN</span>
                            <span class="info-value" id="modalEmail">-</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">PEKERJAAN</span>
                            <span class="info-value" id="modalOccupation">-</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">TANGGAL LAHIR</span>
                            <span class="info-value" id="modalBirthPlaceDate">-</span>
                        </div>
                    </div>

                    <div class="info-item mt-3">
                        <span class="info-label">ALAMAT</span>
                        <span class="info-value" id="modalAddress">-</span>
                    </div>
                </div>

                <hr class="modal-divider">

                <!-- BAGIAN 2: DETAIL INFORMASI PERKARA -->
                <div class="modal-section">
                    <div class="section-heading-row">
                        <h4 class="section-heading">BAGIAN 2: DETAIL INFORMASI PERKARA</h4>
                    </div>

                    <div class="info-grid-2">
                        <div class="info-item">
                            <span class="info-label">Kategori</span>
                            <div>
                                <span class="category-pill" id="modalCategoryName">-</span>
                            </div>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Bidang Hukum</span>
                            <span class="info-value" id="modalLegalFieldName">-</span>
                        </div>
                    </div>

                    <div class="info-item mt-3">
                        <span class="info-label">Pihak Tergugat</span>
                        <span class="info-value" id="modalDefendant">-</span>
                    </div>

                    <div class="info-item mt-3">
                        <span class="info-label">Judul</span>
                        <span class="info-value" id="modalConsultationTitle">-</span>
                    </div>

                    <div class="info-item mt-3">
                        <span class="info-label">Ringkasan</span>
                        <div class="summary-box" id="modalCaseSummary">-</div>
                    </div>
                </div>

                <hr class="modal-divider">

                <!-- BAGIAN 3: DOKUMEN PERKARA AWAL -->
                <div class="modal-section">
                    <div class="section-heading-row doc-header-row">
                        <h4 class="section-heading">BAGIAN 3: DOKUMEN PERKARA AWAL</h4>
                        <div class="doc-actions-header">
                            <span class="doc-count-text" id="modalDocCount">0 Berkas Tersedia</span>
                            {{-- Tombol ini hanya muncul saat mode EDIT --}}
                            <button type="button" class="btn-add-doc" id="btnToggleUploadDoc">
                                <i class='bx bx-plus'></i> Tambah Dokumen
                            </button>
                        </div>
                    </div>

                    {{-- Form Upload Dokumen Tambahan (Khusus Mode Edit) --}}
                    <form id="uploadDocumentForm" action="" method="POST" enctype="multipart/form-data" class="upload-doc-box hidden">
                        @csrf
                        <div class="upload-form-grid">
                            <input type="text" name="document_name" class="upload-input" placeholder="Nama dokumen (misal: Bukti_Transfer.pdf)" required>
                            <input type="file" name="document_file" class="upload-file-input" accept=".pdf,.png,.jpg,.jpeg" required>
                            <button type="submit" class="btn-submit-doc">Unggah</button>
                        </div>
                    </form>

                    <!-- Daftar Dokumen dari tabel BOOKING_DOCUMENT -->
                    <div class="document-list" id="modalDocumentList">
                        <!-- Di-render dinamis oleh JS -->
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('js/customer/perkaralama.js') }}"></script>
</body>
</html>