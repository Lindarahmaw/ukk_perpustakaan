<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_petugas');
        // Middleware untuk akses petugas
    }

    public function dashboard()
    {
        $data['datas'] = $this->M_petugas->getPeminjam();
        $this->load->view('dash_petugas', $data);
    }
    public function peminjaman()
    {
        $data['datas'] = $this->M_petugas->get_pinjaman();
        $this->load->view('peminjaman_petugas', $data);
    }

    // Mengupdate status peminjaman
    public function update_status($id, $status)
    {
        $this->M_petugas->update_status($id, $status);
        redirect('peminjaman_petugas');
    }
    public function buku_petugas()
    {
        $data['datas'] = $this->M_petugas->getBuku();
        $data['kategori'] = $this->M_petugas->getKategori();
        $kategori = $this->M_petugas->get_name_by_id_kategori();
        $data['datas'] = $kategori;
        $this->load->view('buku_petugas', $data);
    }
    public function insert_buku()
    {
        // $config['upload_path'] = './assets/image/';
        // $config['allowed_types'] = 'jpg|png|jpeg';
        // $config['max_size'] = 2048;
        // $config['remove_space'] = TRUE;

        // $this->load->library('upload', $config);

        // if (!$this->upload->do_upload('img')) {
        //     $data['error'] = $this->upload->display_errors();
        //     // $data['datas'] = $this->M_petugas->getProduk(); // Tambahkan ini
        //     // $data['kategori'] = $this->M_petugas->get_kategori(); // Tambahkan kategori juga
        //     // $this->load->view('dashboard/produk', $data);
        //     var_dump($data);
        // } else {
        $data = array(
            'img' => $this->input->post('img'),
            'judul' => $this->input->post('judul'),
            'penulis' => $this->input->post('penulis'),
            'penerbit' => $this->input->post('penerbit'),
            'description' => $this->input->post('description'),
            'code' => $this->input->post('code'),
            'tahun_terbit' => $this->input->post('tahun_terbit'),
            'jumlah' => $this->input->post('jumlah'),

        );
        $this->M_petugas->add_produk($data);
        // var_dump($data);
        redirect('buku_petugas', $data);
        // }
    }

    public function update_buku($buku_id = null)
    {
        $buku = $this->M_petugas->get_buku_by_id($buku_id);
        // $buku = $this->session->userdata('id_user');

        if (!$buku) {
            show_404();
        }
        // Validasi input
        // $this->form_validation->set_rules('img', 'Img', 'required');
        // $this->form_validation->set_rules('judul', 'Judul', 'required');
        // // $this->form_validation->set_rules('password', 'Password', 'required');
        // $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        // $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        // $this->form_validation->set_rules('description', 'Description', 'required');
        // $this->form_validation->set_rules('code', 'Code', 'required');
        // $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required');
        // $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

        // if ($this->form_validation->run() == FALSE) {
        //     $this->edit($buku_id);
        // } else {
        $data = [
            'img' => $this->input->post('img'),
            'judul' => $this->input->post('judul'),
            'id_kategori' => $this->input->post('id_kategori'),
            'penulis' => $this->input->post('penulis'),
            'penerbit' => $this->input->post('penerbit'),
            'description' => $this->input->post('description'),
            'code' => $this->input->post('code'),
            'tahun_terbit' => $this->input->post('tahun_terbit'),
            'jumlah' => $this->input->post('jumlah'),
        ];

        // var_dump($data);
        $update = $this->M_petugas->update_buku($buku_id, $data);

        if ($update) {
            $this->session->set_flashdata('success', 'User updated successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to update user.');
        }

        redirect('buku_petugas');
        // }
    }

    // Fungsi untuk menampilkan semua peminjaman
    public function index()
    {
        $data['datas'] = $this->Peminjaman_model->get_all_peminjaman();
        $this->load->view('your_view_file', $data); // Ganti 'your_view_file' dengan nama file view Anda
    }

    // Fungsi untuk memperbarui peminjaman
    public function update_peminjaman($peminjaman_id = null)
    {
        $status = $this->input->post('status');
        $tanggal_dikembalikan = date('Y-m-d');
        ; // Ambil tanggal pengembalian dari input

        // Ambil data peminjaman untuk mendapatkan tanggal batas pengembalian
        $peminjaman = $this->M_petugas->get_peminjaman_by_id($peminjaman_id); // Pastikan Anda memiliki fungsi ini di model
        if (!$peminjaman) {
            $this->session->set_flashdata('error', 'Data peminjaman tidak ditemukan.');
            redirect('Peminjaman'); // Ganti dengan URL yang sesuai
            return;
        }

        $tanggal_batas_pengembalian = $peminjaman->tanggal_pengembalian; // Ambil tanggal batas pengembalian dari data peminjaman
        $data = [
            'status' => $status
        ];
        // var_dump($tanggal_dikembalikan);

        // Jika status diubah menjadi 'dikembalikan'
        if ($status === 'dikembalikan') {
            // Tanggal saat ini

            // Bandingkan tanggal pengembalian dengan tanggal batas pengembalian
            if (strtotime($tanggal_dikembalikan) > strtotime($tanggal_batas_pengembalian)) {

                // Jika tanggal pengembalian melebihi batas, hitung denda
                $denda = 5000; // Denda tetap

                // Data untuk disimpan ;;; di tabel denda
                $data_denda = [
                    'peminjaman_id' => $peminjaman_id,
                    'tanggal_dikembalikan' => $tanggal_dikembalikan,
                    'nominal' => $denda,
                    'status' => 'belum_dibayar', // Status denda
                    'created_at' => date(' Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                // var_dump($data_denda);
                // die();
                // Simpan denda ke tabel denda dan periksa hasilnya
                if ($this->M_petugas->add_denda($data_denda)) {
                    $this->session->set_flashdata('success', 'Denda berhasil ditambahkan.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan denda.');
                }
            } else {
                // Jika tidak ada denda
                $denda = 0;
            }
        }

        // Update status peminjaman
        if ($this->M_petugas->update_peminjaman($peminjaman_id, $data)) {
            $this->session->set_flashdata('success', 'Data peminjaman berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data peminjaman.');
        }

        redirect('Peminjaman'); // Ganti dengan URL yang sesuai
    }



    public function delete_buku($buku_id = null)
    {
        $deleteData = $this->M_petugas->delete_buku($buku_id);
        $alert = '<script>
                    Swal.fire({
                        title: "Hapus!",
                        text: "Data anda berhasil dihapus.",
                        icon: "success"
                    });
                </script>';
        $this->session->set_flashdata('success', $alert);
        // $this->load->view('buku_petugas');
        var_dump($deleteData);
    }
    public function delete_peminjaman($peminjaman_id = null)
    {
        $deleteData = $this->M_petugas->delete_peminjaman($peminjaman_id);
        $alert = '<script>
                    Swal.fire({
                        title: "Hapus!",
                        text: "Data anda berhasil dihapus.",
                        icon: "success"
                    });
                </script>';
        $this->session->set_flashdata('success', $alert);
        redirect('produk');
        // var_dump($deleteData);
    }

    // public function kategori_buku()
    // {
    //     $data['datas'] = $this->M_petugas->getPeminjam();
    //     $this->load->view('kategori_buku', $data);
    // }

    public function kategori_buku()
    {
        $data['kategori'] = $this->db->get('kategori_buku')->result_array();
        $this->load->view('kategori_buku', $data);
    }
    public function denda_petugas()
    {

        $data['datas'] = $this->db->get('denda')->result_array();
        $data['datas'] = $this->M_petugas->get_denda_with_details();
        // var_dump($data);
        $this->load->view('denda', $data);
    }

    public function denda_update()
    {
        // Mengambil data dari form
        $peminjaman_id = $this->input->post('peminjaman_id'); // Pastikan Anda mengirimkan peminjaman_id dari form
        $status = $this->input->post('status');

        // Validasi input
        if (empty($peminjaman_id) || empty($status)) {
            $this->session->set_flashdata('error', 'Data tidak lengkap.');
            redirect('Denda'); // Ganti dengan URL yang sesuai
            return;
        }

        // Update status denda di database
        $data = [
            'status' => $status
        ];

        if ($this->M_petugas->update_denda($peminjaman_id, $data)) {
            $data['datas'] = $this->db->get('denda')->result_array();
            $data['datas'] = $this->M_petugas->get_denda_with_details();
            $this->session->set_flashdata('success', 'Status denda berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui status denda.');
        }
        $this->load->view('denda', $data);
    }


    public function denda_delete($peminjaman_id)
    {
        // Validasi peminjaman_id
        if (empty($peminjaman_id)) {
            $this->session->set_flashdata('error', 'ID peminjaman tidak valid.');
            redirect('Denda'); // Ganti dengan URL yang sesuai
            return;
        }

        // Panggil fungsi di model untuk menghapus data denda
        if ($this->M_petugas->delete_denda($peminjaman_id)) {
            $this->session->set_flashdata('success', 'Data denda berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data denda.');
        }

        $this->load->view('denda');
    }
}
