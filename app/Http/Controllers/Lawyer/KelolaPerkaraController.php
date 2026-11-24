<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelolaPerkaraController extends Controller
{
    /**
     * Profil lawyer (seragam dengan halaman Overview).
     */
    private function getLawyerProfile(): array
    {
        return [
            'lawyer_id'  => 1,
            'role_name'  => 'Lawyer',
            'full_name'  => 'Adv. Adi Pratama, S.H., M.H.',
            'photo_path' => 'images/avatar-lawyer-large.jpg',
        ];
    }

    /**
     * Mock data tabel BOOKING + relasi LEGAL_FIELD & CASE_EXECUTION sesuai ERD.
     */
    private function getMockCases(): array
    {
        return [
            [
                'booking_id'         => 1,
                'case_code'          => 'CASE-001',
                'kp_code'            => 'KP-2026-001',
                'consultation_title' => 'Sengketa Tanah',
                'applicant_name'     => 'Andi Pratama',
                'field_name'         => 'Perdata',
                'booking_status'     => 'Dalam Proses',
                'opened_date'        => '12 Jan 2025',
                'current_step'       => 3,
                'executions'         => [
                    [
                        'execution_id'     => 1,
                        'title'            => 'Koordinasi Penanganan Perkara',
                        'execution_date'   => '20 Okt 2026',
                        'execution_time'   => '19:27',
                        'lawyer_name'      => 'Adv. Adi Pratama',
                        'desc_box'         => 'Tim telah melakukan koordinasi internal untuk menentukan langkah penanganan perkara selanjutnya.',
                        'attachment_file'  => null,
                        'execution_status' => 'Selesai',
                    ],
                    [
                        'execution_id'     => 2,
                        'title'            => 'Verifikasi Berkas Perkara',
                        'execution_date'   => '21 Okt 2026',
                        'execution_time'   => '14:21',
                        'lawyer_name'      => 'Adv. Adi Pratama',
                        'desc_box'         => 'Telah dilakukan verifikasi terhadap kelengkapan berkas perkara yang diberikan oleh klien.',
                        'attachment_file'  => 'Verifikasi_Berkas.pdf',
                        'execution_status' => 'Selesai',
                    ],
                ],
            ],
            [
                'booking_id'         => 2,
                'case_code'          => 'CASE-002',
                'kp_code'            => 'KP-2026-002',
                'consultation_title' => 'Perselisihan Kontrak',
                'applicant_name'     => 'Budi Santoso',
                'field_name'         => 'Bisnis',
                'booking_status'     => 'Dalam Proses',
                'opened_date'        => '5 Feb 2025',
                'current_step'       => 3,
                'executions'         => [
                    [
                        'execution_id'     => 3,
                        'title'            => 'Review Klausul Perjanjian',
                        'execution_date'   => '18 Okt 2026',
                        'execution_time'   => '10:00',
                        'lawyer_name'      => 'Adv. Adi Pratama',
                        'desc_box'         => 'Analisis pasal wanprestasi pada kontrak kerja sama vendor.',
                        'attachment_file'  => null,
                        'execution_status' => 'Selesai',
                    ],
                ],
            ],
            [
                'booking_id'         => 3,
                'case_code'          => 'CASE-003',
                'kp_code'            => 'KP-2026-003',
                'consultation_title' => 'Perceraian',
                'applicant_name'     => 'Siti Rahayu',
                'field_name'         => 'Keluarga',
                'booking_status'     => 'Dalam Proses',
                'opened_date'        => '10 Mar 2025',
                'current_step'       => 3,
                'executions'         => [],
            ],
            [
                'booking_id'         => 4,
                'case_code'          => 'CASE-004',
                'kp_code'            => 'KP-2026-004',
                'consultation_title' => 'Sengketa Waris',
                'applicant_name'     => 'Ahmad Fauzi',
                'field_name'         => 'Keluarga',
                'booking_status'     => 'Dalam Proses',
                'opened_date'        => '2 Mar 2025',
                'current_step'       => 3,
                'executions'         => [],
            ],
            [
                'booking_id'         => 5,
                'case_code'          => 'CASE-005',
                'kp_code'            => 'KP-2026-005',
                'consultation_title' => 'Tindak Pidana Ringan',
                'applicant_name'     => 'Dimas Adi',
                'field_name'         => 'Pidana',
                'booking_status'     => 'Dalam Proses',
                'opened_date'        => '18 Mar 2025',
                'current_step'       => 3,
                'executions'         => [],
            ],
            [
                'booking_id'         => 6,
                'case_code'          => 'CASE-006',
                'kp_code'            => 'KP-2026-006',
                'consultation_title' => 'Perizinan Usaha',
                'applicant_name'     => 'PT Maju Jaya',
                'field_name'         => 'Bisnis',
                'booking_status'     => 'Dalam Proses',
                'opened_date'        => '22 Apr 2025',
                'current_step'       => 3,
                'executions'         => [],
            ],
            [
                'booking_id'         => 7,
                'case_code'          => 'CASE-007',
                'kp_code'            => 'KP-2026-007',
                'consultation_title' => 'Sengketa Utang',
                'applicant_name'     => 'Rina Wati',
                'field_name'         => 'Perdata',
                'booking_status'     => 'Dalam Proses',
                'opened_date'        => '5 Apr 2025',
                'current_step'       => 3,
                'executions'         => [],
            ],
            [
                'booking_id'         => 8,
                'case_code'          => 'CASE-008',
                'kp_code'            => 'KP-2026-008',
                'consultation_title' => 'Kasus KDRT',
                'applicant_name'     => 'Dewi Lestari',
                'field_name'         => 'Keluarga',
                'booking_status'     => 'Dalam Proses',
                'opened_date'        => '18 Apr 2025',
                'current_step'       => 3,
                'executions'         => [],
            ],
            [
                'booking_id'         => 9,
                'case_code'          => 'CASE-009',
                'kp_code'            => 'KP-2026-009',
                'consultation_title' => 'Pelanggaran Hak Cipta',
                'applicant_name'     => 'CV Kreatif Indo',
                'field_name'         => 'Bisnis',
                'booking_status'     => 'Dalam Proses',
                'opened_date'        => '2 Mei 2025',
                'current_step'       => 3,
                'executions'         => [],
            ],
            [
                'booking_id'         => 10,
                'case_code'          => 'CASE-010',
                'kp_code'            => 'KP-2026-010',
                'consultation_title' => 'Sengketa Lahan',
                'applicant_name'     => 'Agus Salim',
                'field_name'         => 'Perdata',
                'booking_status'     => 'Dalam Proses',
                'opened_date'        => '12 Mei 2025',
                'current_step'       => 3,
                'executions'         => [],
            ],
            // Data Perkara Selesai
            [
                'booking_id'         => 11,
                'case_code'          => 'CASE-001',
                'kp_code'            => 'KP-2026-011',
                'consultation_title' => 'Sengketa Tanah',
                'applicant_name'     => 'Andi Pratama',
                'field_name'         => 'Perdata',
                'booking_status'     => 'Selesai',
                'opened_date'        => '12 Jan 2025',
                'current_step'       => 4,
                'executions'         => [
                    [
                        'execution_id'     => 101,
                        'title'            => 'Koordinasi Penanganan Perkara',
                        'execution_date'   => '20 Okt 2026',
                        'execution_time'   => '19:27',
                        'lawyer_name'      => 'Adv. Adi Pratama',
                        'desc_box'         => 'Tim telah melakukan koordinasi internal untuk menentukan langkah penanganan perkara selanjutnya.',
                        'attachment_file'  => null,
                        'execution_status' => 'Selesai',
                    ],
                    [
                        'execution_id'     => 102,
                        'title'            => 'Verifikasi Berkas Perkara',
                        'execution_date'   => '21 Okt 2026',
                        'execution_time'   => '14:21',
                        'lawyer_name'      => 'Adv. Adi Pratama',
                        'desc_box'         => 'Telah dilakukan verifikasi terhadap kelengkapan berkas perkara yang diberikan oleh klien.',
                        'attachment_file'  => null,
                        'execution_status' => 'Selesai',
                    ],
                    [
                        'execution_id'     => 103,
                        'title'            => 'Penyusunan Gugatan',
                        'execution_date'   => '24 Okt 2026',
                        'execution_time'   => '10:15',
                        'lawyer_name'      => 'Adv. Adi Pratama',
                        'desc_box'         => 'Draft gugatan telah disusun dan diajukan ke pengadilan.',
                        'attachment_file'  => null,
                        'execution_status' => 'Selesai',
                    ],
                    [
                        'execution_id'     => 104,
                        'title'            => 'Putusan Pengadilan',
                        'execution_date'   => '30 Okt 2026',
                        'execution_time'   => '16:30',
                        'lawyer_name'      => 'Adv. Adi Pratama',
                        'desc_box'         => 'Pengadilan Negeri Mojokerto telah menjatuhkan putusan dengan amar mengabulkan gugatan klien.',
                        'attachment_file'  => 'Salinan_Putusan.pdf',
                        'execution_status' => 'Selesai',
                    ],
                ],
            ],
            [
                'booking_id'         => 12,
                'case_code'          => 'CASE-002',
                'kp_code'            => 'KP-2026-012',
                'consultation_title' => 'Perselisihan Kontrak',
                'applicant_name'     => 'Budi Santoso',
                'field_name'         => 'Bisnis',
                'booking_status'     => 'Selesai',
                'opened_date'        => '5 Feb 2025',
                'current_step'       => 4,
                'executions'         => [],
            ],
            [
                'booking_id'         => 13,
                'case_code'          => 'CASE-003',
                'kp_code'            => 'KP-2026-013',
                'consultation_title' => 'Perceraian',
                'applicant_name'     => 'Siti Rahayu',
                'field_name'         => 'Keluarga',
                'booking_status'     => 'Selesai',
                'opened_date'        => '10 Mar 2025',
                'current_step'       => 4,
                'executions'         => [],
            ],
        ];
    }

    /**
     * Redirect default route 'lawyer.kelolaperkara.index' ke 'Perkara Dikerjakan'.
     */
    public function index()
    {
        return redirect()->route('lawyer.kelolaperkara.dikerjakan');
    }

    /**
     * Menampilkan daftar Perkara Dikerjakan (status: Dalam Proses).
     */
    public function dikerjakan(Request $request)
    {
        $lawyer     = $this->getLawyerProfile();
        $activeTab  = 'dikerjakan';
        $search     = $request->query('search');
        $field      = $request->query('field');

        $cases = collect($this->getMockCases())
            ->where('booking_status', 'Dalam Proses')
            ->when($search, function ($col) use ($search) {
                return $col->filter(fn ($item) =>
                    stripos($item['case_code'], $search) !== false ||
                    stripos($item['consultation_title'], $search) !== false ||
                    stripos($item['applicant_name'], $search) !== false
                );
            })
            ->when($field, fn ($col) => $col->where('field_name', $field))
            ->values();

        return view('lawyer.kelolaperkara.index', compact('lawyer', 'cases', 'activeTab', 'search', 'field'));
    }

    /**
     * Menampilkan daftar Perkara Selesai (status: Selesai).
     */
    public function selesai(Request $request)
    {
        $lawyer     = $this->getLawyerProfile();
        $activeTab  = 'selesai';
        $search     = $request->query('search');
        $field      = $request->query('field');

        $cases = collect($this->getMockCases())
            ->where('booking_status', 'Selesai')
            ->when($search, function ($col) use ($search) {
                return $col->filter(fn ($item) =>
                    stripos($item['case_code'], $search) !== false ||
                    stripos($item['consultation_title'], $search) !== false ||
                    stripos($item['applicant_name'], $search) !== false
                );
            })
            ->when($field, fn ($col) => $col->where('field_name', $field))
            ->values();

        return view('lawyer.kelolaperkara.index', compact('lawyer', 'cases', 'activeTab', 'search', 'field'));
    }

    /**
     * Menampilkan halaman Detail Perkara (Dikerjakan maupun Selesai).
     */
    public function show($bookingId)
    {
        $lawyer = $this->getLawyerProfile();
        $case   = collect($this->getMockCases())->firstWhere('booking_id', (int) $bookingId);

        abort_if(!$case, 404, 'Perkara tidak ditemukan.');

        $activeTab = $case['booking_status'] === 'Selesai' ? 'selesai' : 'dikerjakan';

        return view('lawyer.kelolaperkara.detail', compact('lawyer', 'case', 'activeTab'));
    }

    /**
     * Menyimpan perkembangan baru ke tabel CASE_EXECUTION.
     */
    public function storeExecution(Request $request, $bookingId)
    {
        $request->validate([
            'title'           => 'required|string|max:255',
            'execution_date'  => 'required|date',
            'execution_time'  => 'required|string|max:20',
            'desc_box'        => 'required|string|max:500',
            'attachment_file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg|max:10240',
        ], [
            'title.required'          => 'Judul perkembangan wajib diisi.',
            'execution_date.required' => 'Tanggal pelaksanaan wajib diisi.',
            'execution_time.required' => 'Waktu pelaksanaan wajib diisi.',
            'desc_box.required'       => 'Uraian & catatan progres wajib diisi.',
            'desc_box.max'            => 'Uraian maksimal 500 karakter.',
            'attachment_file.max'     => 'Ukuran file lampiran maksimal 10 MB.',
        ]);

        // TODO (Tim Backend):
        // 1. Simpan attachment_file ke storage jika ada
        // 2. Insert ke tabel CASE_EXECUTION (booking_id, lawyer_id, title, execution_date, execution_time, desc_box, attachment_file, execution_status)

        return redirect()
            ->route('lawyer.kelolaperkara.show', $bookingId)
            ->with('success', 'Perkembangan perkara berhasil ditambahkan.');
    }

    /**
     * Menyelesaikan & menutup perkara (update booking_status menjadi 'Selesai').
     */
    public function complete($bookingId)
    {
        // TODO (Tim Backend): Update booking_status = 'Selesai' pada tabel BOOKING berdasarkan $bookingId

        return redirect()
            ->route('lawyer.kelolaperkara.selesai')
            ->with('success', 'Perkara telah diselesaikan dan dipindahkan ke daftar Perkara Selesai.');
    }

    /**
     * Mengarsipkan perkara.
     */
    public function archive($bookingId)
    {
        // TODO (Tim Backend): Update booking_status = 'Diarsipkan' pada tabel BOOKING berdasarkan $bookingId

        return redirect()
            ->route('lawyer.kelolaperkara.dikerjakan')
            ->with('success', 'Perkara berhasil diarsipkan.');
    }
}