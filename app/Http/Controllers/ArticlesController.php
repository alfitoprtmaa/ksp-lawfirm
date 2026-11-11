<?php

namespace App\Http\Controllers;

/**
 * DATA DUMMY untuk halaman Artikel. Backend: ganti dengan data dari database.
 * Pencarian, filter kategori, urutan, dan pagination saat ini dikerjakan di browser (public/js/articles.js).
 */
class ArticlesController extends Controller
{
    public function index()
    {
        $article = fn ($category, $min, $title, $excerpt, $date) => [
            'category' => $category, 'minutes' => $min, 'title' => $title,
            'excerpt' => $excerpt, 'date' => $date, 'url' => '#',
        ];

        return view('articles', [
            'whatsapp' => '6281919044044',
            'areas' => array_map('trim', explode('|', 'Bankruptcy and Insolvency|Civil Litigation and Dispute Resolution|Criminal Defense Litigation|Administrative Litigation and Dispute Resolution|Medical and Healthcare|Arbitration|Corporate and Commerce|Customs and Excise|Banking and Finance|Property|Intellectual Property|Labour and Employment|Mining|Taxation|Licensing and Compliance|Media and Communication|Insurance')),
            'intro' => ['Memahami hukum. Membela hak.', 'Informasi, panduan praktis, dan cerita pendampingan untuk membantu Anda mengambil langkah yang tepat.'],
            'featured' => [
                'kicker' => 'Keadilan Buruh',
                'title' => 'Tuntutan Pesangon Adil: Kolektif Buruh Pabrik Tekstil Tangerang',
                'excerpt' => 'Setelah perusahaan mengumumkan kebangkrutan palsu dan menolak bayar pesangon, Ruang Adil mendampingi 84 pekerja menuntut hak mereka di PHI. Setelah 6 bulan litigasi, buruh berhasil mendapatkan 100% hak-hak normatif senilai Rp 1.8 Miliar.',
                'image' => 'news-1.jpg',
                'caption' => 'Sorotan tentang hak pekerja dan pendampingan hukum.',
                'url' => '#',
            ],
            'categories' => ['Ketenagakerjaan', 'Perdata', 'Pidana', 'Bisnis & usaha'],
            'articles' => [
                $article('Ketenagakerjaan', 5, 'Memahami hak pekerja saat terjadi PHK', 'Kenali dokumen, hak normatif, dan langkah awal yang perlu disiapkan ketika menghadapi pemutusan hubungan kerja.', '2026-11-05'),
                $article('Perdata', 6, 'Sengketa tanah: mulai dari mana?', 'Panduan awal menyiapkan bukti kepemilikan, mencatat kronologi, dan memahami pilihan penyelesaian sengketa.', '2026-10-28'),
                $article('Pidana', 4, 'Hak Anda saat menjalani pemeriksaan hukum', 'Pahami pentingnya pendampingan hukum serta hal-hal yang perlu diperhatikan sebelum memberikan keterangan.', '2026-10-20'),
                $article('Bisnis & usaha', 5, 'Sebelum menandatangani perjanjian kerja sama', 'Pelajari bagian penting dalam kontrak, dari ruang lingkup pekerjaan hingga mekanisme penyelesaian perselisihan.', '2026-10-12'),
                $article('Perdata', 4, 'Menyelesaikan sengketa melalui mediasi', 'Mengenal proses mediasi, persiapan yang dibutuhkan, dan peran kesepakatan dalam penyelesaian perkara.', '2026-10-03'),
                $article('Ketenagakerjaan', 5, 'Mendokumentasikan masalah di tempat kerja', 'Cara menyusun kronologi dan menyimpan dokumen agar konsultasi mengenai persoalan kerja lebih terarah.', '2026-09-24'),
            ],
        ]);
    }
}