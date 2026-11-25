<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Advokat - Lawyer Admin</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/admin/advokat/index.css') }}">
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

            <div class="nav-group">
                <button type="button" class="nav-item has-dropdown">
                    <div class="nav-label">
                        <i class='bx bx-video nav-icon'></i>
                        <span>Kelola Konsultasi</span>
                    </div>
                    <i class='bx bx-chevron-down chevron'></i>
                </button>
                <ul class="submenu">
                    <li><a href="{{ route('admin.konsultasionline.index') }}">Konsultasi Online</a></li>
                    <li><a href="#">Jadwal Konsultasi</a></li>
                </ul>
            </div>

            <a href="{{ route('admin.perkara.index') }}" class="nav-item">
                <i class='bx bx-folder nav-icon'></i>
                <span>Konsultasi Perkara</span>
            </a>

            <!-- MENU AKTIF: AKSES PENGGUNA -> DATA ADVOKAT -->
            <div class="nav-group open">
                <button type="button" class="nav-item has-dropdown">
                    <div class="nav-label">
                        <i class='bx bx-group nav-icon'></i>
                        <span>Akses Pengguna</span>
                    </div>
                    <i class='bx bx-chevron-down chevron'></i>
                </button>
                <ul class="submenu">
                    <li><a href="{{ route('admin.advokat.index') }}" class="active-sub">Data Advokat</a></li>
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
                <span>Akses Pengguna</span>
                <i class='bx bx-chevron-right'></i>
                <span class="current">Data Advokat</span>
            </div>

            <div class="page-header">
                <div>
                    <h2>Data Advokat</h2>
                    <p>Kontak WhatsApp satu pintu melalui admin pusat.</p>
                </div>
                <button type="button" class="btn-maroon" id="btnOpenAddLawyerModal">
                    <i class='bx bx-plus'></i>
                    <span>Tambah Advokat</span>
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

            <!-- 4 METRIC CARDS -->
            <section class="metrics-grid-4">
                <div class="metric-card">
                    <div class="metric-icon icon-maroon">
                        <i class='bx bx-group'></i>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Total Advokat</span>
                        <strong class="metric-value">{{ $stats['total'] }}</strong>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-icon icon-emerald">
                        <i class='bx bx-user-check'></i>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Aktif</span>
                        <strong class="metric-value">{{ $stats['active'] }}</strong>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-icon icon-amber">
                        <i class='bx bx-time-five'></i>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Tidak Aktif</span>
                        <strong class="metric-value">{{ $stats['inactive'] }}</strong>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-icon icon-slate">
                        <i class='bx bx-user-x'></i>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Nonaktif</span>
                        <strong class="metric-value">{{ $stats['disabled'] }}</strong>
                    </div>
                </div>
            </section>

            <!-- FILTER BAR -->
            <section class="filter-bar">
                <div class="search-box">
                    <i class='bx bx-search'></i>
                    <input type="text" id="searchLawyerInput" placeholder="Cari nama advokat atau spesialisasi...">
                </div>

                <div class="select-box">
                    <select id="filterSpecSelect">
                        <option value="all">Semua Spesialisasi</option>
                        @foreach($specializations as $spec)
                            <option value="{{ $spec }}">{{ $spec }}</option>
                        @endforeach
                    </select>
                    <i class='bx bx-chevron-down'></i>
                </div>

                <div class="select-box">
                    <select id="filterStatusSelect">
                        <option value="all">Semua Status</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                    <i class='bx bx-chevron-down'></i>
                </div>

                <button type="button" class="btn-reset" id="btnResetLawyerFilter">
                    <i class='bx bx-refresh'></i>
                    <span>Reset</span>
                </button>
            </section>

            <!-- TABEL DATA ADVOKAT -->
            <section class="table-card">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>FOTO</th>
                                <th>NAMA ADVOKAT</th>
                                <th>SPESIALISASI</th>
                                <th>DESKRIPSI DIRI</th>
                                <th>LINKEDIN (OPSIONAL)</th>
                                <th class="text-right">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="lawyersTableBody">
                            @foreach($lawyers as $lawyer)
                                <tr data-search="{{ strtolower($lawyer['full_name'] . ' ' . $lawyer['specialization']) }}"
                                    data-spec="{{ $lawyer['specialization'] }}"
                                    data-status="{{ $lawyer['account_status'] }}">
                                    <td class="col-photo">
                                        <img
                                            src="{{ asset($lawyer['photo_path']) }}"
                                            alt="{{ $lawyer['full_name'] }}"
                                            class="lawyer-table-avatar"
                                            onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($lawyer['full_name']) }}&background=6B2130&color=fff'"
                                        >
                                    </td>
                                    <td class="col-name">
                                        <strong>{{ $lawyer['full_name'] }}</strong>
                                    </td>
                                    <td class="col-spec">
                                        <span class="spec-badge">{{ $lawyer['specialization'] }}</span>
                                    </td>
                                    <td class="col-desc">
                                        <p class="desc-clamp">{{ $lawyer['self_description'] }}</p>
                                    </td>
                                    <td class="col-linkedin">
                                        @if(!empty($lawyer['linkedin_url']))
                                            <a href="{{ $lawyer['linkedin_url'] }}" target="_blank" class="linkedin-link">
                                                {{ $lawyer['linkedin_display'] }}
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="col-action text-right">
                                        <div class="action-buttons">
                                            <button
                                                type="button"
                                                class="btn-icon-edit"
                                                title="Edit Advokat"
                                                data-lawyer='@json($lawyer)'
                                            >
                                                <i class='bx bx-pencil'></i>
                                            </button>

                                            <form action="{{ route('admin.advokat.destroy', $lawyer['lawyer_id']) }}"
                                                  method="POST"
                                                  class="delete-lawyer-form"
                                                  onsubmit="return confirm('Hapus data advokat {{ $lawyer['full_name'] }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-icon-delete" title="Hapus Advokat">
                                                    <i class='bx bx-trash'></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="table-footer">
                    <span id="lawyerShowingText">Menampilkan 1–{{ count($lawyers) }} dari {{ $stats['total'] }} data</span>

                    <div class="pagination-controls">
                        <button type="button" class="page-btn" disabled><i class='bx bx-chevron-left'></i></button>
                        <button type="button" class="page-btn active">1</button>
                        <button type="button" class="page-btn">2</button>
                        <button type="button" class="page-btn">3</button>
                        <button type="button" class="page-btn">4</button>
                        <button type="button" class="page-btn">5</button>
                        <span class="page-dots">...</span>
                        <button type="button" class="page-btn">9</button>
                        <button type="button" class="page-btn"><i class='bx bx-chevron-right'></i></button>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

<!-- ==================== MODAL 1: TAMBAH ADVOKAT ==================== -->
<div class="modal-overlay" id="addLawyerModal" aria-hidden="true">
    <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="addModalTitle">
        <div class="modal-header">
            <div>
                <h3 id="addModalTitle">Tambah Advokat</h3>
                <p>Lengkapi informasi advokat untuk menambah data baru.</p>
            </div>
            <button type="button" class="btn-modal-close" data-close-modal="addLawyerModal">
                <i class='bx bx-x'></i>
            </button>
        </div>

        <form action="{{ route('admin.advokat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <!-- Foto Advokat -->
                <div class="photo-upload-box">
                    <div class="photo-upload-left">
                        <img src="https://ui-avatars.com/api/?name=Adv&background=F3E8EA&color=6B2130" alt="Preview" id="addPhotoPreview" class="upload-preview-thumb" style="display:none;">
                        <div>
                            <strong>Foto advokat</strong>
                            <span>Opsional &bull; JPG atau PNG, maksimal 2 MB</span>
                        </div>
                    </div>
                    <label class="btn-outline-sm">
                        <span>Pilih foto</span>
                        <input type="file" name="photo" accept="image/png,image/jpeg" class="hidden-file-input" data-preview="addPhotoPreview">
                    </label>
                </div>

                <!-- Nama Lengkap & Spesialisasi -->
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="add_full_name">Nama lengkap *</label>
                        <input type="text" id="add_full_name" name="full_name" class="form-control" placeholder="Masukkan nama lengkap beserta gelar" required>
                    </div>

                    <div class="form-group">
                        <label for="add_specialization">Spesialisasi *</label>
                        <div class="select-wrapper">
                            <select id="add_specialization" name="specialization" class="form-control" required>
                                <option value="">Pilih spesialisasi</option>
                                @foreach($specializations as $spec)
                                    <option value="{{ $spec }}">{{ $spec }}</option>
                                @endforeach
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                    </div>
                </div>

                <!-- Nomor Telepon & Email -->
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="add_phone">Nomor telepon *</label>
                        <input type="text" id="add_phone" name="phone" class="form-control" placeholder="Contoh: 0812-3456-7890" required>
                    </div>

                    <div class="form-group">
                        <label for="add_email">Email *</label>
                        <input type="email" id="add_email" name="email" class="form-control" placeholder="Contoh: nama@lawfirm.id" required>
                    </div>
                </div>

                <!-- NIA & Role Pengguna -->
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="add_nia">NIA — Nomor Induk Advokat *</label>
                        <input type="text" id="add_nia" name="nia" class="form-control" placeholder="Contoh: 24.02369" required>
                        <span class="field-hint">7 digit angka; contoh lain: 15.03602.</span>
                    </div>

                    <div class="form-group">
                        <label>Role pengguna *</label>
                        <div class="role-radio-grid">
                            <label class="role-radio-card">
                                <input type="radio" name="role_name" value="Klien">
                                <span class="radio-dot"></span>
                                <span>Klien</span>
                            </label>
                            <label class="role-radio-card">
                                <input type="radio" name="role_name" value="Lawyer" checked>
                                <span class="radio-dot"></span>
                                <span>Lawyer</span>
                            </label>
                            <label class="role-radio-card">
                                <input type="radio" name="role_name" value="Admin">
                                <span class="radio-dot"></span>
                                <span>Admin</span>
                            </label>
                        </div>
                        <span class="field-hint">Lawyer untuk akun advokat.</span>
                    </div>
                </div>

                <!-- Status -->
                <div class="form-row-2 align-center">
                    <div class="form-group">
                        <label for="add_status">Status *</label>
                        <div class="select-wrapper">
                            <select id="add_status" name="account_status" class="form-control" required>
                                <option value="Aktif" selected>Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                    </div>
                    <p class="status-side-note">Advokat baru akan ditambahkan dengan status yang dipilih.</p>
                </div>

                <!-- Artikel Terkait (Multi-select Interaktif) -->
                <div class="form-group">
                    <label>Artikel terkait</label>
                    <div class="multi-article-picker" id="addArticlePicker">
                        <button type="button" class="picker-trigger">
                            <span class="picker-placeholder">Pilih artikel yang sudah didaftarkan</span>
                            <i class='bx bx-chevron-down'></i>
                        </button>
                        <div class="picker-dropdown">
                            @foreach($articles as $art)
                                <label class="picker-option">
                                    <input type="checkbox" name="article_ids[]" value="{{ $art['article_id'] }}">
                                    <span>{{ $art['title'] }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <span class="field-hint">Dapat memilih lebih dari satu artikel untuk ditampilkan pada profil advokat.</span>
                </div>

                <span class="required-note">* Wajib diisi</span>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-cancel" data-close-modal="addLawyerModal">Batal</button>
                <button type="submit" class="btn-maroon btn-submit">Simpan advokat</button>
            </div>
        </form>
    </div>
</div>

<!-- ==================== MODAL 2: EDIT ADVOKAT ==================== -->
<div class="modal-overlay" id="editLawyerModal" aria-hidden="true">
    <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="editModalTitle">
        <div class="modal-header">
            <div>
                <h3 id="editModalTitle">Edit Advokat</h3>
                <p>Perbarui informasi profil advokat yang ditampilkan.</p>
            </div>
            <button type="button" class="btn-modal-close" data-close-modal="editLawyerModal">
                <i class='bx bx-x'></i>
            </button>
        </div>

        <form action="" method="POST" id="editLawyerForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <!-- Foto Profil -->
                <div class="form-group">
                    <label>Foto profil</label>
                    <div class="edit-photo-row">
                        <img src="" alt="Foto Profil" id="editPhotoPreview" class="edit-avatar-large">
                        <div class="edit-photo-actions">
                            <label class="btn-outline-sm">
                                <span>Ubah foto</span>
                                <input type="file" name="photo" accept="image/png,image/jpeg" class="hidden-file-input" data-preview="editPhotoPreview">
                            </label>
                            <span class="field-hint">JPG atau PNG, maks. 2 MB.</span>
                        </div>
                    </div>
                </div>

                <!-- Nama Lengkap & NIA -->
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="edit_full_name">Nama lengkap</label>
                        <input type="text" id="edit_full_name" name="full_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_nia">NIA — Nomor Induk Advokat *</label>
                        <input type="text" id="edit_nia" name="nia" class="form-control" placeholder="Contoh: 24.02369" required>
                        <span class="field-hint">7 digit angka; contoh lain: 15.03602.</span>
                    </div>
                </div>

                <!-- Spesialisasi & Role Pengguna -->
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="edit_specialization">Spesialisasi</label>
                        <div class="select-wrapper">
                            <select id="edit_specialization" name="specialization" class="form-control" required>
                                @foreach($specializations as $spec)
                                    <option value="{{ $spec }}">{{ $spec }}</option>
                                @endforeach
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Role pengguna *</label>
                        <div class="role-radio-grid">
                            <label class="role-radio-card">
                                <input type="radio" name="role_name" value="Klien">
                                <span class="radio-dot"></span>
                                <span>Klien</span>
                            </label>
                            <label class="role-radio-card">
                                <input type="radio" name="role_name" value="Lawyer">
                                <span class="radio-dot"></span>
                                <span>Lawyer</span>
                            </label>
                            <label class="role-radio-card">
                                <input type="radio" name="role_name" value="Admin">
                                <span class="radio-dot"></span>
                                <span>Admin</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi Diri -->
                <div class="form-group">
                    <label for="edit_self_description">Deskripsi diri</label>
                    <textarea id="edit_self_description" name="self_description" rows="3" class="form-control"></textarea>
                </div>

                <!-- LinkedIn (Opsional) -->
                <div class="form-group">
                    <label for="edit_linkedin_url">LinkedIn (opsional)</label>
                    <input type="url" id="edit_linkedin_url" name="linkedin_url" class="form-control" placeholder="https://www.linkedin.com/in/username">
                    <span class="field-hint">Gunakan URL profil LinkedIn lengkap. Boleh dikosongkan.</span>
                </div>

                <!-- Artikel Terkait -->
                <div class="form-group">
                    <label>Artikel terkait</label>
                    <div class="multi-article-picker" id="editArticlePicker">
                        <button type="button" class="picker-trigger">
                            <span class="picker-placeholder">Pilih artikel yang sudah didaftarkan</span>
                            <i class='bx bx-chevron-down'></i>
                        </button>
                        <div class="picker-dropdown">
                            @foreach($articles as $art)
                                <label class="picker-option">
                                    <input type="checkbox" name="article_ids[]" value="{{ $art['article_id'] }}">
                                    <span>{{ $art['title'] }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <span class="field-hint">Dapat memilih lebih dari satu artikel untuk ditampilkan pada profil advokat.</span>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-cancel" data-close-modal="editLawyerModal">Batal</button>
                <button type="submit" class="btn-maroon btn-submit">Simpan perubahan</button>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('js/admin/advokat.js') }}"></script>
</body>
</html>