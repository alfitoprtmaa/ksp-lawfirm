<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerBuatKonsultasiController extends Controller
{
    public function index()
    {
        $customer = session('customer_user', [
            'customer_id' => 1,
            'full_name'   => 'Muhammad Rizky Pratama',
            'email'       => 'rizky.pratama@email.com',
        ]);

        // Dummy tabel PROBLEM_CATEGORY sesuai ERD
        $problemCategories = [
            [
                'category_id'   => 1,
                'category_name' => 'Sengketa Tanah',
                'description'   => 'Permasalahan kepemilikan, batas tanah, dan sertifikat ganda.',
            ],
            [
                'category_id'   => 2,
                'category_name' => 'Perjanjian & Kontrak',
                'description'   => 'Penyusunan, peninjauan, maupun wanprestasi kontrak.',
            ],
            [
                'category_id'   => 3,
                'category_name' => 'Hukum Keluarga & Waris',
                'description'   => 'Pembagian waris, hibah, dan perkara keluarga.',
            ],
            [
                'category_id'   => 4,
                'category_name' => 'Ketenagakerjaan',
                'description'   => 'Perselisihan hubungan industrial dan PHK.',
            ],
        ];

        // Dummy tabel LEGAL_FIELD sesuai ERD
        $legalFields = [
            [
                'legal_field_id' => 1,
                'field_name'     => 'Hukum Perdata',
                'description'    => 'Sengketa hak keperdataan antar individu maupun badan hukum.',
            ],
            [
                'legal_field_id' => 2,
                'field_name'     => 'Hukum Pidana',
                'description'    => 'Pendampingan perkara tindak pidana.',
            ],
            [
                'legal_field_id' => 3,
                'field_name'     => 'Hukum Bisnis & Korporasi',
                'description'    => 'Sengketa dagang, akuisisi, dan kepailitan.',
            ],
            [
                'legal_field_id' => 4,
                'field_name'     => 'Hukum Tata Usaha Negara',
                'description'    => 'Sengketa keputusan pejabat tata usaha negara.',
            ],
        ];

        $draft = session('booking_draft', []);

        return view('customer.buatkonsultasi.index', compact(
            'customer',
            'problemCategories',
            'legalFields',
            'draft'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'applicant_name'     => ['required', 'string', 'max:255'],
            'nik'                => ['required', 'string', 'max:20'],
            'phone'              => ['required', 'string', 'max:30'],
            'email'              => ['required', 'email', 'max:255'],
            'address'            => ['required', 'string'],
            'birth_place_date'   => ['nullable', 'string', 'max:100'],
            'occupation'         => ['nullable', 'string', 'max:100'],
            'category_id'        => ['required', 'integer'],
            'legal_field_id'     => ['required', 'integer'],
            'consultation_title' => ['required', 'string', 'max:255'],
            'case_summary'       => ['required', 'string', 'max:500'],
            'documents.*'        => ['nullable', 'file', 'mimes:pdf,png,jpg,jpeg,docx', 'max:18432'],
        ]);

        // Simulasi insert ke tabel BOOKING & BOOKING_DOCUMENT sesuai ERD
        // booking_status default = 'pending', created_at = now()
        session()->forget('booking_draft');

        return redirect()
            ->route('customer.perkaralama.index')
            ->with('success', 'Pengajuan perkara baru berhasil dikirim dan menunggu peninjauan admin.');
    }
}