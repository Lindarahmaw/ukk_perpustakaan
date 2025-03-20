<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_administrator extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // Fungsi untuk menambahkan pengguna baru
    public function addUser($data)
    {
        return $this->db->insert('users', $data);
    }

    // Fungsi untuk mendapatkan semua pengguna
    public function getAllUsers()
    {
        return $this->db->get('user')->result_array();
    }

    // Fungsi untuk mendapatkan pengguna berdasarkan ID
    public function getUserById($id)
    {
        return $this->db->get_where('users', ['id_user' => $id])->row_array();
    }

    // Fungsi untuk mengupdate pengguna
    public function updateUser($id, $data)
    {
        $this->db->where('id_user', $id);
        return $this->db->update('users', $data);
    }

    // Fungsi untuk menghapus pengguna
    public function deleteUser($id)
    {
        return $this->db->delete('users', ['id_user' => $id]);
    }


    public function insert_user($data)
    {
        return $this->db->insert('user', $data);
    }

    public function getAllPeminjaman()
    {
        $this->db->select('peminjaman.*, buku.judul, peminjam.nama_lengkap');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'peminjaman.buku_id = buku.buku_id');
        $this->db->join('peminjam', 'peminjaman.peminjam_id = peminjam.peminjam_id');
        return $this->db->get()->result();
    }


}