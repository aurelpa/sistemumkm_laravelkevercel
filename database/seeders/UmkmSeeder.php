<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Umkm;

class UmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_usaha'      => 'Warung Makan Bu Sari',
                'nama_pemilik'    => 'Sari Dewi',
                'jenis_usaha'     => 'Kuliner',
                'alamat'          => 'Jl. Pahlawan No. 12, Surabaya, Jawa Timur',
                'nomor_telepon'   => '081234567890',
                'email'           => 'busari.warung@gmail.com',
                'tahun_berdiri'   => 2015,
                'jumlah_karyawan' => 5,
                'deskripsi_usaha' => 'Warung makan yang menyajikan masakan rumahan khas Jawa Timur dengan harga terjangkau.',
            ],
            [
                'nama_usaha'      => 'Batik Nusantara Jaya',
                'nama_pemilik'    => 'Hendra Kusuma',
                'jenis_usaha'     => 'Fashion',
                'alamat'          => 'Jl. Batik Raya No. 45, Yogyakarta',
                'nomor_telepon'   => '082345678901',
                'email'           => 'batiknusantara@yahoo.com',
                'tahun_berdiri'   => 2010,
                'jumlah_karyawan' => 12,
                'deskripsi_usaha' => 'Usaha batik tulis dan cap berkualitas tinggi, menggunakan bahan premium dan motif tradisional.',
            ],
            [
                'nama_usaha'      => 'Tani Makmur Organik',
                'nama_pemilik'    => 'Budi Santoso',
                'jenis_usaha'     => 'Pertanian',
                'alamat'          => 'Desa Sumber Jaya, Malang, Jawa Timur',
                'nomor_telepon'   => '083456789012',
                'email'           => 'tanimakmur.organik@gmail.com',
                'tahun_berdiri'   => 2018,
                'jumlah_karyawan' => 8,
                'deskripsi_usaha' => 'Pertanian organik sayuran dan buah-buahan segar tanpa pestisida kimia, tersertifikasi organik.',
            ],
            [
                'nama_usaha'      => 'Kerajinan Rotan Indah',
                'nama_pemilik'    => 'Rina Wati',
                'jenis_usaha'     => 'Kerajinan',
                'alamat'          => 'Jl. Kerajinan No. 7, Cirebon, Jawa Barat',
                'nomor_telepon'   => '084567890123',
                'email'           => 'rotanindah.cirebon@gmail.com',
                'tahun_berdiri'   => 2012,
                'jumlah_karyawan' => 20,
                'deskripsi_usaha' => 'Memproduksi furniture dan kerajinan tangan berbahan rotan berkualitas ekspor.',
            ],
            [
                'nama_usaha'      => 'Jasa Laundry Bersih',
                'nama_pemilik'    => 'Ahmad Fauzi',
                'jenis_usaha'     => 'Jasa',
                'alamat'          => 'Jl. Kemerdekaan No. 23, Bandung, Jawa Barat',
                'nomor_telepon'   => '085678901234',
                'email'           => 'laundry.bersih@gmail.com',
                'tahun_berdiri'   => 2019,
                'jumlah_karyawan' => 3,
                'deskripsi_usaha' => 'Jasa laundry kiloan dan satuan dengan pickup & delivery, menggunakan detergen ramah lingkungan.',
            ],
            [
                'nama_usaha'      => 'Toko Sembako Murah',
                'nama_pemilik'    => 'Dewi Rahayu',
                'jenis_usaha'     => 'Perdagangan',
                'alamat'          => 'Jl. Pasar Baru No. 88, Jakarta Pusat',
                'nomor_telepon'   => '086789012345',
                'email'           => 'sembako.murah@gmail.com',
                'tahun_berdiri'   => 2008,
                'jumlah_karyawan' => 4,
                'deskripsi_usaha' => 'Toko sembako dengan harga grosir, melayani pembelian eceran maupun partai besar.',
            ],
            [
                'nama_usaha'      => 'Peternakan Ayam Sejahtera',
                'nama_pemilik'    => 'Joko Widodo',
                'jenis_usaha'     => 'Peternakan',
                'alamat'          => 'Desa Kalirejo, Blitar, Jawa Timur',
                'nomor_telepon'   => '087890123456',
                'email'           => 'ayam.sejahtera@gmail.com',
                'tahun_berdiri'   => 2016,
                'jumlah_karyawan' => 6,
                'deskripsi_usaha' => 'Peternakan ayam broiler dan layer modern, kapasitas 10.000 ekor dengan sistem kandang tertutup.',
            ],
            [
                'nama_usaha'      => 'Bengkel Motor Lancar',
                'nama_pemilik'    => 'Agus Salim',
                'jenis_usaha'     => 'Otomotif',
                'alamat'          => 'Jl. Raya Bogor No. 156, Bogor, Jawa Barat',
                'nomor_telepon'   => '088901234567',
                'email'           => 'bengkel.lancar@gmail.com',
                'tahun_berdiri'   => 2014,
                'jumlah_karyawan' => 7,
                'deskripsi_usaha' => 'Bengkel motor spesialis semua merek, melayani servis berkala, ganti oli, dan perbaikan mesin.',
            ],
            [
                'nama_usaha'      => 'Studio Foto Digital',
                'nama_pemilik'    => 'Maya Sari',
                'jenis_usaha'     => 'Jasa',
                'alamat'          => 'Jl. Sudirman No. 34, Semarang, Jawa Tengah',
                'nomor_telepon'   => '089012345678',
                'email'           => 'studio.digital.maya@gmail.com',
                'tahun_berdiri'   => 2020,
                'jumlah_karyawan' => 2,
                'deskripsi_usaha' => 'Studio foto profesional untuk kebutuhan foto produk, portrait, wedding, dan corporate event.',
            ],
            [
                'nama_usaha'      => 'Konveksi Seragam Rapid',
                'nama_pemilik'    => 'Teguh Prasetyo',
                'jenis_usaha'     => 'Fashion',
                'alamat'          => 'Jl. Industri No. 9, Solo, Jawa Tengah',
                'nomor_telepon'   => '081123456789',
                'email'           => 'konveksi.rapid@gmail.com',
                'tahun_berdiri'   => 2013,
                'jumlah_karyawan' => 25,
                'deskripsi_usaha' => 'Konveksi seragam sekolah, kantor, dan komunitas. Menerima pesanan custom sablon dan bordir.',
            ],
            [
                'nama_usaha'      => 'Warung Kopi Nusantara',
                'nama_pemilik'    => 'Firman Hidayat',
                'jenis_usaha'     => 'Kuliner',
                'alamat'          => 'Jl. Gajah Mada No. 55, Medan, Sumatera Utara',
                'nomor_telepon'   => '082234567890',
                'email'           => 'kopinusantara.medan@gmail.com',
                'tahun_berdiri'   => 2021,
                'jumlah_karyawan' => 4,
                'deskripsi_usaha' => 'Kedai kopi dengan berbagai pilihan kopi nusantara premium, dari Gayo hingga Toraja.',
            ],
            [
                'nama_usaha'      => 'Toko Online Elektronik Murah',
                'nama_pemilik'    => 'Rizky Pratama',
                'jenis_usaha'     => 'Perdagangan',
                'alamat'          => 'Jl. Elektronik No. 22, Surabaya, Jawa Timur',
                'nomor_telepon'   => '083345678901',
                'email'           => 'elektronik.murah.rizky@gmail.com',
                'tahun_berdiri'   => 2017,
                'jumlah_karyawan' => 10,
                'deskripsi_usaha' => 'Toko online dan offline elektronik terpercaya, menjual gadget, laptop, dan aksesoris dengan garansi resmi.',
            ],
        ];

        foreach ($data as $item) {
            Umkm::create($item);
        }

        $this->command->info('✅ ' . count($data) . ' data UMKM berhasil di-seed.');
    }
}
