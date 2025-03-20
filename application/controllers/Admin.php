<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        // Middleware untuk akses admin
    }

    public function dashboard()
    {
        $this->load->view('buku_fiksi');
    }

    public function buku_fiksi()
    {
        $id_kategori = 1; // Sesuaikan dengan ID kategori Fiksi dalam database
        $data['datas'] = $this->M_admin->getBukuByKategori($id_kategori);
        $this->load->view('buku_fiksi', $data);
    }
    public function buku_nonfiksi()
    {

        $id_kategori = 2; // Sesuaikan dengan ID kategori Fiksi dalam database
        $data['datas'] = $this->M_admin->getBukuByKategori($id_kategori);

        $this->load->view('buku_nonfiksi', $data);
    }

    public function buku_pendidikan()
    {
        $id_kategori = 3; // Sesuaikan dengan ID kategori Fiksi dalam database
        $data['datas'] = $this->M_admin->getBukuByKategori($id_kategori);

        $this->load->view('buku_pendidikan', $data);
    }
    public function pinjam()
    {

        $data = array(
            'peminjam_id' => $this->input->post('peminjam_id'),
            'tanggal_pengembalian' => $this->input->post('tanggal_pengembalian'),
            'tanggal_peminjaman' => $this->input->post('tanggal_peminjaman'),
            'status' => 'pending',
            'buku_id' => $this->input->post('buku_id'),
            // 'code' => $this->input->post('code'),
            // 'tahun_terbit' => $this->input->post('tahun_terbit'),
            // 'jumlah' => $this->input->post('jumlah'),

        );
        $this->M_admin->pinjam($data);
        // var_dump($data);
        redirect('List_pinjaman', $data);
        // }
    }

    public function list_pinjaman()
    {
        // $data['datas'] = $this->M_admin->getBuku();
        $peminjam = $this->session->userdata('peminjam_id');
        $data['datas'] = $this->M_admin->get_pinjaman($peminjam);
        // $peminjam = $this->M_admin->get_nama();
        // $data['datas'] = $peminjam;


        $this->load->view('list_pinjaman', $data);
    }

    // Fungsi untuk menambahkan ulasan
    public function add()
    {
        $data = [
            'buku_id' => $this->input->post('buku_id'),
            'rating' => $this->input->post('rating'),
            'review_text' => $this->input->post('review_text'),
        ];
        log_message('debug', 'Data Ulasan: ' . print_r($data, true));
        if ($this->M_admin->add_ulasan($data)) {
            // Update total rating dan jumlah ulasan di tabel buku
            // $this->M_admin->update_buku_rating($data['buku_id'], $data['rating']);
            $this->session->set_flashdata('success', 'Ulasan berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan ulasan.');
        }

        // Mengembalikan response JSON
        echo json_encode(['status' => 'success']);
    }


    // Fungsi untuk mendapatkan ulasan berdasarkan buku_id
    public function get_ulasan($buku_id)
    {
        $data['ulasan'] = $this->Ulasan_model->get_ulasan_by_buku($buku_id);
        $this->load->view('ulasan_view', $data); // Ganti dengan nama file view Anda
    }
}
