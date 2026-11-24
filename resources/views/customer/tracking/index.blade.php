<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Perkara - Ketut Surya Putra & Partners</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS Utama & CSS Tracking -->
    <link rel="stylesheet" href="{{ asset('css/customer/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/tracking/tracking.css') }}">
    
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
                    <li><a href="{{ route('customer.perkaralama.index') }}"><i class='bx bx-git-pull-request'></i> Perkara Saya</a></li>
                    <li><a href="{{ route('customer.buatkonsultasi.index') }}"><i class='bx bx-copy'></i> Perkara Baru</a></li>
                    <li class="active-blue"><a href="{{ route('customer.tracking.index') }}"><i class='bx bx-message'></i> Track Your Case</a></li>
                </ul>
            </div>

            <div class="sidebar-footer">
                <a href="{{ route('customer.akun.index') }}" class="settings-link"><i class='bx bx-cog'></i> Pengaturan akun</a>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="main-wrapper">
            
            <!-- TOP NAVBAR -->
            <header class="topbar">
                <div class="topbar-left d-flex align-center gap-3">
                    <button class="mobile-toggle-btn" id="mobileMenuBtn">
                        <i class='bx bx-menu'></i>
                    </button>
                    <div class="breadcrumbs">
                        <span>Portal Klien</span> / <span class="current">Tracking Perkara</span>
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
                
                <!-- Page Header & Case Switcher -->
                <div class="page-header-flex">
                    <div class="welcome-section mb-0">
                        <h1 class="page-title">Track Perkara</h1>
                        <p class="page-subtitle">Pantau status dan timeline perkara Anda.</p>
                    </div>

                    @if (count($allBookings) > 1)
                        <form action="{{ route('customer.tracking.index') }}" method="GET" class="case-selector-form">
                            <div class="select-case-wrap">
                                <i class='bx bx-folder'></i>
                                <select name="booking_id" onchange="this.form.submit()" class="case-select-dropdown">
                                    @foreach ($allBookings as $b)
                                        <option value="{{ $b['booking_id'] }}" {{ $b['booking_id'] == $activeCase['booking_id'] ? 'selected' : '' }}>
                                            {{ $b['registration_number'] }} — {{ $b['category_name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    @endif
                </div>

                <!-- Case Overview Card -->
                <div class="card case-overview-card mb-4">
                    <div class="case-overview-left">
                        <div class="case-icon-box">
                            <div class="logo">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 16l3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/>
                                    <path d="M2 16l3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/>
                                    <path d="M7 21h10"/>
                                    <path d="M12 3v18"/>
                                    <path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/>
                                </svg>
                            </div>
                        </div>

                        <div class="case-details">
                            <h3>{{ $activeCase['registration_number'] }}</h3>
                            <div class="case-meta">
                                <span><i class='bx bx-file'></i> {{ $activeCase['category_name'] }}</span>
                                <span><i class='bx bx-calendar'></i> Dibuat pada {{ $activeCase['created_date_label'] }}</span>
                                <span><i class='bx bx-purchase-tag-alt'></i> Bidang Hukum: <strong>{{ $activeCase['short_legal_field'] }}</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="case-overview-right">
                        <div class="status-box">
                            <span class="status-label">Status Saat Ini</span>
                            @if ($activeCase['display_status'] === 'Selesai')
                                <span class="status-badge badge-green"><i class='bx bxs-circle'></i> Selesai</span>
                            @else
                                <span class="status-badge badge-blue"><i class='bx bxs-circle'></i> {{ $activeCase['display_status'] }}</span>
                            @endif
                        </div>
                        <button type="button" class="btn-icon-outline"><i class='bx bx-dots-vertical-rounded'></i></button>
                    </div>
                </div>

                <!-- Tracking Area Card -->
                <div class="card tracking-main-card p-0">
                    
                    <!-- Stepper Header -->
                    <div class="tracking-header p-4 border-bottom">
                        <div class="card-header-between mb-4">
                            <h4>Tahapan Perkara</h4>
                            <span class="text-muted text-sm wizard-counter">Tahap 1 dari 4</span>
                        </div>
                        
                        <!-- Horizontal Stepper -->
                        <div class="wizard-stepper">
                            <div class="wizard-line"></div>
                            <div class="wizard-line-active" style="width: 0%;"></div>
                            
                            <!-- Tab 1 -->
                            <div class="wizard-step tab-trigger" data-target="tab-1">
                                <div class="wizard-circle">1</div>
                                <div class="wizard-label">Pengajuan<br>Permohonan</div>
                            </div>
                            <!-- Tab 2 -->
                            <div class="wizard-step tab-trigger" data-target="tab-2">
                                <div class="wizard-circle">2</div>
                                <div class="wizard-label">Lawyer<br>Assignment</div>
                            </div>
                            <!-- Tab 3 -->
                            <div class="wizard-step tab-trigger" data-target="tab-3">
                                <div class="wizard-circle">3</div>
                                <div class="wizard-label">Proses<br>Perkara</div>
                            </div>
                            <!-- Tab 4 -->
                            <div class="wizard-step tab-trigger" data-target="tab-4">
                                <div class="wizard-circle">4</div>
                                <div class="wizard-label">Perkara Selesai</div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Contents Area -->
                    <div class="tracking-body p-4 bg-white">
                        
                        <!-- ==================== TAB 1: OVERVIEW PERMASALAHAN ==================== -->
                        <div class="tab-content" id="tab-1" style="display: none;">
                            <div class="content-box bg-light-blue rounded-lg p-4">
                                <div class="d-flex align-center gap-3 mb-4">
                                    <div class="icon-box-md bg-icon-blue text-blue rounded-md"><i class='bx bx-file-find'></i></div>
                                    <div>
                                        <h5 class="text-lg font-semibold m-0">Overview Permasalahan</h5>
                                        <span class="text-blue text-sm">Sedang berlangsung</span>
                                    </div>
                                </div>
                                
                                <div class="overview-details-container border rounded-lg p-4">
                                    <table class="overview-table">
                                        <tr>
                                            <td class="label-col font-semibold text-dark">Nomor Perkara</td>
                                            <td class="text-dark">{{ $activeCase['registration_number'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="label-col font-semibold text-dark">Judul Perkara</td>
                                            <td class="text-dark">{{ $activeCase['consultation_title'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="label-col font-semibold text-dark">Kategori</td>
                                            <td class="text-dark">{{ $activeCase['category_name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="label-col font-semibold text-dark">Bidang Hukum</td>
                                            <td class="text-dark">{{ $activeCase['legal_field_name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="label-col font-semibold text-dark">Tanggal Pengajuan</td>
                                            <td class="text-dark">{{ $activeCase['submitted_date_label'] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="label-col font-semibold text-dark">Status Perkara</td>
                                            <td class="text-dark">{{ $activeCase['booking_status_label'] ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="label-col font-semibold text-dark align-top pt-4">Ringkasan Permasalahan</td>
                                            <td class="pt-4">
                                                <div class="summary-box bg-gray-50 rounded-md p-3 text-dark line-height-16">
                                                    {{ $activeCase['case_summary'] }}
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- ==================== TAB 2: LAWYER ASSIGNMENT ==================== -->
                        <div class="tab-content" id="tab-2" style="display: none;">
                            <div class="content-box bg-light-blue rounded-lg p-4">
                                <div class="d-flex align-center gap-3 mb-4">
                                    <div class="icon-box-md bg-icon-blue text-blue rounded-md"><i class='bx bx-file-find'></i></div>
                                    <h5 class="text-lg font-semibold m-0">Lawyer yang Ditugaskan</h5>
                                </div>
                                
                                @if (!empty($activeCase['lawyer']))
                                    <div class="lawyer-profile-box border bg-white rounded-lg p-4 d-flex gap-4">
                                        {{-- Tempat asset foto lawyer milikmu --}}
                                        <img src="{{ asset($activeCase['lawyer']['photo_path'] ?? 'images/lawyer-default.png') }}" alt="{{ $activeCase['lawyer']['full_name'] }}" class="lawyer-img rounded-circle">
                                        <div class="lawyer-info">
                                            <h4 class="text-xl font-bold mb-1">{{ $activeCase['lawyer']['full_name'] }}</h4>
                                            <p class="text-muted mb-3">{{ $activeCase['lawyer']['specialization'] }}</p>
                                            <p class="text-sm line-height-16 mb-4 text-gray">
                                                {{ $activeCase['lawyer']['self_description'] }}
                                            </p>
                                            
                                            <div class="social-links d-flex gap-2 text-lg">
                                                <a href="{{ $activeCase['lawyer']['linkedin_url'] ?? '#' }}" target="_blank" class="text-dark"><i class='bx bxl-linkedin-square'></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="border bg-white rounded-lg p-4 text-muted text-sm">
                                        Admin sedang menugaskan advokat yang sesuai dengan bidang hukum perkara Anda.
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- ==================== TAB 3: PROSES PERKARA (CASE_EXECUTION) ==================== -->
                        <div class="tab-content" id="tab-3" style="display: none;">
                            <div class="content-box bg-light-blue rounded-lg p-4">
                                
                                <div class="d-flex align-center gap-3 mb-4">
                                    <div class="icon-box-md bg-icon-blue text-blue rounded-md">
                                        <i class='bx bx-file-find'></i>
                                    </div>
                                    <h5 class="text-lg font-semibold m-0 text-dark">Perkembangan Perkara</h5>
                                </div>
                                
                                <div class="development-timeline bg-white mt-3">
                                    @forelse ($activeCase['executions'] as $exec)
                                        <div class="dev-item">
                                            <div class="dev-marker"></div>
                                            <div class="dev-datetime">
                                                <div class="dev-date-text">{{ $exec['execution_date_short'] }}</div>
                                                <div class="dev-time-text">{{ $exec['execution_time'] }}</div>
                                            </div>
                                            <div class="dev-content">
                                                {{ $exec['short_note'] }}
                                            </div>
                                            <div class="dev-person">
                                                <span class="person-dot"></span> {{ $exec['lawyer_name'] }}
                                            </div>
                                            <div class="dev-action">
                                                <button
                                                    type="button"
                                                    class="btn-detail-light open-exec-modal-btn"
                                                    data-exec='@json($exec)'
                                                    data-case-number="{{ $activeCase['registration_number'] }}"
                                                    data-category="{{ $activeCase['category_name'] }}"
                                                >
                                                    Detail <i class='bx bx-chevron-right'></i>
                                                </button>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-sm text-muted">Belum ada catatan perkembangan perkara.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <!-- ==================== TAB 4: PERKARA SELESAI (TIMELINE FINAL) ==================== -->
                        <div class="tab-content" id="tab-4" style="display: none;">
                            <div class="content-box bg-light-blue rounded-lg p-4">
                                <div class="d-flex align-center gap-3 mb-4">
                                    <div class="icon-box-md bg-icon-blue text-blue rounded-md"><i class='bx bx-message-rounded-dots'></i></div>
                                    <h5 class="text-lg font-semibold m-0">Perkembangan Perkara</h5>
                                </div>
                                
                                <div class="vertical-timeline bg-white">
                                    @forelse ($activeCase['final_milestones'] as $milestone)
                                        <div class="timeline-item">
                                            <div class="timeline-marker"></div>
                                            <div class="timeline-content {{ $loop->last ? 'border-none pb-0' : '' }}">
                                                <div class="d-flex justify-between align-start gap-3">
                                                    <div>
                                                        <h6 class="text-md font-semibold text-dark mb-1">{{ $milestone['title'] }}</h6>
                                                        <div class="text-xs text-muted mb-2 d-flex align-center gap-1">
                                                            <i class='bx bx-calendar'></i> {{ $milestone['datetime_short'] }}
                                                        </div>
                                                        <p class="text-sm text-gray line-height-15">{{ $milestone['summary'] }}</p>
                                                    </div>
                                                    <button
                                                        type="button"
                                                        class="btn-outline-sm open-final-modal-btn"
                                                        data-milestone='@json($milestone)'
                                                    >
                                                        Detail
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-sm text-muted">Belum ada ringkasan penyelesaian perkara.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- ==================== MODAL 1: DETAIL PERKEMBANGAN PERKARA (TAHAP 3) ==================== -->
    <div class="track-modal-backdrop" id="execModalBackdrop" aria-hidden="true">
        <div class="track-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="execModalTitle">
            <div class="track-modal-header">
                <div class="d-flex align-center gap-3">
                    <div class="modal-badge-icon">
                        <i class='bx bx-file-find'></i>
                    </div>
                    <div>
                        <h4 id="execModalTitle" class="modal-heading">Detail Perkembangan Perkara</h4>
                        <p class="modal-sub-meta">
                            <span id="execCaseNumber">KP-2026-001</span> &bull; <span id="execCategoryName">Sengketa Tanah</span>
                        </p>
                    </div>
                </div>
                <button type="button" class="modal-x-btn" data-close-modal="execModalBackdrop">
                    <i class='bx bx-x'></i>
                </button>
            </div>

            <div class="track-modal-body">
                <!-- Info Box 3 Kolom -->
                <div class="exec-meta-card">
                    <div class="exec-meta-col">
                        <span class="meta-cap">STATUS TINDAKAN</span>
                        <div>
                            <span class="status-pill-outline">
                                <span class="dot-blue"></span> <span id="execStatusLabel">Dalam Proses</span>
                            </span>
                        </div>
                    </div>
                    <div class="exec-meta-col">
                        <span class="meta-cap">WAKTU PENCATATAN</span>
                        <div class="meta-main-val" id="execFullDate">20 Oktober 2026</div>
                        <div class="meta-sub-val" id="execFullTime">19:27 WIB</div>
                    </div>
                    <div class="exec-meta-col">
                        <span class="meta-cap">ADVOKAT PENANGGUNG JAWAB</span>
                        <div class="lawyer-mini-row">
                            <span class="lawyer-initials" id="execLawyerInitials">AS</span>
                            <div>
                                <div class="meta-main-val" id="execLawyerName">Alfito Spea M/Kom</div>
                                <div class="meta-sub-val" id="execLawyerRole">Litigation Associate</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Uraian Catatan Peninjauan -->
                <div class="mt-4">
                    <div class="section-cap-row">
                        <i class='bx bx-edit'></i>
                        <span>URAIAN CATATAN PENINJAUAN</span>
                    </div>
                    <div class="note-detail-box" id="execDescBox">
                        <!-- Diisi dinamis oleh JS -->
                    </div>
                </div>

                <!-- Lampiran Berkas & Dokumen Telaah -->
                <div class="mt-4">
                    <div class="section-cap-row">
                        <i class='bx bx-paperclip'></i>
                        <span>LAMPIRAN BERKAS &amp; DOKUMEN TELAAH</span>
                    </div>
                    <div class="exec-attachments-grid" id="execAttachmentsGrid">
                        <!-- Diisi dinamis oleh JS -->
                    </div>
                </div>

                <div class="mt-4">
                    <button type="button" class="btn-tutup-gray" data-close-modal="execModalBackdrop">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== MODAL 2: DETAIL PERKEMBANGAN PERKARA (TAHAP 4) ==================== -->
    <div class="track-modal-backdrop" id="finalModalBackdrop" aria-hidden="true">
        <div class="track-modal-dialog modal-narrow" role="dialog" aria-modal="true" aria-labelledby="finalModalTitle">
            <div class="track-modal-header border-none pb-0">
                <h3 id="finalModalTitle" class="modal-heading-lg">Detail Perkembangan Perkara</h3>
            </div>

            <div class="track-modal-body">
                <div class="final-field-group">
                    <span class="final-label">Judul</span>
                    <div class="final-title-val" id="finalTitleVal">-</div>
                </div>

                <div class="final-field-group">
                    <span class="final-label">Tanggal</span>
                    <div class="final-date-val" id="finalDateVal">-</div>
                </div>

                <div class="final-field-group">
                    <span class="final-label">Deskripsi</span>
                    <div class="final-desc-val" id="finalDescVal">-</div>
                </div>

                <div class="final-field-group">
                    <div class="section-cap-row mb-2">
                        <span class="lampiran-badge"><i class='bx bx-file'></i></span>
                        <span class="final-lampiran-title">Lampiran</span>
                    </div>
                    <div class="final-attachments-list" id="finalAttachmentsList">
                        <!-- Diisi dinamis oleh JS -->
                    </div>
                </div>

                <div class="final-footer">
                    <button type="button" class="btn-tutup-navy" data-close-modal="finalModalBackdrop">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/customer/tracking.js') }}"></script>
</body>
</html>