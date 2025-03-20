<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_petugas extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getBuku()
    {
        $query = $this->db->get('buku');
        return $query->result_array();
    }

    public function getPeminjam()
    {
        $query = $this->db->get('peminjam');
        return $query->result_array();
    }
    public function add_produk($data)
    {
        $this->db->insert('buku', $data);
    }
    public function getKategori()
    {
        $query = $this->db->get('kategori_buku');
        return $query->result_array();
    }
    public function get_name_by_id_kategori()
    {
        $this->db->select('p.*, k.nama_kategori');
        $this->db->from('buku p');
        $this->db->join('kategori_buku k', 'p.id_kategori = k.id_kategori', 'left');
        $query = $this->db->get();

        return $query->result_array();
    }
    public function get_buku_by_id($buku_id)
    {
        $this->db->where('buku_id', $buku_id); // 'id_user' adalah nama kolom ID di tabel
        $query = $this->db->get('buku'); // 'users' adalah nama tabel
        return $query->row_array(); // Mengembalikan data sebagai array
    }
    public function update_buku($buku_id, $data)
    {
        $this->db->where('buku_id', $buku_id);
        return $this->db->update('buku', $data);
    }
    public function delete_buku($buku_id)
    {
        $this->db->where('buku_id', $buku_id);
        return $this->db->delete('buku');
    }

    public function get_pinjaman()
    {
        // Select the fields you want to retrieve
        $this->db->select('peminjaman.peminjaman_id, peminjam.nama_lengkap, buku.judul, buku.img, peminjaman.tanggal_peminjaman, peminjaman.tanggal_pengembalian,peminjaman.status');

        // Join the tables
        $this->db->from('peminjaman');
        $this->db->join('peminjam', 'peminjaman.peminjam_id = peminjam.peminjam_id'); // Specify the correct column for the join
        $this->db->join('buku', 'peminjaman.buku_id = buku.buku_id'); // Ensure this is correct

        // If you want to filter by a specific peminjam, you can add a where clause
        if (!empty($peminjam)) {
            $this->db->where('peminjaman.peminjam_id', $peminjam); // Filter by peminjam_id if provided
        }

        // Execute the query
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result(); // Return the result as an array of objects
        } else {
            return []; // Return an empty array if no results found
        }
    }

    // Mengupdate status peminjaman
    public function update_status($id, $status)
    {
        $this->db->where('peminjaman_id', $id);
        return $this->db->update('peminjaman', ['status' => $status]);
    }

    // Fungsi untuk mendapatkan semua data peminjaman
    public function get_all_peminjaman()
    {
        return $this->db->get('peminjaman')->result();
    }

    // Fungsi untuk memperbarui status peminjaman
    public function update_peminjaman($peminjaman_id, $data)
    {
        $this->db->where('peminjaman_id', $peminjaman_id);
        return $this->db->update('peminjaman', $data);
    }

    // Fungsi untuk mendapatkan peminjaman berdasarkan ID
    public function get_peminjaman_by_id($peminjaman_id)
    {
        return $this->db->get_where('peminjaman', ['peminjaman_id' => $peminjaman_id])->row();
    }

    public function delete_peminjaman($peminjaman_id)
    {
        $this->db->where('peminjaman_id', $peminjaman_id);
        return $this->db->delete('peminjaman');
    }

    public function get_all_kategori()
    {
        return $this->db->get('kategori_buku')->result_array(); // Pastikan nama tabel benar
    }

    public function getDendaWithTanggalPengembalian()
    {
        $this->db->select('denda.*, peminjaman.tanggal_pengembalian');
        $this->db->from('denda');
        $this->db->join('peminjaman', 'denda.peminjaman_id = peminjaman.peminjaman_id', 'left'); // LEFT JOIN agar tidak error jika tidak ada data
        return $this->db->get()->result();
    }

    // Fungsi untuk menambahkan denda
    public function add_denda($data_denda)
    {
        return $this->db->insert('denda', $data_denda);
    }

    // Fungsi untuk mendapatkan peminjam berdasarkan nama
    public function get_peminjam_by_id($peminjam_id)
    {
        return $this->db->get_where('peminjam', ['peminjam_id' => $peminjam_id])->row();
    }

    // Fungsi untuk mendapatkan buku berdasarkan ID
    public function get_denda_with_details()
    {
        $this->db->select('denda.*, peminjam.nama_lengkap, buku.judul');
        $this->db->from('denda');
        $this->db->join('peminjaman', 'denda.peminjaman_id = peminjaman.peminjaman_id');
        $this->db->join('peminjam', 'peminjaman.peminjam_id = peminjam.peminjam_id');
        $this->db->join('buku', 'peminjaman.buku_id = buku.buku_id');

        // Ambil data denda
        return $this->db->get()->result_array();
    }

    public function update_denda($peminjaman_id, $data)
    {
        $this->db->where('peminjaman_id', $peminjaman_id);
        return $this->db->update('denda', $data);
    }

    public function delete_denda($peminjaman_id)
    {
        $this->db->where('peminjaman_id', $peminjaman_id);
        return $this->db->delete('denda');
    }

}