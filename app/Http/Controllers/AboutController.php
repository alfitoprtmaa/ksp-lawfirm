<?php

namespace App\Http\Controllers;

/**
 * DATA DUMMY untuk halaman About Us. Backend: ganti dengan data dari database.
 */
class AboutController extends Controller
{
    public function index()
    {
        $bio = 'Mendampingi penanganan perkara melalui jalur pengadilan, dari kajian awal hingga upaya hukum yang relevan. Setiap langkah disiapkan berdasarkan fakta, bukti, dan ketentuan hukum acara yang berlaku.';
        $points = [
            'Kajian perkara dan persiapan dokumen hukum',
            'Pendampingan serta representasi di persidangan',
            'Penilaian opsi upaya hukum dan pelaksanaan putusan',
        ];
        $person = fn ($name, $photo) => ['name' => $name, 'photo' => $photo, 'bio' => $bio, 'points' => $points];

        return view('about', [
            'whatsapp' => '6281919044044',
            'areas' => array_map('trim', explode('|', 'Bankruptcy and Insolvency|Civil Litigation and Dispute Resolution|Criminal Defense Litigation|Administrative Litigation and Dispute Resolution|Medical and Healthcare|Arbitration|Corporate and Commerce|Customs and Excise|Banking and Finance|Property|Intellectual Property|Labour and Employment|Mining|Taxation|Licensing and Compliance|Media and Communication|Insurance')),
            'intro' => 'Setiap persoalan memiliki konteks yang berbeda. Pilih layanan yang sesuai dengan kebutuhan Anda, mulai dari penanganan sengketa hingga pendampingan hukum berkelanjutan.',
            'founder' => $person('Ketut Surya Putra, S.H., M.H., C.,ME., C.TLC', 'ketut.jpeg'),
            'partners' => [
                $person('Mivcha De Savernaya, S.H.', 'mivcha.jpeg'),
                $person('Christian Tarapul Anjur Hasiholan, S.H., M.H.', 'christian.jpeg'),
                $person('Muhammad Yunus Latjeno, S.H.', 'yunus.jpeg'),
                $person('Bagus Adi Mahendra, S.H.', 'bagus.jpeg'),
            ],
        ]);
    }
}