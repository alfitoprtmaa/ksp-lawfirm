<?php

namespace App\Http\Controllers;

/**
 * DATA DUMMY untuk halaman Layanan. Backend: ganti dengan data dari database.
 */
class ServicesController extends Controller
{
    public function index()
    {
        return view('services', [
            'whatsapp' => '6281919044044',
            'areas' => array_map('trim', explode('|', 'Bankruptcy and Insolvency|Civil Litigation and Dispute Resolution|Criminal Defense Litigation|Administrative Litigation and Dispute Resolution|Medical and Healthcare|Arbitration|Corporate and Commerce|Customs and Excise|Banking and Finance|Property|Intellectual Property|Labour and Employment|Mining|Taxation|Licensing and Compliance|Media and Communication|Insurance')),
            'intro' => 'Setiap persoalan memiliki konteks yang berbeda. Pilih layanan yang sesuai dengan kebutuhan Anda, mulai dari penanganan sengketa hingga pendampingan hukum berkelanjutan.',
            'services' => [
                [
                    'slug' => 'dispute-resolution',
                    'title' => 'Dispute Resolution',
                    'tagline' => 'Penyelesaian sengketa di luar pengadilan',
                    'desc' => 'Menelaah posisi hukum dan pilihan penyelesaian sengketa melalui negosiasi, mediasi, atau arbitrase. Pendampingan diarahkan pada pemahaman risiko, kepentingan para pihak, dan penyusunan kesepakatan yang dapat dilaksanakan.',
                    'points' => ['Analisis sengketa dan strategi penyelesaian', 'Pendampingan negosiasi, mediasi, dan arbitrase', 'Penyusunan serta penelaahan kesepakatan'],
                ],
                [
                    'slug' => 'litigation',
                    'title' => 'Litigation',
                    'tagline' => 'Pendampingan dalam proses pengadilan',
                    'desc' => 'Mendampingi penanganan perkara melalui jalur pengadilan, dari kajian awal hingga upaya hukum yang relevan. Setiap langkah disiapkan berdasarkan fakta, bukti, dan ketentuan hukum acara yang berlaku.',
                    'points' => ['Kajian perkara dan persiapan dokumen hukum', 'Pendampingan serta representasi di persidangan', 'Penilaian opsi upaya hukum dan pelaksanaan putusan'],
                ],
                [
                    'slug' => 'intellectual-property',
                    'title' => 'Intellectual Property',
                    'tagline' => 'Perlindungan karya dan identitas usaha',
                    'desc' => 'Membantu mengidentifikasi dan melindungi aset kekayaan intelektual, termasuk merek, hak cipta, paten, dan desain industri. Layanan mencakup pengurusan perlindungan, pengelolaan hak, serta penanganan potensi pelanggaran.',
                    'points' => ['Penelusuran dan pengajuan pendaftaran', 'Penelaahan lisensi serta pengalihan hak', 'Pendampingan keberatan dan sengketa kekayaan intelektual'],
                ],
                [
                    'slug' => 'corporate-commercial-compliance',
                    'title' => 'Corporate, Commercial & Compliance',
                    'tagline' => 'Dukungan hukum untuk kegiatan usaha',
                    'desc' => 'Mendampingi kebutuhan hukum perusahaan dan transaksi komersial agar selaras dengan peraturan yang berlaku. Penelaahan mencakup struktur usaha, kontrak, tata kelola, dan kewajiban kepatuhan sesuai konteks bisnis Anda.',
                    'points' => ['Pendirian, struktur, dan aksi korporasi', 'Penyusunan serta penelaahan kontrak komersial', 'Uji tuntas hukum dan evaluasi kepatuhan'],
                ],
                [
                    'slug' => 'retainer-general-counsel',
                    'title' => 'Retainer & General Counsel Service',
                    'tagline' => 'Pendampingan hukum berkelanjutan',
                    'desc' => 'Memberikan dukungan hukum berkala sebagai mitra diskusi untuk kebutuhan operasional dan keputusan strategis. Ruang lingkup serta pola pendampingan disepakati sesuai kebutuhan, sehingga isu hukum dapat ditelaah sejak awal.',
                    'points' => ['Konsultasi berkala dan pendapat hukum', 'Penelaahan dokumen serta kontrak operasional', 'Pemetaan risiko dan koordinasi kebutuhan hukum'],
                ],
            ],
        ]);
    }
}