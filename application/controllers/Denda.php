<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Denda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_petugas');
    }

    public function index()
    {
        // Halaman utama untuk denda (jika diperlukan)
    }

    // public function create()
    // {
    //     // Ambil data dari POST
    //     $judul_buku = $this->input->post('judul'); // Judul buku dari form
    //     $nama_peminjam = $this->input->post('nama'); // Nama peminjam dari form

    //     // Dapatkan ID buku berdasarkan judul
    //     $buku = $this->M_petugas->get_buku_by_judul($judul_buku);
    //     if (!$buku) {
    //         $this->session->set_flashdata('error', 'Buku tidak ditemukan.');
    //         redirect('denda_petugas'); // Ganti dengan URL yang sesuai
    //         return;
    //     }
    //     // $buku_id = $buku->buku_id;

    //     // Dapatkan ID peminjam berdasarkan nama
    //     $peminjam = $this->M_petugas->get_peminjam_by_nama($nama_peminjam);
    //     if (!$peminjam) {
    //         $this->session->set_flashdata('error', 'Peminjam tidak ditemukan.');
    //         redirect('denda_petugas'); // Ganti dengan URL yang sesuai
    //         return;
    //     }
    //     $peminjam_id = $peminjam->peminjam_id;

    //     // Logika untuk menghitung denda
    //     $nominal_denda = $this->calculate_denda($peminjaman_id); // Implementasikan logika perhitungan denda sesuai kebutuhan
    //     $tanggal_dikembalikan = date('Y-m-d'); // Tanggal saat ini

    //     // Data untuk disimpan
    //     $data_denda = [
    //         // 'peminjaman_id' => $peminjaman_id,
    //         'tanggal_dikembalikan' => $tanggal_dikembalikan,
    //         'nominal' => $nominal_denda,
    //         'status' => 'belum dibayar', // Status denda
    //         'created_at' => date('Y-m-d H:i:s'),
    //         'updated_at' => date('Y-m-d H:i:s')
    //     ];

    //     // Simpan denda ke database
    //     if ($this->M_petugas->add_denda($data_denda)) {
    //         // Redirect atau tampilkan pesan sukses
    //         $this->session->set_flashdata('message', 'Denda berhasil ditambahkan.');
    //         redirect('denda_petugas'); // Ganti dengan URL yang sesuai
    //     } else {
    //         // Tampilkan pesan error
    //         $this->session->set_flashdata('error', 'Gagal menambahkan denda.');
    //         redirect('denda_petugas'); // Ganti dengan URL yang sesuai
    //     }
    // }

    private function calculate_denda($peminjaman_id)
    {
        // Implementasikan logika perhitungan denda
        // Misalnya, jika denda Rp 1000 per hari keterlambatan
        $denda_per_hari = 1000;

        // Logika untuk menghitung jumlah hari keterlambatan
        // Misalnya, ambil tanggal peminjaman dan tanggal dikembalikan
        // Hitung selisih hari dan kalikan dengan denda_per_hari

        // Contoh:
        // $selisih_hari = ...; // Hitung selisih hari
        // return $selisih_hari * $denda_per_hari;

        return 0; // Ganti dengan logika perhitungan yang sesuai
    }
}