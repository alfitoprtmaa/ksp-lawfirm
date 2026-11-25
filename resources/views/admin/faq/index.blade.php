<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data FAQ - Lawyer Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/datafaq/index.css') }}">
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
                    <li><a href="{{ route('admin.role.index') }}">Data Role</a></li>
                    <li><a href="{{ route('admin.klien.index') }}">Data Pengguna</a></li>
                </ul>
            </div>

            <!-- MENU AKTIF: MANAJEMEN KONTEN -> DATA FAQ -->
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
                    <li><a href="{{ route('admin.faq.index') }}" class="active-sub">Data FAQ</a></li>
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
                <span>Manajemen Konten</span>
                <i class='bx bx-chevron-right'></i>
                <span class="current">Data FAQ</span>
            </div>

            <div class="page-header">
                <div>
                    <h2>Data FAQ</h2>
                    <p>Kelola pertanyaan dan jawaban untuk membantu pengguna.</p>
                </div>
                <button type="button" class="btn-maroon" id="btnOpenAddFaqModal">
                    <i class='bx bx-plus'></i>
                    <span>Tambah FAQ</span>
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
                        <i class='bx bx-help-circle'></i>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Total FAQ</span>
                        <strong class="metric-value">{{ $stats['total'] }}</strong>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-icon icon-emerald">
                        <i class='bx bx-check-circle'></i>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Dipublikasikan</span>
                        <strong class="metric-value">{{ $stats['published'] }}</strong>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-icon icon-amber">
                        <i class='bx bx-file'></i>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Draf</span>
                        <strong class="metric-value">{{ $stats['draft'] }}</strong>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-icon icon-slate">
                        <i class='bx bx-grid-alt'></i>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Kategori</span>
                        <strong class="metric-value">{{ $stats['categories'] }}</strong>
                    </div>
                </div>
            </section>

            <!-- FILTER BAR -->
            <section class="filter-bar">
                <div class="search-box">
                    <i class='bx bx-search'></i>
                    <input type="text" id="searchFaqInput" placeholder="Cari pertanyaan atau jawaban FAQ...">
                </div>

                <div class="select-box">
                    <select id="filterFaqCategory">
                        <option value="all">Semua Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}">{{ $cat }}</option>
                        @endforeach
                    </select>
                    <i class='bx bx-chevron-down'></i>
                </div>

                <div class="select-box">
                    <select id="filterFaqStatus">
                        <option value="all">Semua Status</option>
                        <option value="Dipublikasikan">Dipublikasikan</option>
                        <option value="Draf">Draf</option>
                    </select>
                    <i class='bx bx-chevron-down'></i>
                </div>

                <button type="button" class="btn-reset" id="btnResetFaqFilter">
                    <i class='bx bx-refresh'></i>
                    <span>Reset</span>
                </button>
            </section>

            <!-- TABEL DATA FAQ -->
            <section class="table-card">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="col-no">NO</th>
                                <th class="col-qa">PERTANYAAN &amp; JAWABAN</th>
                                <th class="col-cat">KATEGORI</th>
                                <th class="col-status">STATUS</th>
                                <th class="col-updated">DIPERBARUI</th>
                                <th class="col-action text-right">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="faqTableBody">
                            @foreach($faqs as $idx => $faq)
                                @php
                                    $isPublished = $faq['is_active'];
                                @endphp
                                <tr data-search="{{ strtolower($faq['question'] . ' ' . $faq['answer']) }}"
                                    data-category="{{ $faq['category'] }}"
                                    data-status="{{ $faq['status_label'] }}">
                                    <td class="col-no text-muted">{{ $idx + 1 }}</td>
                                    <td class="col-qa">
                                        <span class="faq-question">{{ $faq['question'] }}</span>
                                        <span class="faq-answer">{{ $faq['answer'] }}</span>
                                    </td>
                                    <td class="col-cat">
                                        <span class="category-badge">{{ $faq['category'] }}</span>
                                    </td>
                                    <td class="col-status">
                                        <span class="status-pill {{ $isPublished ? 'status-published' : 'status-draft' }}">
                                            <span class="status-dot"></span>
                                            <span>{{ $faq['status_label'] }}</span>
                                        </span>
                                    </td>
                                    <td class="col-updated">
                                        <span class="updated-date">{{ $faq['updated_date'] }}</span>
                                        <span class="updated-sub">{{ $faq['updated_by'] }}</span>
                                    </td>
                                    <td class="col-action text-right">
                                        <div class="action-buttons">
                                            <button
                                                type="button"
                                                class="btn-icon-edit"
                                                title="Edit FAQ"
                                                data-faq='@json($faq)'
                                            >
                                                <i class='bx bx-pencil'></i>
                                            </button>

                                            <form action="{{ route('admin.faq.destroy', $faq['faq_id']) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Hapus FAQ ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-icon-delete" title="Hapus FAQ">
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
                    <span id="faqShowingText">Menampilkan 1–{{ count($faqs) }} dari {{ $stats['total'] }} FAQ</span>

                    <div class="pagination-controls">
                        <button type="button" class="page-btn" disabled><i class='bx bx-chevron-left'></i></button>
                        <button type="button" class="page-btn active">1</button>
                        <button type="button" class="page-btn">2</button>
                        <button type="button" class="page-btn">3</button>
                        <button type="button" class="page-btn">4</button>
                        <button type="button" class="page-btn">5</button>
                        <button type="button" class="page-btn"><i class='bx bx-chevron-right'></i></button>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

<!-- ==================== MODAL 1: TAMBAH FAQ ==================== -->
<div class="modal-overlay" id="addFaqModal" aria-hidden="true">
    <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="addFaqTitle">
        <div class="modal-header">
            <div>
                <h3 id="addFaqTitle">Tambah FAQ</h3>
                <p>Tambahkan pertanyaan dan jawaban baru untuk ditampilkan kepada pengguna.</p>
            </div>
            <button type="button" class="btn-modal-close" data-close-modal="addFaqModal" aria-label="Tutup">
                <i class='bx bx-x'></i>
            </button>
        </div>

        <form action="{{ route('admin.faq.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <!-- Pertanyaan -->
                <div class="form-group">
                    <label for="add_faq_question">Pertanyaan *</label>
                    <input
                        type="text"
                        id="add_faq_question"
                        name="question"
                        class="form-control"
                        placeholder="Contoh: Bagaimana cara menjadwalkan ulang konsultasi?"
                        required
                    >
                </div>

                <!-- Kategori & Urutan Tampil -->
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="add_faq_category">Kategori *</label>
                        <div class="select-wrapper">
                            <select id="add_faq_category" name="category" class="form-control" required>
                                <option value="">Pilih kategori</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}">{{ $cat }}</option>
                                @endforeach
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="add_faq_order">Urutan Tampil</label>
                        <input
                            type="number"
                            id="add_faq_order"
                            name="display_order"
                            min="1"
                            class="form-control"
                            value="{{ count($faqs) + 1 }}"
                        >
                        <span class="field-hint">Urutan kemunculan pada halaman FAQ.</span>
                    </div>
                </div>

                <!-- Jawaban -->
                <div class="form-group">
                    <label for="add_faq_answer">Jawaban *</label>
                    <textarea
                        id="add_faq_answer"
                        name="answer"
                        rows="4"
                        class="form-control"
                        placeholder="Tuliskan jawaban yang jelas dan ringkas untuk pengguna..."
                        required
                    ></textarea>
                </div>

                <!-- Status Publikasi (is_active) -->
                <div class="form-group">
                    <label>Status Publikasi *</label>
                    <div class="status-radio-grid">
                        <label class="status-radio-card selected">
                            <input type="radio" name="is_active" value="1" checked>
                            <span class="radio-dot"></span>
                            <div>
                                <strong>Dipublikasikan</strong>
                                <span>Langsung tampil di halaman FAQ website.</span>
                            </div>
                        </label>

                        <label class="status-radio-card">
                            <input type="radio" name="is_active" value="0">
                            <span class="radio-dot"></span>
                            <div>
                                <strong>Draf</strong>
                                <span>Simpan sementara tanpa ditampilkan ke publik.</span>
                            </div>
                        </label>
                    </div>
                </div>

                <span class="required-note">* Wajib diisi</span>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-cancel" data-close-modal="addFaqModal">Batal</button>
                <button type="submit" class="btn-maroon btn-submit">Simpan FAQ</button>
            </div>
        </form>
    </div>
</div>

<!-- ==================== MODAL 2: EDIT FAQ ==================== -->
<div class="modal-overlay" id="editFaqModal" aria-hidden="true">
    <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="editFaqTitle">
        <div class="modal-header">
            <div>
                <h3 id="editFaqTitle">Edit FAQ</h3>
                <p>Perbarui pertanyaan, jawaban, kategori, atau status publikasi FAQ.</p>
            </div>
            <button type="button" class="btn-modal-close" data-close-modal="editFaqModal" aria-label="Tutup">
                <i class='bx bx-x'></i>
            </button>
        </div>

        <form action="" method="POST" id="editFaqForm">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label for="edit_faq_question">Pertanyaan *</label>
                    <input type="text" id="edit_faq_question" name="question" class="form-control" required>
                </div>

                <div class="form-row-2">
                    <div class="form-group">
                        <label for="edit_faq_category">Kategori *</label>
                        <div class="select-wrapper">
                            <select id="edit_faq_category" name="category" class="form-control" required>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}">{{ $cat }}</option>
                                @endforeach
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit_faq_order">Urutan Tampil *</label>
                        <input type="number" id="edit_faq_order" name="display_order" min="1" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_faq_answer">Jawaban *</label>
                    <textarea id="edit_faq_answer" name="answer" rows="4" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label>Status Publikasi *</label>
                    <div class="status-radio-grid" id="editStatusRadioGrid">
                        <label class="status-radio-card">
                            <input type="radio" name="is_active" value="1">
                            <span class="radio-dot"></span>
                            <div>
                                <strong>Dipublikasikan</strong>
                                <span>Tampil di halaman FAQ website.</span>
                            </div>
                        </label>

                        <label class="status-radio-card">
                            <input type="radio" name="is_active" value="0">
                            <span class="radio-dot"></span>
                            <div>
                                <strong>Draf</strong>
                                <span>Disimpan sementara (tidak tampil).</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-cancel" data-close-modal="editFaqModal">Batal</button>
                <button type="submit" class="btn-maroon btn-submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('js/admin/datafaq.js') }}"></script>
</body>
</html>