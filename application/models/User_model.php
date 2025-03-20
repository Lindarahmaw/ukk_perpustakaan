<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function login($email, $password)
    {
        // Query login user
    }

    public function register($data)
    {
        // Proses registrasi
    }

    public function get_user_by_email($email)
    {
        return $this->db->get_where('peminjam', ['email' => $email])->row(); // Ganti 'peminjam' dengan nama tabel Anda
    }

    // Fungsi untuk menyimpan user baru
    public function insert_user($data)
    {
        return $this->db->insert('peminjam', $data); // Ganti 'users' dengan nama tabel Anda
    }

    public function query_validasi_nama($email)
    {
        return $this->db->get_where('user', ['email' => $email]);
    }
}


