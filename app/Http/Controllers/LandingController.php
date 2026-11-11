<?php

namespace App\Http\Controllers;

/**
 * CATATAN: data di bawah hanya DUMMY untuk keperluan frontend.
 * Ganti dengan data dari backend/database (lihat README -> Kontrak data).
 */
class LandingController extends Controller
{
    public function index()
    {
        $whatsapp = '6281919044044';

        $services = [
            ['title' => 'Dispute Resolution', 'color' => 'blue', 'icon' => 'fa-solid fa-scale-balanced',
             'desc' => 'Penyelesaian sengketa melalui negosiasi, mediasi, dan jalur formal secara efektif dan terukur.'],
            ['title' => 'Litigation', 'color' => 'red', 'icon' => 'fa-solid fa-building-columns',
             'desc' => 'Pendampingan dan representasi hukum di seluruh tingkat peradilan, dari persiapan hingga putusan.'],
            ['title' => 'Intellectual Property', 'color' => 'green', 'icon' => 'fa-solid fa-lightbulb',
             'desc' => 'Pendaftaran, perlindungan, dan penegakan hak merek, paten, hak cipta, dan desain industri.'],
            ['title' => 'Corporate, Commercial & Compliance', 'color' => 'olive', 'icon' => 'fa-regular fa-building',
             'desc' => 'Pendirian badan usaha, kontrak komersial, due diligence, dan kepatuhan regulasi bisnis.'],
            ['title' => 'Retainer & General Counsel Service', 'color' => 'orange', 'icon' => 'fa-regular fa-handshake',
             'desc' => 'Layanan konsultan hukum berkelanjutan sebagai mitra hukum internal perusahaan Anda.'],
        ];

        $areas = [
            'Bankruptcy and Insolvency', 'Civil Litigation and Dispute Resolution', 'Criminal Defense Litigation',
            'Administrative Litigation and Dispute Resolution', 'Medical and Healthcare', 'Arbitration',
            'Corporate and Commerce', 'Customs and Excise', 'Banking and Finance',
            'Property', 'Intellectual Property', 'Labour and Employment',
            'Mining', 'Taxation', 'Licensing and Compliance',
            'Media and Communication', 'Insurance',
        ];

        $team = [
            ['name' => 'Ketut Surya Putra, S.H., M.H., C.,ME., C.TLC.', 'photo' => 'ketut.jpeg', 'url' => '#'],
            ['name' => 'Mivcha De Savernaya, S.H.', 'photo' => 'mivcha.jpeg', 'url' => '#'],
            ['name' => 'Christian Tarapul Anjur Hasiholan, S.H., M.H.', 'photo' => 'christian.jpeg', 'url' => '#'],
            ['name' => 'Muhammad Yunus Latjeno, S.H.', 'photo' => 'yunus.jpeg', 'url' => '#'],
            ['name' => 'Bagus Adi Mahendra, S.H.', 'photo' => 'bagus.jpeg', 'url' => '#'],
        ];

        $news = array_fill(0, 3, [
            'category' => 'Ketenagakerjaan',
            'title' => 'Tuntutan Pesangon Adil: Kolektif Buruh Pabrik Tekstil Tangerang',
            'excerpt' => 'Setelah perusahaan mengumumkan rencana penutupan, 84 pekerja didampingi menuntut hak mereka di PN Tangerang. Setelah 8 bulan sidang, buruh berhasil mendapatkan 100% hak normatif senilai Rp 1,8 Miliar.',
            'image' => 'news-1.jpg',
            'url' => '#',
        ]);

        $faqs = array_fill(0, 4, [
            'q' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit?',
            'a' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        ]);

        return view('welcome', compact('whatsapp', 'services', 'areas', 'team', 'news', 'faqs'));
    }
}