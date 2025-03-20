<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model yang diperlukan
        $this->load->model('User_model'); // Pastikan Anda memiliki model ini
    }

    public function login_ad()
    {
        $this->load->view('p_login');
    }
    public function loginpage()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard'); // Redirect jika sudah login
        }

        $this->load->view('login_view');
    }
    public function login_peminjam()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard'); // Redirect jika sudah login
        }

        $this->load->view('login_peminjam');
    }



    // Metode untuk login
    public function login()
    {
        // Ambil data dari form
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        // Validasi input
        if (empty($email) || empty($password)) {
            // Set pesan error dan redirect
            $this->session->set_flashdata('error', 'Email dan Password harus diisi.');
            redirect('login_peminjam'); // Ganti dengan URL yang sesuai
        }

        // Cek ke database
        $user = $this->User_model->get_user_by_email($email);

        if ($user && password_verify($password, $user->password)) {
            // Set session data
            $this->session->set_userdata('peminjam_id', $user->peminjam_id);
            $this->session->set_userdata('email', $user->email);
            redirect('dashboard'); // Ganti dengan URL yang sesuai setelah login
        } else {
            // Set pesan error dan redirect
            $this->session->set_flashdata('error', 'Email atau Password salah.');
            var_dump($email, $password);
            redirect('login_peminjam'); // Ganti dengan URL yang sesuai
        }
    }
    public function p_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $validasi_nama = $this->User_model->query_validasi_nama($email);
        if ($validasi_nama->num_rows() > 0) {
            $data = $validasi_nama->row_array(); // Ambil data user
            $hashed_password = $data['password']; // Password yang di-hash di database
            var_dump($hashed_password);

            if (password_verify($password, $hashed_password)) {
                // Jika password cocok
                $this->session->set_userdata('logged', TRUE);
                $this->session->set_userdata('user', $data); // Save entire user data
                $id = $data['id_user'];

                if ($data['role'] == 'Administrator') {
                    $this->session->set_userdata('access', 'admin');
                    $this->session->set_userdata('id_user', $id);
                    $this->session->set_userdata('email', $data['email']);
                    redirect('Administrator');
                } else if ($data['role'] == 'Petugas') {
                    $this->session->set_userdata('access', 'petugas');
                    $this->session->set_userdata('id_user', $id);
                    $this->session->set_userdata('email', $data['username']);
                    redirect('dash_petugas');
                }
            } else {
                // Jika password salah
                $alert = '<script>
                Swal.fire({
                    title: "Login Gagal",
                    text: "Password yang Anda masukkan salah.",
                    icon: "error",
                    showConfirmButton: false,
                    timer: 5000
                });
            </script>';
                $this->session->set_flashdata('success', $alert);
                redirect('Ad_Login');
            }
        } else {
            // Jika username tidak ditemukan
            $alert = '<script>
            Swal.fire({
                title: "Salah!",
                text: "Data yang Anda masukkan tidak sesuai.",
                icon: "error",
                showConfirmButton: false,
                timer: 2000
                });
                </script>';
            $this->session->set_flashdata('success', $alert);
            redirect('Ad_Login');
        }
    }

    // Metode untuk registrasi
    public function register()
    {
        // Ambil data dari form
        $data = array(
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // Hash password
            'alamat' => $this->input->post('alamat'),
            'phone' => $this->input->post('phone'),
            'image' => $this->_upload_image() // Panggil fungsi upload image
        );
        var_dump($data);
        // Validasi input
        if ($this->User_model->insert_user($data)) {
            $this->session->set_flashdata('success', 'Registrasi berhasil. Silakan login.');
            redirect('login_peminjam'); // Ganti dengan URL yang sesuai
        } else {
            $this->session->set_flashdata('error', 'Registrasi gagal. Silakan coba lagi.');
            redirect('login_peminjam'); // Ganti dengan URL yang sesuai
        }
    }

    // Fungsi untuk upload image
    private function _upload_image()
    {
        // Konfigurasi upload
        $config['upload_path'] = './assets/image'; // Pastikan folder ini ada dan writable
        $config['allowed_types'] = 'jpg|jpeg|png'; // Tipe file yang diizinkan
        $config['max_size'] = 2048; // Maksimal ukuran file 2MB

        // Memuat library upload
        $this->load->library('upload', $config);

        // Melakukan upload
        if ($this->upload->do_upload('image')) {
            // Jika berhasil, kembalikan nama file yang diupload
            return $this->upload->data('file_name');
        } else {
            // Jika gagal, kembalikan pesan error
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error); // Menyimpan pesan error ke session flashdata
            return null; // Kembalikan null jika upload gagal
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login_peminjam');
    }
    public function logout2()
    {
        $this->session->sess_destroy();
        redirect('auth/p_login');
    }

    // public function login()
    // {
    //     $this->load->view('index');
    // }

    public function buku_fiksi()
    {
        $this->load->view('buku_fiksi');
    }

    // public function process_login()
    // {
    //     // Proses login sesuai role
    // }

    // public function process_register()
    // {
    //     // Proses registrasi
    // }

    // public function logout()
    // {
    //     // Logout user
    // }

    //     public function logout()
// {
//     $this->session->sess_destroy();
//     redirect('auth/login_peminjam');
// }



}

