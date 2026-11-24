<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerPerkaraController extends Controller
{
    public function index()
    {
        $customer = session('customer_user', [
            'customer_id' => 1,
            'full_name'   => 'Andi Pratama, S.T.',
            'email'       => 'andi.pratama@email.com',
        ]);

        // Simulasi query BOOKING + PROBLEM_CATEGORY + LEGAL_FIELD + BOOKING_DOCUMENT sesuai ERD
        $bookings = [
            [
                'booking_id'          => 666,
                'case_number'         => 'CASEID-666',
                'registration_number' => 'KP-2026-001',
                'customer_id'         => 1,
                'category_id'         => 1,
                'category_name'       => 'Sengketa Tanah & Properti',
                'legal_field_id'      => 1,
                'legal_field_name'    => 'Hukum Perdata',
                'lawyer_id'           => 3,
                'applicant_name'      => 'Andi Pratama, S.T.',
                'nik'                 => '3516082405890002',
                'occupation'          => 'Wiraswasta / Pemilik Usaha',
                'address'             => 'Jl. Ngaru aru no 21',
                'birth_place_date'    => '21/04/2004',
                'phone'               => '0812-3456-7890',
                'email'               => 'andi.pratama@email.com',
                'defendant_name'      => 'Budi Santoso & Rekan',
                'consultation_title'  => 'Sengketa Kepemilikan Hak Tanah Waris',
                'case_summary'        => 'Klien mengajukan gugatan sengketa kepemilikan sebidang tanah seluas 450m² bersertifikat SHM No. 1290 yang diklaim secara sepihak dan dibangun bangunan permanen tanpa izin oleh pihak lawan. Klien telah melampirkan bukti warkah tanah dan silsilah waris resmi dari kelurahan setempat.',
                'booking_status'      => 'verified',
                'display_status'      => 'Dalam Proses',
                'created_at'          => '2022-09-28 09:00:00',
                'formatted_date'      => 'September 28, 2022',
                'documents'           => [
                    [
                        'document_id'           => 1,
                        'booking_id'            => 666,
                        'document_name'         => 'KTP_Klien_AndiPratama.pdf',
                        'document_file'         => 'documents/ktp_andi.pdf',
                        'document_type'         => 'PDF',
                        'file_size'             => '1.2 MB',
                        'uploaded_at_formatted' => '8 Okt 2026',
                        'file_url'              => '#',
                    ],
                    [
                        'document_id'           => 2,
                        'booking_id'            => 666,
                        'document_name'         => 'Salinan_Sertifikat_SHM_1290.pdf',
                        'document_file'         => 'documents/shm_1290.pdf',
                        'document_type'         => 'PDF',
                        'file_size'             => '4.5 MB',
                        'uploaded_at_formatted' => '8 Okt 2026',
                        'file_url'              => '#',
                    ],
                    [
                        'document_id'           => 3,
                        'booking_id'            => 666,
                        'document_name'         => 'Surat_Kuasa_Khusus_Ditandatangani.pdf',
                        'document_file'         => 'documents/surat_kuasa.pdf',
                        'document_type'         => 'PDF',
                        'file_size'             => '2.1 MB',
                        'uploaded_at_formatted' => '9 Okt 2026',
                        'file_url'              => '#',
                    ],
                ],
            ],
            [
                'booking_id'          => 667,
                'case_number'         => 'CASEID-667',
                'registration_number' => 'KP-2026-002',
                'customer_id'         => 1,
                'category_id'         => 2,
                'category_name'       => 'Perjanjian Kontrak',
                'legal_field_id'      => 1,
                'legal_field_name'    => 'Perjanjian Kontrak',
                'lawyer_id'           => 2,
                'applicant_name'      => 'Andi Pratama, S.T.',
                'nik'                 => '3516082405890002',
                'occupation'          => 'Wiraswasta / Pemilik Usaha',
                'address'             => 'Jl. Ngaru aru no 21',
                'birth_place_date'    => '21/04/2004',
                'phone'               => '0812-3456-7890',
                'email'               => 'andi.pratama@email.com',
                'defendant_name'      => 'PT Nusantara Konstruksi',
                'consultation_title'  => 'Penyelesaian Wanprestasi Kontrak Pengadaan',
                'case_summary'        => 'Perkara wanprestasi pembayaran termin akhir proyek pengadaan material bangunan yang telah diselesaikan melalui mediasi dan akta perdamaian.',
                'booking_status'      => 'verified',
                'display_status'      => 'Selesai',
                'created_at'          => '2022-09-26 11:30:00',
                'formatted_date'      => 'September 26, 2022',
                'documents'           => [
                    [
                        'document_id'           => 4,
                        'booking_id'            => 667,
                        'document_name'         => 'Kontrak_Kerjasama_2022.pdf',
                        'document_file'         => 'documents/kontrak_2022.pdf',
                        'document_type'         => 'PDF',
                        'file_size'             => '3.0 MB',
                        'uploaded_at_formatted' => '26 Sep 2022',
                        'file_url'              => '#',
                    ],
                ],
            ],
            [
                'booking_id'          => 702,
                'case_number'         => 'CASEID-702',
                'registration_number' => 'KP-2026-003',
                'customer_id'         => 1,
                'category_id'         => 3,
                'category_name'       => 'Hukum Bisnis & Dagang',
                'legal_field_id'      => 1,
                'legal_field_name'    => 'Wanprestasi Bisnis',
                'lawyer_id'           => 4,
                'applicant_name'      => 'Andi Pratama, S.T.',
                'nik'                 => '3516082405890002',
                'occupation'          => 'Wiraswasta / Pemilik Usaha',
                'address'             => 'Jl. Ngaru aru no 21',
                'birth_place_date'    => '21/04/2004',
                'phone'               => '0812-3456-7890',
                'email'               => 'andi.pratama@email.com',
                'defendant_name'      => 'CV Maju Bersama',
                'consultation_title'  => 'Gugatan Wanprestasi Distribusi Barang',
                'case_summary'        => 'Keterlambatan pengiriman barang dagang melewati batas waktu perjanjian yang menyebabkan kerugian operasional.',
                'booking_status'      => 'verified',
                'display_status'      => 'Dalam Proses',
                'created_at'          => '2022-10-05 14:15:00',
                'formatted_date'      => 'Oktober 05, 2022',
                'documents'           => [
                    [
                        'document_id'           => 5,
                        'booking_id'            => 702,
                        'document_name'         => 'Surat_Somasi_Pertama.pdf',
                        'document_file'         => 'documents/somasi_1.pdf',
                        'document_type'         => 'PDF',
                        'file_size'             => '1.1 MB',
                        'uploaded_at_formatted' => '5 Okt 2022',
                        'file_url'              => '#',
                    ],
                ],
            ],
            [
                'booking_id'          => 715,
                'case_number'         => 'CASEID-715',
                'registration_number' => 'KP-2026-004',
                'customer_id'         => 1,
                'category_id'         => 1,
                'category_name'       => 'Hukum Keluarga & Waris',
                'legal_field_id'      => 1,
                'legal_field_name'    => 'Hak Waris & Hibah',
                'lawyer_id'           => 2,
                'applicant_name'      => 'Andi Pratama, S.T.',
                'nik'                 => '3516082405890002',
                'occupation'          => 'Wiraswasta / Pemilik Usaha',
                'address'             => 'Jl. Ngaru aru no 21',
                'birth_place_date'    => '21/04/2004',
                'phone'               => '0812-3456-7890',
                'email'               => 'andi.pratama@email.com',
                'defendant_name'      => '-',
                'consultation_title'  => 'Penetapan Ahli Waris & Pembagian Hibah',
                'case_summary'        => 'Pengurusan penetapan ahli waris dan akta pembagian harta hibah keluarga telah selesai diterbitkan.',
                'booking_status'      => 'verified',
                'display_status'      => 'Selesai',
                'created_at'          => '2022-10-14 08:45:00',
                'formatted_date'      => 'Oktober 14, 2022',
                'documents'           => [
                    [
                        'document_id'           => 6,
                        'booking_id'            => 715,
                        'document_name'         => 'Akta_Hibah_Notaris.pdf',
                        'document_file'         => 'documents/akta_hibah.pdf',
                        'document_type'         => 'PDF',
                        'file_size'             => '2.4 MB',
                        'uploaded_at_formatted' => '14 Okt 2022',
                        'file_url'              => '#',
                    ],
                ],
            ],
        ];

        $totalBookings = 42;

        return view('customer.perkaralama.index', compact('customer', 'bookings', 'totalBookings'));
    }

    public function uploadDocument(Request $request, int $bookingId)
    {
        $request->validate([
            'document_name' => ['required', 'string', 'max:255'],
            'document_file' => ['required', 'file', 'mimes:pdf,png,jpg,jpeg', 'max:5120'],
        ]);

        // Simulasi penyimpanan ke tabel BOOKING_DOCUMENT (booking_id, document_name, document_file, document_type, uploaded_at)
        return back()->with('success', "Dokumen \"{$request->document_name}\" berhasil ditambahkan ke perkara #{$bookingId}.");
    }
}