<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pusat Referensi - Lawyer Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/referensi/index.css') }}">
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

            <!-- MENU AKTIF: KELOLA PUSAT REFERENSI -->
            <a href="{{ route('admin.referensi.index') }}" class="nav-item active">
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
                <span>Kelola Pusat Referensi</span>
                <i class='bx bx-chevron-right'></i>
                <span class="current">Daftar Referensi</span>
            </div>

            <div class="page-header">
                <div>
                    <h2>Kelola Pusat Referensi</h2>
                    <p>Data contoh — kategori mengikuti perkara pada Case ID yang sama.</p>
                </div>
                <button type="button" class="btn-maroon" id="btnOpenAddDocModal">
                    <i class='bx bx-plus'></i>
                    <span>Tambah Dokumen</span>
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
                        <i class='bx bx-book-open'></i>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Total Referensi</span>
                        <strong class="metric-value">{{ $stats['total'] }}</strong>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-icon icon-maroon">
                        <i class='bx bx-book'></i>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Peraturan Perundang-undangan</span>
                        <strong class="metric-value">{{ $stats['regulations'] }}</strong>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-icon icon-emerald">
                        <i class='bx bx-file'></i>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Putusan Pengadilan</span>
                        <strong class="metric-value">{{ $stats['verdicts'] }}</strong>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-icon icon-amber">
                        <i class='bx bx-news'></i>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Jurnal &amp; Artikel</span>
                        <strong class="metric-value">{{ $stats['journals'] }}</strong>
                    </div>
                </div>
            </section>

            <!-- FILTER BAR -->
            <section class="filter-bar">
                <div class="search-box">
                    <i class='bx bx-search'></i>
                    <input type="text" id="searchRefInput" placeholder="Cari Case ID, nama dokumen, atau lawyer...">
                </div>

                <div class="select-box">
                    <select id="filterRefCategory">
                        <option value="all">Semua Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}">{{ $cat }}</option>
                        @endforeach
                    </select>
                    <i class='bx bx-chevron-down'></i>
                </div>

                <div class="select-box">
                    <select id="filterRefStatus">
                        <option value="all">Semua Status</option>
                        <option value="Publik">Publik</option>
                        <option value="Draf">Draf</option>
                    </select>
                    <i class='bx bx-chevron-down'></i>
                </div>

                <button type="button" class="btn-reset" id="btnResetRefFilter">
                    <i class='bx bx-refresh'></i>
                    <span>Reset</span>
                </button>
            </section>

            <!-- TABEL PUSAT REFERENSI -->
            <section class="table-card">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="col-case">CASE ID</th>
                                <th class="col-doc">NAMA DOKUMEN</th>
                                <th class="col-cat">KATEGORI</th>
                                <th class="col-date">TANGGAL</th>
                                <th class="col-lawyer">LAWYER</th>
                                <th class="col-status">STATUS</th>
                                <th class="col-action text-right">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="refTableBody">
                            @foreach($references as $ref)
                                @php
                                    $isPublic = $ref['status'] === 'Publik';
                                @endphp
                                <tr data-search="{{ strtolower($ref['case_code'] . ' ' . $ref['title'] . ' ' . $ref['subtitle'] . ' ' . $ref['lawyer_name']) }}"
                                    data-category="{{ $ref['category'] }}"
                                    data-status="{{ $ref['status'] }}">
                                    <td class="col-case text-muted">{{ $ref['case_code'] }}</td>
                                    <td class="col-doc">
                                        <div class="doc-cell-flex">
                                            @if($ref['file_type'] === 'pdf')
                                                <span class="file-type-badge type-pdf">PDF</span>
                                            @elseif($ref['file_type'] === 'doc')
                                                <span class="file-type-badge type-word">W</span>
                                            @else
                                                <span class="file-type-badge type-link"><i class='bx bx-link'></i></span>
                                            @endif
                                            <div class="doc-text-wrap">
                                                <span class="doc-title">{{ $ref['title'] }}</span>
                                                <span class="doc-subtitle">{{ $ref['subtitle'] }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-cat">
                                        <span class="category-badge">{{ $ref['category'] }}</span>
                                    </td>
                                    <td class="col-date text-muted">{{ $ref['published_at'] }}</td>
                                    <td class="col-lawyer text-dark-sub">{{ $ref['lawyer_name'] }}</td>
                                    <td class="col-status">
                                        <span class="status-pill {{ $isPublic ? 'status-public' : 'status-draft' }}">
                                            <span class="status-dot"></span>
                                            <span>{{ $ref['status'] }}</span>
                                        </span>
                                    </td>
                                    <td class="col-action text-right">
                                        <div class="action-buttons">
                                            <button
                                                type="button"
                                                class="btn-icon-action btn-preview-ref"
                                                title="Lihat Detail Dokumen"
                                                data-ref='@json($ref)'
                                            >
                                                <i class='bx bx-show'></i>
                                            </button>

                                            <button
                                                type="button"
                                                class="btn-icon-action btn-edit-ref"
                                                title="Edit Dokumen"
                                                data-ref='@json($ref)'
                                            >
                                                <i class='bx bx-pencil'></i>
                                            </button>

                                            <form action="{{ route('admin.referensi.destroy', $ref['reference_id']) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Hapus dokumen &quot;{{ $ref['title'] }}&quot;?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-icon-delete" title="Hapus Dokumen">
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
                    <span id="refShowingText">Menampilkan 1 – {{ count($references) }} dari {{ $stats['total'] }} data</span>

                    <div class="pagination-controls">
                        <button type="button" class="page-btn" disabled><i class='bx bx-chevron-left'></i></button>
                        <button type="button" class="page-btn active">1</button>
                        <button type="button" class="page-btn">2</button>
                        <button type="button" class="page-btn">3</button>
                        <button type="button" class="page-btn">4</button>
                        <button type="button" class="page-btn">5</button>
                        <span class="page-dots">...</span>
                        <button type="button" class="page-btn">32</button>
                        <button type="button" class="page-btn"><i class='bx bx-chevron-right'></i></button>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

<!-- ==================== MODAL 1: TAMBAH DOKUMEN ==================== -->
<div class="modal-overlay" id="addDocModal" aria-hidden="true">
    <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="addDocModalTitle">
        <div class="modal-header">
            <div>
                <h3 id="addDocModalTitle">Tambah Dokumen</h3>
                <p>Lengkapi informasi untuk menambahkan dokumen ke Pusat Referensi.</p>
            </div>
            <button type="button" class="btn-modal-close" data-close-modal="addDocModal" aria-label="Tutup">
                <i class='bx bx-x'></i>
            </button>
        </div>

        <form action="{{ route('admin.referensi.store') }}" method="POST" enctype="multipart/form-data" id="addDocForm">
            @csrf
            <input type="hidden" name="document_name" id="hiddenDocName" value="">

            <div class="modal-body">
                <!-- Area Unggah Dokumen (Drag & Drop) -->
                <div class="form-group">
                    <label>Dokumen *</label>
                    <div class="doc-dropzone" id="docDropzone">
                        <div class="dropzone-left">
                            <strong>Seret dokumen ke sini atau pilih dari perangkat</strong>
                            <span class="dropzone-sub">PDF, DOC, atau DOCX &bull; Maksimal 10 MB</span>
                            <span class="dropzone-filename" id="selectedDocFilename">Belum ada dokumen dipilih</span>
                        </div>
                        <label class="btn-choose-doc">
                            <span>Pilih dokumen</span>
                            <input type="file" name="document_file" id="docFileInput" accept=".pdf,.doc,.docx" style="display: none;">
                        </label>
                    </div>
                    <span class="field-hint">Format penamaan dokumen: DOKUMEN_SIDANG (huruf kapital, gunakan _).</span>
                </div>

                <!-- Case ID & Kategori Perkara (otomatis) -->
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="add_case_code">Case ID *</label>
                        <div class="select-wrapper">
                            <select id="add_case_code" name="case_code" class="form-control" required>
                                @foreach($caseMap as $code => $info)
                                    <option value="{{ $code }}"
                                            data-category="{{ $info['category'] }}"
                                            data-lawyer="{{ $info['default_lawyer'] }}">
                                        {{ $code }}
                                    </option>
                                @endforeach
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                        <span class="field-hint">Kategori mengikuti perkara pada Case ID yang dipilih.</span>
                    </div>

                    <div class="form-group">
                        <label for="add_case_category">Kategori perkara</label>
                        <input
                            type="text"
                            id="add_case_category"
                            class="form-control input-readonly"
                            value="Pidana"
                            readonly
                        >
                    </div>
                </div>

                <!-- Jenis Referensi & Lawyer Penanggung Jawab -->
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="add_ref_type">Jenis referensi *</label>
                        <div class="select-wrapper">
                            <select id="add_ref_type" name="reference_type" class="form-control" required>
                                <option value="">Pilih jenis referensi</option>
                                @foreach($referenceTypes as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="add_lawyer_name">Lawyer penanggung jawab *</label>
                        <div class="select-wrapper">
                            <select id="add_lawyer_name" name="lawyer_name" class="form-control" required>
                                @foreach($lawyers as $lawyer)
                                    <option value="{{ $lawyer }}">{{ $lawyer }}</option>
                                @endforeach
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                    </div>
                </div>

                <!-- Tanggal Dokumen & Status Dokumen -->
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="add_doc_date">Tanggal dokumen *</label>
                        <input
                            type="date"
                            id="add_doc_date"
                            name="document_date"
                            class="form-control"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="add_doc_status">Status dokumen *</label>
                        <div class="select-wrapper">
                            <select id="add_doc_status" name="status" class="form-control" required>
                                <option value="Draf" selected>Draf</option>
                                <option value="Publik">Publik</option>
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi (Opsional) -->
                <div class="form-group">
                    <label for="add_doc_desc">Deskripsi (opsional)</label>
                    <textarea
                        id="add_doc_desc"
                        name="description"
                        rows="3"
                        class="form-control"
                        placeholder="Tambahkan ringkasan atau keterangan dokumen..."
                    ></textarea>
                </div>
            </div>

            <div class="modal-footer modal-footer-between">
                <span class="required-note">* Wajib diisi</span>
                <div class="footer-right-btns">
                    <button type="button" class="btn-cancel" data-close-modal="addDocModal">Batal</button>
                    <button type="submit" class="btn-maroon btn-submit">Simpan Dokumen</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- ==================== MODAL 2: PRATINJAU DOKUMEN ==================== -->
<div class="modal-overlay" id="previewDocModal" aria-hidden="true">
    <div class="modal-box modal-sm" role="dialog" aria-modal="true">
        <div class="modal-header">
            <div>
                <span class="category-badge" id="prevDocCategory">Pidana</span>
                <h3 id="prevDocTitle" style="margin-top: 8px;">-</h3>
                <p id="prevDocCase">-</p>
            </div>
            <button type="button" class="btn-modal-close" data-close-modal="previewDocModal">
                <i class='bx bx-x'></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="preview-meta-grid">
                <div><span>Jenis Referensi</span><strong id="prevDocType">-</strong></div>
                <div><span>Lawyer Penanggung Jawab</span><strong id="prevDocLawyer">-</strong></div>
                <div><span>Tanggal Dokumen</span><strong id="prevDocDate">-</strong></div>
                <div><span>Status</span><strong id="prevDocStatus">-</strong></div>
            </div>
            <div class="preview-file-box">
                <i class='bx bx-file'></i>
                <span id="prevDocFilename">-</span>
            </div>
            <div class="preview-desc-box">
                <span>Deskripsi / Keterangan</span>
                <p id="prevDocDesc">-</p>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-maroon" data-close-modal="previewDocModal">Tutup</button>
        </div>
    </div>
</div>

<!-- ==================== MODAL 3: EDIT DOKUMEN ==================== -->
<div class="modal-overlay" id="editDocModal" aria-hidden="true">
    <div class="modal-box" role="dialog" aria-modal="true">
        <div class="modal-header">
            <div>
                <h3>Edit Dokumen Referensi</h3>
                <p>Perbarui informasi dokumen pada Pusat Referensi.</p>
            </div>
            <button type="button" class="btn-modal-close" data-close-modal="editDocModal">
                <i class='bx bx-x'></i>
            </button>
        </div>

        <form action="" method="POST" id="editDocForm">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label for="edit_doc_title">Nama dokumen *</label>
                    <input type="text" id="edit_doc_title" name="title" class="form-control" required>
                </div>

                <div class="form-row-2">
                    <div class="form-group">
                        <label for="edit_case_code">Case ID *</label>
                        <div class="select-wrapper">
                            <select id="edit_case_code" name="case_code" class="form-control" required>
                                @foreach($caseMap as $code => $info)
                                    <option value="{{ $code }}" data-category="{{ $info['category'] }}">{{ $code }}</option>
                                @endforeach
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit_case_category">Kategori perkara</label>
                        <input type="text" id="edit_case_category" class="form-control input-readonly" readonly>
                    </div>
                </div>

                <div class="form-row-2">
                    <div class="form-group">
                        <label for="edit_ref_type">Jenis referensi *</label>
                        <div class="select-wrapper">
                            <select id="edit_ref_type" name="reference_type" class="form-control" required>
                                @foreach($referenceTypes as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit_lawyer_name">Lawyer penanggung jawab *</label>
                        <div class="select-wrapper">
                            <select id="edit_lawyer_name" name="lawyer_name" class="form-control" required>
                                @foreach($lawyers as $lawyer)
                                    <option value="{{ $lawyer }}">{{ $lawyer }}</option>
                                @endforeach
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                    </div>
                </div>

                <div class="form-row-2">
                    <div class="form-group">
                        <label for="edit_doc_date">Tanggal dokumen *</label>
                        <input type="date" id="edit_doc_date" name="document_date" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_doc_status">Status dokumen *</label>
                        <div class="select-wrapper">
                            <select id="edit_doc_status" name="status" class="form-control" required>
                                <option value="Draf">Draf</option>
                                <option value="Publik">Publik</option>
                            </select>
                            <i class='bx bx-chevron-down'></i>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_doc_desc">Deskripsi (opsional)</label>
                    <textarea id="edit_doc_desc" name="description" rows="3" class="form-control"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-cancel" data-close-modal="editDocModal">Batal</button>
                <button type="submit" class="btn-maroon btn-submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('js/admin/pusatreferensi.js') }}"></script>
</body>
</html>