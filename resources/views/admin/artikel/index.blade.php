<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Artikel Kegiatan - Lawyer Admin</title>
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
                <span>Manajemen Konten</span>
                <i class='bx bx-chevron-right'></i>
                <span class="current">Data Artikel Kegiatan</span>
            </div>

            <div class="page-header">
                <div>
                    <h2>Data Artikel Kegiatan</h2>
                    <p>Kelola artikel, dokumentasi, dan publikasi kegiatan.</p>
                </div>
                <a href="{{ route('admin.artikel.create') }}" class="btn-maroon">
                    <i class='bx bx-plus'></i>
                    <span>Tambah Artikel</span>
                </a>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <i class='bx bx-check-circle'></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- 4 METRIC CARDS -->
            <section class="metrics-grid-4">
                <div class="metric-card">
                    <div class="metric-icon icon-maroon">
                        <i class='bx bx-news'></i>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Total Artikel</span>
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
                        <i class='bx bx-time-five'></i>
                    </div>
                    <div class="metric-info">
                        <span class="metric-label">Terjadwal</span>
                        <strong class="metric-value">{{ $stats['scheduled'] }}</strong>
                    </div>
                </div>
            </section>

            <!-- FILTER BAR -->
            <section class="filter-bar">
                <div class="search-box">
                    <i class='bx bx-search'></i>
                    <input type="text" id="searchArticleInput" placeholder="Cari judul artikel atau kegiatan...">
                </div>

                <div class="select-box">
                    <select id="filterCategorySelect">
                        <option value="all">Semua Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}">{{ $cat }}</option>
                        @endforeach
                    </select>
                    <i class='bx bx-chevron-down'></i>
                </div>

                <div class="select-box">
                    <select id="filterStatusSelect">
                        <option value="all">Semua Status</option>
                        <option value="Dipublikasikan">Dipublikasikan</option>
                        <option value="Draf">Draf</option>
                        <option value="Terjadwal">Terjadwal</option>
                    </select>
                    <i class='bx bx-chevron-down'></i>
                </div>

                <button type="button" class="btn-reset" id="btnResetArticleFilter">
                    <i class='bx bx-refresh'></i>
                    <span>Reset</span>
                </button>
            </section>

            <!-- TABEL ARTIKEL KEGIATAN -->
            <section class="table-card">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="col-no">NO</th>
                                <th class="col-title">JUDUL ARTIKEL &amp; RINGKASAN</th>
                                <th class="col-cat">KATEGORI</th>
                                <th class="col-status">STATUS</th>
                                <th class="col-updated">DIPERBARUI</th>
                                <th class="col-action text-right">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="articlesTableBody">
                            @foreach($articles as $idx => $article)
                                @php
                                    $statusClass = match($article['status']) {
                                        'Dipublikasikan' => 'status-published',
                                        'Draf'           => 'status-draft',
                                        'Terjadwal'      => 'status-scheduled',
                                        default          => 'status-draft',
                                    };
                                @endphp
                                <tr data-search="{{ strtolower($article['title'] . ' ' . $article['summary']) }}"
                                    data-category="{{ $article['category'] }}"
                                    data-status="{{ $article['status'] }}">
                                    <td class="col-no text-muted">{{ $idx + 1 }}</td>
                                    <td class="col-title">
                                        <span class="article-title-text">{{ $article['title'] }}</span>
                                        <span class="article-summary-text">{{ $article['summary'] }}</span>
                                    </td>
                                    <td class="col-cat">
                                        <span class="category-badge">{{ $article['category'] }}</span>
                                    </td>
                                    <td class="col-status">
                                        <span class="status-pill {{ $statusClass }}">
                                            <span class="status-dot"></span>
                                            <span>{{ $article['status'] }}</span>
                                        </span>
                                    </td>
                                    <td class="col-updated">
                                        <span class="updated-date">{{ $article['published_date'] }}</span>
                                        <span class="updated-sub">{{ $article['updated_note'] }}</span>
                                    </td>
                                    <td class="col-action text-right">
                                        <div class="action-buttons">
                                            <button
                                                type="button"
                                                class="btn-icon-action btn-preview-article"
                                                title="Pratinjau Artikel"
                                                data-article='@json($article)'
                                            >
                                                <i class='bx bx-show'></i>
                                            </button>

                                            <a href="{{ route('admin.artikel.create') }}" class="btn-icon-action" title="Edit Artikel">
                                                <i class='bx bx-pencil'></i>
                                            </a>

                                            <form action="{{ route('admin.artikel.destroy', $article['article_id']) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Hapus artikel &quot;{{ $article['title'] }}&quot;?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-icon-delete" title="Hapus Artikel">
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
                    <span id="articleShowingText">Menampilkan 1–{{ count($articles) }} dari {{ $stats['total'] }} artikel</span>

                    <div class="pagination-controls">
                        <button type="button" class="page-btn" disabled><i class='bx bx-chevron-left'></i></button>
                        <button type="button" class="page-btn active">1</button>
                        <button type="button" class="page-btn">2</button>
                        <button type="button" class="page-btn">3</button>
                        <button type="button" class="page-btn">4</button>
                        <button type="button" class="page-btn">5</button>
                        <button type="button" class="page-btn">6</button>
                        <button type="button" class="page-btn">7</button>
                        <button type="button" class="page-btn"><i class='bx bx-chevron-right'></i></button>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

<!-- MODAL PRATINJAU ARTIKEL -->
<div class="modal-overlay" id="previewArticleModal" aria-hidden="true">
    <div class="modal-box" role="dialog" aria-modal="true">
        <div class="modal-header">
            <div>
                <span class="category-badge" id="prevArtCategory">Seminar</span>
                <h3 id="prevArtTitle">-</h3>
                <p id="prevArtMeta">-</p>
            </div>
            <button type="button" class="btn-modal-close" id="btnClosePreviewModal">
                <i class='bx bx-x'></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="preview-summary-box" id="prevArtSummary"></div>
            <div class="preview-body-content" id="prevArtBody"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-maroon" id="btnOkPreviewModal">Tutup</button>
        </div>
    </div>
</div>

<script src="{{ asset('js/admin/dataartikel.js') }}"></script>
</body>
</html>