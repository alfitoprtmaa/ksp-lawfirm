<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PusatReferensiController extends Controller
{
    /**
     * Menampilkan halaman Pusat Referensi Lawyer.
     */
    public function index(Request $request)
    {
        // Data profil lawyer disamakan dengan halaman Overview (lawyer.index)
        $lawyer = [
            'lawyer_id'  => 1,
            'role_name'  => 'Lawyer',
            'full_name'  => 'Adv. Adi Pratama, S.H., M.H.',
            'photo_path' => 'images/avatar-lawyer-large.jpg',
        ];

        // Daftar kategori dokumen sesuai mockup & kolom category pada REFERENCE_CENTER
        $categories = [
            [
                'slug'  => 'semua',
                'name'  => 'Semua Perkara',
                'count' => 124,
                'icon'  => 'bx-folder',
                'color' => 'default',
            ],
            [
                'slug'  => 'Sengketa Tanah',
                'name'  => 'Sengketa Tanah',
                'count' => 28,
                'icon'  => 'bx-home-alt',
                'color' => 'blue',
            ],
            [
                'slug'  => 'Perjanjian Kontrak',
                'name'  => 'Perjanjian Kontrak',
                'count' => 18,
                'icon'  => 'bx-file-blank',
                'color' => 'purple',
            ],
            [
                'slug'  => 'Gugatan Perkara',
                'name'  => 'Gugatan Perkara',
                'count' => 15,
                'icon'  => 'bx-gavel',
                'color' => 'light-blue',
            ],
            [
                'slug'  => 'Sengketa Waris',
                'name'  => 'Sengketa Waris',
                'count' => 12,
                'icon'  => 'bx-group',
                'color' => 'green',
            ],
            [
                'slug'  => 'Lainnya',
                'name'  => 'Lainnya',
                'count' => 8,
                'icon'  => 'bx-dots-horizontal-rounded',
                'color' => 'gray',
            ],
        ];

        // Mock data mengacu pada tabel REFERENCE_CENTER berelasi dengan BOOKING & LAWYER
        $allDocuments = collect([
            [
                'reference_id' => 1,
                'booking_id'   => 1,
                'case_code'    => 'CASE-001',
                'execution_id' => 1,
                'title'        => 'Surat-gugatan.pdf',
                'file_type'    => 'PDF',
                'file_size'    => '532 KB',
                'category'     => 'Gugatan Perkara',
                'pdf_document' => 'documents/surat-gugatan.pdf',
                'upload_date'  => '16 Oktober 2026',
                'upload_time'  => '15:55',
                'uploaded_by'  => 'Andi Pratama',
                'status'       => 'Selesai',
            ],
            [
                'reference_id' => 2,
                'booking_id'   => 1,
                'case_code'    => 'CASE-001',
                'execution_id' => 1,
                'title'        => 'Jawaban-tergugat.docx',
                'file_type'    => 'DOC',
                'file_size'    => '245 KB',
                'category'     => 'Gugatan Perkara',
                'pdf_document' => 'documents/jawaban-tergugat.docx',
                'upload_date'  => '12 Oktober 2026',
                'upload_time'  => '10:20',
                'uploaded_by'  => 'Andi Pratama',
                'status'       => 'Selesai',
            ],
            [
                'reference_id' => 3,
                'booking_id'   => 1,
                'case_code'    => 'CASE-001',
                'execution_id' => 1,
                'title'        => 'Bukti-transaksi.xlsx',
                'file_type'    => 'XLS',
                'file_size'    => '120 KB',
                'category'     => 'Perjanjian Kontrak',
                'pdf_document' => 'documents/bukti-transaksi.xlsx',
                'upload_date'  => '8 Oktober 2026',
                'upload_time'  => '14:30',
                'uploaded_by'  => 'Andi Pratama',
                'status'       => 'Selesai',
            ],
            [
                'reference_id' => 4,
                'booking_id'   => 1,
                'case_code'    => 'CASE-001',
                'execution_id' => 1,
                'title'        => 'Akta-jual-beli.pdf',
                'file_type'    => 'PDF',
                'file_size'    => '1.2 MB',
                'category'     => 'Sengketa Tanah',
                'pdf_document' => 'documents/akta-jual-beli.pdf',
                'upload_date'  => '5 Oktober 2026',
                'upload_time'  => '09:15',
                'uploaded_by'  => 'Andi Pratama',
                'status'       => 'Selesai',
            ],
        ]);

        // Filter opsional via query parameter (?category=...&search=...&status=...)
        $activeCategory = $request->query('category', 'semua');
        $search         = $request->query('search');
        $statusFilter   = $request->query('status');

        $documents = $allDocuments
            ->when($activeCategory !== 'semua', function ($collection) use ($activeCategory) {
                return $collection->where('category', $activeCategory);
            })
            ->when($search, function ($collection) use ($search) {
                return $collection->filter(function ($doc) use ($search) {
                    return stripos($doc['title'], $search) !== false
                        || stripos($doc['case_code'], $search) !== false
                        || stripos($doc['uploaded_by'], $search) !== false;
                });
            })
            ->when($statusFilter, function ($collection) use ($statusFilter) {
                return $collection->where('status', $statusFilter);
            })
            ->values();

        // Daftar perkara aktif untuk pilihan di modal Upload Dokumen
        $availableCases = [
            ['booking_id' => 1, 'case_code' => 'CASE-001', 'title' => 'Sengketa Lahan Denpasar'],
            ['booking_id' => 2, 'case_code' => 'CASE-002', 'title' => 'Wanprestasi Kontrak Vendor'],
            ['booking_id' => 3, 'case_code' => 'CASE-003', 'title' => 'Pembagian Harta Waris Keluarga'],
        ];

        return view('lawyer.pusatreferensi.index', compact(
            'lawyer',
            'categories',
            'documents',
            'activeCategory',
            'search',
            'statusFilter',
            'availableCases'
        ));
    }

    /**
     * Simulasi unggah dokumen baru ke REFERENCE_CENTER.
     */
    public function store(Request $request)
    {
        $request->validate([
            'booking_id'   => 'required|integer',
            'category'     => 'required|string|max:100',
            'title'        => 'required|string|max:255',
            'pdf_document' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
        ], [
            'booking_id.required'   => 'Pilih Case ID perkara terlebih dahulu.',
            'category.required'     => 'Kategori perkara wajib dipilih.',
            'title.required'        => 'Nama dokumen wajib diisi.',
            'pdf_document.required' => 'File dokumen wajib diunggah.',
            'pdf_document.mimes'    => 'Format file harus PDF, DOC/DOCX, atau XLS/XLSX.',
            'pdf_document.max'      => 'Ukuran file maksimal 10MB.',
        ]);

        // TODO (Tim Backend):
        // 1. Simpan file ke storage ($request->file('pdf_document')->store('reference_center'))
        // 2. Insert record baru ke tabel REFERENCE_CENTER (booking_id, execution_id, title, category, pdf_document, published_at, status)

        return redirect()
            ->route('lawyer.pusatreferensi.index')
            ->with('success', 'Dokumen referensi berhasil diunggah.');
    }
}