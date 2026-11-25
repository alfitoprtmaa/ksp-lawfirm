<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel - Lawyer Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/artikel/index.css') }}">
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

            <!-- MENU AKTIF: MANAJEMEN KONTEN -> DATA ARTIKEL KEGIATAN -->
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
                    <li><a href="{{ route('admin.artikel.index') }}" class="active-sub">Data Artikel Kegiatan</a></li>
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
                <span>Manajemen Konten</span>
                <i class='bx bx-chevron-right'></i>
                <a href="{{ route('admin.artikel.index') }}">Data Artikel Kegiatan</a>
                <i class='bx bx-chevron-right'></i>
                <span class="current">Tambah Artikel</span>
            </div>

            <div class="page-header">
                <div>
                    <h2>Tambah Artikel</h2>
                    <p>Buat artikel kegiatan baru untuk dipublikasikan.</p>
                </div>
            </div>

            @if($errors->any())
                <div class="alert-error">
                    <i class='bx bx-error-circle'></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data" id="createArticleForm">
                @csrf
                <input type="hidden" name="action_type" id="articleActionType" value="publish">

                <div class="article-create-grid">
                    <!-- KIRI: INFORMASI ARTIKEL -->
                    <div class="editor-card">
                        <h3>Informasi Artikel</h3>

                        <div class="form-group">
                            <label for="article_title">Judul artikel *</label>
                            <input
                                type="text"
                                id="article_title"
                                name="title"
                                class="form-control"
                                value="{{ old('title') }}"
                                placeholder="Masukkan judul artikel kegiatan"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="article_summary">Ringkasan artikel</label>
                            <textarea
                                id="article_summary"
                                name="summary"
                                rows="3"
                                maxlength="160"
                                class="form-control"
                                placeholder="Tulis ringkasan singkat untuk daftar artikel..."
                            >{{ old('summary') }}</textarea>
                            <div class="field-meta-row">
                                <span>Maksimal 160 karakter.</span>
                                <span id="summaryCharCounter">0 / 160</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Isi artikel *</label>
                            <div class="rich-editor-shell">
                                <div class="editor-toolbar">
                                    <div class="toolbar-select-wrap">
                                        <select id="editorFormatBlock" aria-label="Format Teks">
                                            <option value="P">Paragraf</option>
                                            <option value="H2">Judul Besar</option>
                                            <option value="H3">Subjudul</option>
                                        </select>
                                        <i class='bx bx-chevron-down'></i>
                                    </div>

                                    <span class="toolbar-divider"></span>

                                    <button type="button" class="toolbar-btn" data-cmd="bold" title="Tebal (Bold)">
                                        <i class='bx bx-bold'></i>
                                    </button>
                                    <button type="button" class="toolbar-btn" data-cmd="italic" title="Miring (Italic)">
                                        <i class='bx bx-italic'></i>
                                    </button>
                                    <button type="button" class="toolbar-btn" data-cmd="underline" title="Garis Bawah (Underline)">
                                        <i class='bx bx-underline'></i>
                                    </button>
                                    <button type="button" class="toolbar-btn" data-cmd="insertUnorderedList" title="Daftar Poin">
                                        <i class='bx bx-list-ul'></i>
                                    </button>
                                    <button type="button" class="toolbar-btn" id="btnInsertLink" title="Sisipkan Tautan">
                                        <i class='bx bx-link'></i>
                                    </button>
                                </div>

                                <div
                                    id="articleBodyEditor"
                                    class="editor-editable-area"
                                    contenteditable="true"
                                    data-placeholder="Mulai tulis isi artikel kegiatan di sini..."
                                >{!! old('article_body') !!}</div>
                                <textarea name="article_body" id="articleBodyHidden" style="display:none;" required>{{ old('article_body') }}</textarea>

                                <div class="editor-footer-bar">
                                    <span>Gunakan judul dan paragraf agar mudah dibaca.</span>
                                    <span id="editorWordCounter">0 kata</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- KANAN: PENGATURAN PUBLIKASI & SAMPUL ARTIKEL -->
                    <div class="right-column-stack">
                        <!-- Pengaturan Publikasi -->
                        <div class="side-card">
                            <h3>Pengaturan Publikasi</h3>

                            <div class="form-group">
                                <label for="article_category">Kategori *</label>
                                <div class="select-wrapper">
                                    <select id="article_category" name="category" class="form-control" required>
                                        <option value="">Pilih kategori</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat }}" {{ old('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                        @endforeach
                                    </select>
                                    <i class='bx bx-chevron-down'></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="author_name">Penulis</label>
                                <input
                                    type="text"
                                    id="author_name"
                                    name="author_name"
                                    class="form-control"
                                    value="{{ old('author_name', 'Admin') }}"
                                >
                            </div>

                            <div class="form-group">
                                <label for="publish_mode">Waktu publikasi</label>
                                <div class="select-wrapper">
                                    <select id="publish_mode" name="publish_mode" class="form-control">
                                        <option value="now" selected>Publikasikan sekarang</option>
                                        <option value="schedule">Jadwalkan publikasi</option>
                                    </select>
                                    <i class='bx bx-chevron-down'></i>
                                </div>
                            </div>

                            <div class="form-group" id="scheduledDateGroup" style="display: none;">
                                <label for="scheduled_date">Tanggal tayang *</label>
                                <input type="date" id="scheduled_date" name="scheduled_date" class="form-control">
                            </div>
                        </div>

                        <!-- Sampul Artikel -->
                        <div class="side-card">
                            <h3>Sampul Artikel</h3>

                            <label class="cover-upload-zone" id="coverUploadZone">
                                <input type="file" name="article_image" id="coverImageInput" accept="image/png,image/jpeg" style="display:none;">
                                <div class="upload-placeholder" id="uploadPlaceholder">
                                    <i class='bx bx-upload'></i>
                                    <strong>Klik untuk unggah gambar</strong>
                                    <span>atau tarik dan lepas di sini</span>
                                </div>
                                <img src="" alt="Preview Sampul" id="coverPreviewImg" class="cover-preview-img" style="display:none;">
                            </label>

                            <p class="upload-hint">
                                JPG atau PNG, maksimal 5 MB.<br>
                                Disarankan berukuran 1200 x 630 px.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- BOTTOM ACTION BAR -->
                <div class="create-footer-bar">
                    <a href="{{ route('admin.artikel.index') }}" class="btn-cancel">Batal</a>

                    <div class="footer-right-group">
                        <span class="required-label">* Wajib diisi</span>
                        <button type="submit" class="btn-draft" id="btnSaveDraft">Simpan Draf</button>
                        <button type="submit" class="btn-maroon btn-publish" id="btnPublishArticle">
                            <i class='bx bx-send'></i>
                            <span>Publikasikan Artikel</span>
                        </button>
                    </div>
                </div>
            </form>
        </main>
    </div>
</div>

<script src="{{ asset('js/admin/dataartikel.js') }}"></script>
</body>
</html>