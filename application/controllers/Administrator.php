<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_administrator');
        $this->load->model('M_petugas');
    }

    // Fungsi untuk menampilkan form registrasi
    public function register()
    {
        $data['datas'] = $this->M_administrator->getAllUsers();
        $this->load->view('regis_admin', $data); // Ganti dengan nama view Anda
    }

    // Fungsi untuk memproses registrasi
    public function store()
    {
        $data = [
            'id_user' => $this->input->post('id_user'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'email' => $this->input->post('email'),
            'image' => $this->uploadImage(), // Fungsi untuk mengupload gambar
            'role_id' => $this->input->post('role_id'),
            'date_created' => date('Y-m-d H:i:s')
        ];

        if ($this->UserModel->addUser($data)) {
            $this->session->set_flashdata('success', 'User added successfully!');
            redirect('user/list'); // Ganti dengan URL yang sesuai
        } else {
            $this->session->set_flashdata('error', 'Failed to add user.');
            redirect('user/register'); // Ganti dengan URL yang sesuai
        }
    }

    // Fungsi untuk mengupload gambar
    private function uploadImage()
    {
        $config['upload_path'] = './uploads/'; // Ganti dengan path yang sesuai
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // 2MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        } else {
            return null; // Atau bisa mengembalikan nilai default
        }
    }

    // Fungsi untuk menampilkan daftar pengguna
    public function list()
    {
        $data['users'] = $this->UserModel->getAllUsers();
        $this->load->view('user_list', $data); // Ganti dengan nama view Anda
    }

    // Fungsi untuk menghapus pengguna
    public function delete($id)
    {
        if ($this->UserModel->deleteUser($id)) {
            $this->session->set_flashdata('success', 'User deleted successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete user.');
        }
        redirect('user/list'); // Ganti dengan URL yang sesuai
    }

    public function tambah_user()
    {
        // Ambil data dari form
        $data = [
            'img' => $this->input->post('img'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // Hash password
            'role' => $this->input->post('role'),
            'date_created' => $this->input->post('date_created')
        ];

        // Simpan ke database
        $insert = $this->M_administrator->insert_user($data);

        if ($insert) {
            $this->session->set_flashdata('success', 'User berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan user.');
        }

        redirect(base_url('Administrator'));
    }

    public function index()
    {
        $data['datas'] = $this->M_administrator->getAllUsers();
        $this->load->view('regis_admin', $data);
    }

    public function generate_laporan()
    {
        $data['datas'] = $this->M_petugas->get_pinjaman();
        // $data['datas'] = $this->M_administrator->get_pinjaman();
        // if (!$this->session->userdata('logged')) {
        //     redirect('login_peminjam');
        // }

        $this->load->view('generate_laporan', $data);
    }

    public function download_all()
    {
        // Load mPDF
        require_once FCPATH . 'vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf();

        // Ambil data dari database
        $this->load->model('M_admin');
        $dataPeminjaman = $this->M_administrator->getAllPeminjaman();

        // Buat tampilan HTML untuk PDF
        $html = '
    <h2 style="text-align: center;">Laporan Data Peminjam</h2>
    <table border="1" width="100%" cellpadding="5" cellspacing="0">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th>No</th>
                <th>Judul Buku</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>';

        $no = 1;
        foreach ($dataPeminjaman as $data) {
            $html .= '
            <tr>
                <td>' . $no++ . '</td>
                <td>' . $data->judul . '</td>
                <td>' . $data->nama_lengkap . '</td>
                <td>' . $data->tanggal_peminjaman . '</td>
                <td>' . $data->tanggal_pengembalian . '</td>
                <td>' . $data->status . '</td>
            </tr>';
        }

        $html .= '</tbody></table>';

        // Generate PDF
        $mpdf->WriteHTML($html);
        $mpdf->Output('Data_Peminjaman.pdf', 'D'); // 'D' untuk download langsung
    }

}