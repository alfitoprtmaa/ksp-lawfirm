<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerTrackingController extends Controller
{
    public function index(Request $request)
    {
        $customer = session('customer_user', [
            'customer_id' => 1,
            'full_name'   => 'Alfito Pratama',
            'email'       => 'alfito.pratama@email.com',
        ]);

        // Simulasi relasi BOOKING + PROBLEM_CATEGORY + LEGAL_FIELD + LAWYER + CASE_EXECUTION sesuai ERD
        $allBookings = [
            [
                'booking_id'           => 666,
                'registration_number'  => 'KP-2026-001',
                'customer_id'          => 1,
                'category_id'          => 1,
                'category_name'        => 'Sengketa Tanah',
                'legal_field_id'       => 1,
                'legal_field_name'     => 'Hukum Perdata',
                'short_legal_field'    => 'Perdata',
                'consultation_title'   => 'Sengketa Kepemilikan Tanah dan Sertifikat Tumpang Tindih',
                'case_summary'         => 'Klien mengalami sengketa kepemilikan tanah dengan pihak lain akibat dugaan tumpang tindih sertifikat. Klien membutuhkan pendampingan hukum untuk memastikan status kepemilikan tanah dan menentukan langkah penyelesaian yang sesuai.',
                'booking_status'       => 'verified',
                'booking_status_label' => '',
                'display_status'       => 'Dalam Proses',
                'created_date_label'   => '8 Oktober 2026',
                'submitted_date_label' => '10 Oktober 2026',
                // Data dari tabel LAWYER
                'lawyer' => [
                    'lawyer_id'        => 3,
                    'full_name'        => 'Adv. Adi Pratama',
                    'specialization'   => 'Lawyer',
                    'self_description' => 'Klien mengalami sengketa kepemilikan tanah dengan pihak lain akibat dugaan tumpang tindih sertifikat. Klien membutuhkan pendampingan hukum untuk memastikan status kepemilikan tanah dan menentukan langkah penyelesaian yang sesuai.',
                    'photo_path'       => 'images/lawyer-adi.png',
                    'linkedin_url'     => '#',
                ],
                // Data dari tabel CASE_EXECUTION (Tahap 3: Proses Perkara)
                'executions' => [
                    [
                        'execution_id'         => 101,
                        'booking_id'           => 666,
                        'lawyer_id'            => 3,
                        'title'                => 'Peninjauan Awal & Pemeriksaan Berkas',
                        'execution_date'       => '2026-10-20',
                        'execution_date_short' => '20 Okt 2026',
                        'execution_date_full'  => '20 Oktober 2026',
                        'execution_time'       => '19:27',
                        'short_note'           => 'Lawyer telah ditugaskan untuk menangani perkara dan mulai melakukan peninjauan awal terhadap informasi yang disampaikan klien.',
                        'desc_box'             => "Lawyer telah ditugaskan untuk menangani perkara dan mulai melakukan peninjauan awal terhadap informasi serta kelengkapan dokumen fisik yang disampaikan oleh klien.\n\nTim advokat telah memeriksa keabsahan surat permohonan, dokumen girik/sertifikat awal, dan menyusun poin-poin klarifikasi hukum awal guna persiapan persidangan dan klarifikasi sengketa tanah.",
                        'execution_status'     => 'in_progress',
                        'status_label'         => 'Dalam Proses',
                        'lawyer_name'          => 'Alfito Spea M/Kom',
                        'lawyer_initials'      => 'AS',
                        'lawyer_role'          => 'Litigation Associate',
                        'attachments'          => [
                            [
                                'name' => 'SKK-Draft-Pemberkasan.pdf',
                                'size' => '1.8 MB',
                                'url'  => '#',
                            ],
                            [
                                'name' => 'Catatan-Telaah-Advokat.pdf',
                                'size' => '850 KB',
                                'url'  => '#',
                            ],
                        ],
                    ],
                    [
                        'execution_id'         => 102,
                        'booking_id'           => 666,
                        'lawyer_id'            => 3,
                        'title'                => 'Penyusunan Surat Somasi Pertama',
                        'execution_date'       => '2026-10-20',
                        'execution_date_short' => '20 Okt 2026',
                        'execution_date_full'  => '20 Oktober 2026',
                        'execution_time'       => '19:27',
                        'short_note'           => 'Lawyer telah ditugaskan untuk menangani perkara dan mulai melakukan peninjauan awal terhadap informasi yang disampaikan klien.',
                        'desc_box'             => "Tim hukum telah menyusun draf surat peringatan hukum (somasi) pertama kepada pihak tergugat terkait penguasaan fisik tanah tanpa alas hak yang sah.",
                        'execution_status'     => 'in_progress',
                        'status_label'         => 'Dalam Proses',
                        'lawyer_name'          => 'Alfito Spea M/Kom',
                        'lawyer_initials'      => 'AS',
                        'lawyer_role'          => 'Litigation Associate',
                        'attachments'          => [
                            [
                                'name' => 'Draft-Somasi-Pertama.pdf',
                                'size' => '1.2 MB',
                                'url'  => '#',
                            ],
                        ],
                    ],
                    [
                        'execution_id'         => 103,
                        'booking_id'           => 666,
                        'lawyer_id'            => 3,
                        'title'                => 'Mediasi & Klarifikasi Batas Tanah',
                        'execution_date'       => '2026-10-20',
                        'execution_date_short' => '20 Okt 2026',
                        'execution_date_full'  => '20 Oktober 2026',
                        'execution_time'       => '19:27',
                        'short_note'           => 'Lawyer telah ditugaskan untuk menangani perkara dan mulai melakukan peninjauan awal terhadap informasi yang disampaikan klien.',
                        'desc_box'             => "Pendampingan klien dalam agenda mediasi tingkat kelurahan serta pencocokan batas bidang tanah sesuai buku register tanah.",
                        'execution_status'     => 'in_progress',
                        'status_label'         => 'Dalam Proses',
                        'lawyer_name'          => 'Alfito Spea M/Kom',
                        'lawyer_initials'      => 'AS',
                        'lawyer_role'          => 'Litigation Associate',
                        'attachments'          => [],
                    ],
                ],
                // Data Milestone Tahap 4 (Perkara Selesai)
                'final_milestones' => [
                    [
                        'title'            => 'Peninjauan Dokumen Awal',
                        'datetime_short'   => '20 Okt 2026, 19:27',
                        'datetime_full'    => '20 Oktober 2026, 20:27',
                        'summary'          => 'Lawyer telah meninjau dokumen awal yang diberikan oleh klien dan melakukan analisis awal terhadap informasi yang disampaikan.',
                        'full_description' => "Pada tahap ini, kami telah meninjau seluruh dokumen awal yang diberikan oleh klien, termasuk sertifikat tanah, surat keterangan, dan dokumen pendukung lainnya. Dari hasil peninjauan awal, ditemukan beberapa hal yang perlu diklarifikasi lebih lanjut untuk memperkuat posisi hukum klien.\n\nKami akan segera menghubungi pihak terkait untuk memperoleh informasi tambahan.",
                        'attachments'      => [
                            [
                                'name' => 'putusan-pengadilan.pdf',
                                'size' => '248.2 KB',
                                'url'  => '#',
                            ],
                            [
                                'name' => 'putusan-pengadilan.pdf',
                                'size' => '248.2 KB',
                                'url'  => '#',
                            ],
                        ],
                    ],
                    [
                        'title'            => 'Verifikasi Berkas Perkara',
                        'datetime_short'   => '16 Okt 2026, 14:21',
                        'datetime_full'    => '16 Oktober 2026, 14:21',
                        'summary'          => 'Lawyer telah melakukan verifikasi terhadap kelengkapan berkas perkara yang diberikan oleh klien.',
                        'full_description' => 'Seluruh dokumen identitas, warkah tanah, dan surat kuasa khusus telah diverifikasi keabsahannya untuk kebutuhan pendaftaran dan pendampingan hukum.',
                        'attachments'      => [
                            [
                                'name' => 'berita-acara-verifikasi.pdf',
                                'size' => '310.5 KB',
                                'url'  => '#',
                            ],
                        ],
                    ],
                    [
                        'title'            => 'Koordinasi Penanganan Perkara',
                        'datetime_short'   => '12 Okt 2026, 10:03',
                        'datetime_full'    => '12 Oktober 2026, 10:03',
                        'summary'          => 'Lawyer telah melakukan koordinasi internal untuk menentukan langkah penanganan perkara selanjutnya.',
                        'full_description' => 'Tim advokat telah menyusun strategi penyelesaian sengketa dan jadwal pendampingan hukum bersama klien.',
                        'attachments'      => [],
                    ],
                ],
            ],
        ];

        $selectedId = $request->query('booking_id');
        $activeCase = collect($allBookings)->firstWhere('booking_id', (int) $selectedId) ?? $allBookings[0];

        return view('customer.tracking.index', compact(
            'customer',
            'allBookings',
            'activeCase'
        ));
    }
}