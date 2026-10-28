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

    /**
     * Hitung total lembar halaman PDF dari file arsip yang tersimpan di disk.
     */
    public function hitungJumlahHalamanPdf(): ?int
    {
        $files = $this->file_path_archive;
        if (empty($files)) {
            return null;
        }

        if (!is_array($files)) {
            $files = [$files];
        }

        $total = 0;
        foreach ($files as $file) {
            if (empty($file)) {
                continue;
            }
            $fullPath = \Illuminate\Support\Facades\Storage::disk('private')->path($file);
            if (!file_exists($fullPath)) {
                continue;
            }

            try {
                $pdf = new \setasign\Fpdi\Fpdi();
                $total += $pdf->setSourceFile($fullPath);
            } catch (\Throwable $e) {
                // Fallback jika FPDI terkendala versi PDF
                $content = @file_get_contents($fullPath);
                if ($content) {
                    $matches = [];
                    $count = preg_match_all("/\/Type\s*\/Page[^s]/", $content, $matches);
                    if ($count > 0) {
                        $total += $count;
                    }
                }
            }
        }

        return $total > 0 ? $total : null;
    }

    /**
     * Accessor untuk atribut jumlah_halaman_pdf.
     */
    public function getJumlahHalamanPdfAttribute(): ?int
    {
        return $this->hitungJumlahHalamanPdf();
    }

    /**
     * Accessor cerdas untuk jumlah_halaman:
     * Mengembalikan nilai yang tersimpan di database jika ada,
     * atau menghitung otomatis dari file PDF jika kosong/null.
     */
    protected function jumlahHalaman(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if ($value !== null && $value !== '' && (int) $value > 0) {
                    return (int) $value;
                }
                return $this->hitungJumlahHalamanPdf();
            },
            set: fn ($value) => $value
        );
    }

    /**
     * Normalisasi retensi_arsip_aktif.
     * Kolom tipe YEAR di MySQL otomatis menyimpan angka 1..99 sebagai 2001..2099.
     * Accessor ini mengembalikan angka durasi tahun murni (contoh: 1, 2).
     */
    protected function retensiArsipAktif(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if ($value === null || $value === '' || $value === '-') {
                    return null;
                }
                $val = (int) $value;
                return $val > 1900 ? max(abs($val - 2000), 1) : $val;
            },
            set: fn ($value) => ($value !== null && $value !== '') ? (int) $value : null
        );
    }

    /**
     * Normalisasi retensi_arsip_inaktif.
     * Kolom tipe YEAR di MySQL otomatis menyimpan angka 1..99 sebagai 2001..2099.
     * Accessor ini mengembalikan angka durasi tahun murni (contoh: 3, 4, 5).
     */
    protected function retensiArsipInaktif(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if ($value === null || $value === '' || $value === '-') {
                    return null;
                }
                $val = (int) $value;
                return $val > 1900 ? max(abs($val - 2000), 1) : $val;
            },
            set: fn ($value) => ($value !== null && $value !== '') ? (int) $value : null
        );
    }

    /**
     * Ekstrak data No Kuitansi dan Tanggal Kuitansi dari file PDF arsip.
     */
    public function extractKuitansiDataFromPdf(): array
    {
        $files = is_array($this->file_path_archive)
            ? $this->file_path_archive
            : (json_decode($this->file_path_archive, true) ?: [$this->file_path_archive]);

        $result = ['no_kuitansi' => null, 'tanggal_kuitansi' => null];

        foreach ($files as $file) {
            if (!$file) {
                continue;
            }

            $fullPath = \Illuminate\Support\Facades\Storage::disk('private')->path($file);
            if (!file_exists($fullPath)) {
                continue;
            }

            // Ekstrak teks halaman 1 s/d 4 dengan mempertahankan tata letak (layout)
            $cmd = 'pdftotext -f 1 -l 4 -layout ' . escapeshellarg($fullPath) . ' -';
            $text = @shell_exec($cmd);

            if (!$text) {
                continue;
            }

            // 1. Ekstrak No Kuitansi (Mendukung nomor berspasi seperti Disposisi & multi-line)
            if (preg_match('/SURAT\s+PERINTAH\s+BAYAR[\s\r\n]+No\s*:\s*([^\r\n]+)/i', $text, $m)) {
                $candidate = trim($m[1]);
                if (strlen($candidate) > 3) {
                    $result['no_kuitansi'] = $candidate;
                }
            } elseif (preg_match('/No\s*[\r\n\s]*Kuitansi\s*[\r\n\s]*([^\r\n]+(?:\r?\n\s{10,}[^\r\n]+)?)/i', $text, $m)) {
                $lines = array_map('trim', explode("\n", $m[1]));
                $candidate = implode(' ', array_filter($lines));
                $candidate = preg_replace('/-\s+/', '-', $candidate);
                if (strlen($candidate) > 3) {
                    $result['no_kuitansi'] = $candidate;
                }
            } elseif (preg_match('/(?:SPBY|PEMBEBANAN|KWITANSI)[^\r\n]*?-(Disposisi\/[^\r\n]+)/i', $text, $m)) {
                $result['no_kuitansi'] = trim($m[1]);
            }

            // 2. Ekstrak Tanggal Kuitansi (Contoh: 24 Juli 2026)
            if (preg_match('/Kuitansi(?:\/Bukti\s+Pembayaran)?\s+(\d{1,2}\s+[A-Za-z]+\s+\d{4})/i', $text, $m)) {
                $result['tanggal_kuitansi'] = trim($m[1]);
            } elseif (preg_match('/Banjarmasin,\s*(\d{1,2}\s+[A-Za-z]+\s+\d{4})/i', $text, $m)) {
                $result['tanggal_kuitansi'] = trim($m[1]);
            }

            if ($result['no_kuitansi'] || $result['tanggal_kuitansi']) {
                break;
            }
        }

        return $result;
    }

    /**
     * Accessor tampilan No Kuitansi:
     * Mengambil dari no_invoice (jika pernah diinput), atau ekstrak otomatis dari PDF.
     */
    public function getNoKuitansiDisplayAttribute(): string
    {
        if (!empty($this->no_invoice) && trim($this->no_invoice) !== '-') {
            return $this->no_invoice;
        }

        $data = $this->extractKuitansiDataFromPdf();
        if (!empty($data['no_kuitansi'])) {
            return $data['no_kuitansi'];
        }

        return $this->archive_code ?? '-';
    }

    /**
     * Accessor tampilan Tanggal Kuitansi:
     * Mengambil dari tgl_invoice (jika pernah diinput), atau ekstrak otomatis dari PDF.
     */
    public function getTanggalKuitansiDisplayAttribute(): string
    {
        if (!empty($this->tgl_invoice)) {
            return \Carbon\Carbon::parse($this->tgl_invoice)->format('d F Y');
        }

        $data = $this->extractKuitansiDataFromPdf();
        if (!empty($data['tanggal_kuitansi'])) {
            return $data['tanggal_kuitansi'];
        }

        return $this->created_at ? \Carbon\Carbon::parse($this->created_at)->format('d F Y') : '-';
    }

    /**
     * Format tanggal kuitansi khusus untuk input type="date" (format Y-m-d)
     */
    public function getTanggalKuitansiInputAttribute(): ?string
    {
        if (!empty($this->tgl_invoice)) {
            try {
                return \Carbon\Carbon::parse($this->tgl_invoice)->format('Y-m-d');
            } catch (\Throwable $e) {}
        }

        $data = $this->extractKuitansiDataFromPdf();
        if (!empty($data['tanggal_kuitansi'])) {
            $indoMonths = [
                'Januari' => 'January', 'Februari' => 'February', 'Maret' => 'March',
                'April' => 'April', 'Mei' => 'May', 'Juni' => 'June',
                'Juli' => 'July', 'Agustus' => 'August', 'September' => 'September',
                'Oktober' => 'October', 'November' => 'November', 'Desember' => 'December',
            ];
            $trans = str_ireplace(array_keys($indoMonths), array_values($indoMonths), $data['tanggal_kuitansi']);
            try {
                return \Carbon\Carbon::parse($trans)->format('Y-m-d');
            } catch (\Throwable $e) {}
        }

        return $this->created_at ? \Carbon\Carbon::parse($this->created_at)->format('Y-m-d') : null;
    }

    /**
     * Ekstrak teks 'Untuk Pembayaran' langsung dari file PDF arsip.
     */
    public function extractUraianFromPdf(): ?string
    {
        $files = is_array($this->file_path_archive)
            ? $this->file_path_archive
            : (json_decode($this->file_path_archive, true) ?: [$this->file_path_archive]);

        foreach ($files as $file) {
            if (!$file) {
                continue;
            }

            $fullPath = \Illuminate\Support\Facades\Storage::disk('private')->path($file);
            if (!file_exists($fullPath)) {
                continue;
            }

            // Baca teks dari halaman 1 sampai 4 PDF menggunakan pdftotext
            $cmd = 'pdftotext -f 1 -l 4 ' . escapeshellarg($fullPath) . ' -';
            $text = @shell_exec($cmd);

            if (!$text) {
                continue;
            }

            // Pola 1: Format Kuitansi / SPBY ("Untuk Pembayaran ...")
            if (preg_match('/Untuk\s+Pembayaran\s*[:\s]?\s*([^\n\r]+(?:\r?\n(?!\s*(?:Atas\s+Dasar|Banjarmasin|Setuju|Diterima|Lunas|An\s+Kuasa|Diajukan|\d+\.))[^\n\r]+)*)/i', $text, $match)) {
                $clean = trim(preg_replace('/\s+/', ' ', $match[1]));
                if (strlen($clean) > 5) {
                    return $clean;
                }
            }

            // Pola 2: Format Lembar Pembebanan ("Untuk ...")
            if (preg_match('/Untuk\s+(?:Program\s+Kegiatan\s+)?([^\n\r]+(?:\r?\n(?!\s*(?:Program|Kegiatan|KRO|RO|Komponen|MAK|Diajukan))[^\n\r]+)*)/i', $text, $match)) {
                $clean = trim(preg_replace('/\s+/', ' ', $match[1]));
                if (strlen($clean) > 5) {
                    return $clean;
                }
            }
        }

        // Fallback: jika tidak terdeteksi, ambil nama arsip dan bersihkan prefix 'SPJ'
        return $this->archive_name ? trim(preg_replace('/^(?:SPJ\s+|PENGAJUAN\s+)/i', '', $this->archive_name)) : null;
    }

    /**
     * Accessor cerdas untuk kolom uraian:
     * Jika database kosong/null, otomatis membaca dari PDF.
     */
    protected function uraian(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if ($value !== null && trim($value) !== '' && trim($value) !== '-') {
                    return $value;
                }
                return $this->extractUraianFromPdf();
            },
            set: fn ($value) => $value
        );
    }
}