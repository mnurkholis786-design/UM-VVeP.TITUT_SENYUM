<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class DigitalArchive extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'folder_id',
        'kategori',
        'archive_name',
        'from_division',
        'submiter_name',
        'finance_officer_name',
        'revenue_officer_name',
        'file_path_archive',
        'archive_code',
        'nominal',
        'archive_by',
        'disposal_date',
        'kode_klasifikasi',
        'indeks1',
        'indeks2',
        'no_item',
        'uraian',
        'no_spby',
        'no_sp2d',
        'no_spm',
        'jenis_spm',
        'no_sp2d',
        'nilai_sp2d',
        'jenis_sp2d',
        'tgl_sp2d',
        'tgl_selesai_sp2d',
        'no_invoice',
        'tgl_invoice',
        'tgl_terima',
        'tingkat_pertimbangan',
        'jumlah_halaman',
        'retensi_arsip_aktif',
        'retensi_arsip_inaktif',
        'nasib_akhir_arsip',
        'klasifikasi_keamanan',
        'status',
        'keterangan',
        'lokasi_simpan_server',
        'link_arsip',
        'lokasi_simpan',
    ];

    /**
     * Daftar kategori resmi untuk Arsip Digital.
     *
     * Nilai yang disimpan ke database adalah kode subkategori.
     */
    public const KATEGORI_LIST = [
        'AEC.001',
        'BAH.001',
        'BAH.002',
        'BAH.003',
        'CBR.001',
        'CBT.002',
        'CDS.001',
        'CDS.002',
        'CDS.003',
        'EBA.994',
        'WA.4376',
    ];

    /**
     * Label rapi untuk ditampilkan di view.
     */
    public const KATEGORI_LABEL = [
        'AEC.001' => 'AEC.001 - Kerja Sama Jasa Siaran dan Digitalisasi Penyiaran Daerah',

        'BAH.001' => 'BAH.001 - Siaran Berita, Current Affairs dan Olahraga',
        'BAH.002' => 'BAH.002 - Siaran Program dan Promosi Acara',
        'BAH.003' => 'BAH.003 - Siaran Konten Media Baru',

        'CBR.001' => 'CBR.001 - Dukungan Teknis Kinerja Transmisi, Multipleksing dan Fasilitas Teknik',

        'CBT.002' => 'CBT.002 - Sarana dan Prasarana Teknik Produksi dan Penyiaran',

        'CDS.001' => 'CDS.001 - Pemeliharaan Transmisi, Multipleksing dan Fasilitas Teknik',
        'CDS.002' => 'CDS.002 - Pemeliharaan Peralatan Teknik Produksi dan Penyiaran',
        'CDS.003' => 'CDS.003 - Pemeliharaan Infrastruktur Teknologi Informatika dan Media Baru',

        'EBA.994' => 'EBA.994 - Layanan Perkantoran',

        'WA.4376' => 'WA.4376 - Pelaksanaan Dukungan Manajemen dan Tugas Teknis Lainnya Stasiun Penyiaran TV Publik Lokal dan Regional',
    ];

    /**
     * Nama kelompok / kategori induk.
     */
    public const KATEGORI_GROUP = [
        'AEC' => 'AEC - Kerja Sama',

        'BAH' => 'BAH - Pelayanan Publik Lainnya',

        'CBR' => 'CBR - Dukungan Teknis',

        'CBT' => 'CBT - Prasarana Bidang Teknologi Informasi dan Komunikasi',

        'CDS OP' => 'CDS OP - Prasarana Bidang Teknologi Informasi dan Komunikasi',

        'EBA' => 'EBA - Layanan Dukungan Manajemen Internal',

        'WA' => 'WA - Program Dukungan Manajemen',
    ];

    /**
     * Daftar subkategori berdasarkan kelompok.
     */
    public const KATEGORI_SUB = [
        'AEC' => [
            'AEC.001' => 'Kerja Sama Jasa Siaran dan Digitalisasi Penyiaran Daerah',
        ],

        'BAH' => [
            'BAH.001' => 'Siaran Berita, Current Affairs dan Olahraga',
            'BAH.002' => 'Siaran Program dan Promosi Acara',
            'BAH.003' => 'Siaran Konten Media Baru',
        ],

        'CBR' => [
            'CBR.001' => 'Dukungan Teknis Kinerja Transmisi, Multipleksing dan Fasilitas Teknik',
        ],

        'CBT' => [
            'CBT.002' => 'Sarana dan Prasarana Teknik Produksi dan Penyiaran',
        ],

        'CDS OP' => [
            'CDS.001' => 'Pemeliharaan Transmisi, Multipleksing dan Fasilitas Teknik',
            'CDS.002' => 'Pemeliharaan Peralatan Teknik Produksi dan Penyiaran',
            'CDS.003' => 'Pemeliharaan Infrastruktur Teknologi Informatika dan Media Baru',
        ],

        'EBA' => [
            'EBA.994' => 'Layanan Perkantoran',
        ],

        'WA' => [
            'WA.4376' => 'Pelaksanaan Dukungan Manajemen dan Tugas Teknis Lainnya Stasiun Penyiaran TV Publik Lokal dan Regional',
        ],
    ];

    /**
     * Daftar lokasi simpan resmi.
     *
     * Dipakai di controller (validasi) dan view (dropdown).
     */
    public const LOKASI_SIMPAN_LIST = [
        'Keuangan',
        'Umum',
        'Program 1',
        'Program 2',
    ];

    /**
     * Relasi DigitalArchive ke Category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Relasi DigitalArchive ke DocumentFolder (Sub Kategori).
     */
    public function folder()
    {
        return $this->belongsTo(DocumentFolder::class, 'folder_id');
    }

    /**
     * Menangani file_path_archive.
     *
     * Bisa membaca:
     * 1. Format lama: "archive/file.pdf"
     * 2. Format baru: ["archive/file1.pdf", "archive/file2.pdf"]
     */
    protected function filePathArchive(): Attribute
    {
        return Attribute::make(

            // GET
            get: function ($value) {

                // Tidak ada file
                if (empty($value)) {
                    return [];
                }

                // Sudah array
                if (is_array($value)) {
                    return $value;
                }

                // Coba decode JSON
                $decoded = json_decode($value, true);

                // Jika JSON valid dan berupa array
                if (
                    json_last_error() === JSON_ERROR_NONE &&
                    is_array($decoded)
                ) {
                    return $decoded;
                }

                // Format lama berupa string
                return [$value];
            },

            // SET
            set: function ($value) {

                // Tidak ada file
                if (empty($value)) {
                    return json_encode([]);
                }

                // Jika hanya string
                if (!is_array($value)) {
                    $value = [$value];
                }

                // Simpan sebagai JSON
                return json_encode($value);
            }
        );
    }
}