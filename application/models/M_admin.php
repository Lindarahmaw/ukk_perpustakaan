<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
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
    public function get_nama()
    {
        $query = $this->db->get('peminjam');
        return $query->result_array();
    }
    // public function get_pinjaman($peminjam)
    // {
    //     // Select the fields you want to retrieve
    //     $this->db->select('peminjaman.peminjaman_id, peminjam.nama_lengkap, buku.judul, buku.img, peminjaman.tanggal_peminjaman, peminjaman.tanggal_pengembalian');

    //     // Join the tables
    //     $this->db->from('peminjaman');
    //     $this->db->join('peminjam', 'peminjaman.peminjam_id = peminjam_id');
    //     $this->db->join('buku', 'peminjaman.buku_id = buku.buku_id');

    //     // Execute the query
    //     $query = $this->db->get();

    //     // Check if there are results and return them
    //     if ($query->num_rows() > 0) {
    //         return $query->result(); // Return the result as an array of objects
    //     } else {
    //         return []; // Return an empty array if no results found
    //     }
    // }

    public function get_pinjaman($peminjam)
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
    public function get_kategori()
    {
        $query = $this->db->get('kategori');
        return $query->result_array();
    }
    public function get_name_by_id_kategori()
    {
        $this->db->select('p.*, k.nama_kategori');
        $this->db->from('buku p');
        $this->db->join('kategori k', 'p.id_kategori = k.id_kategori', 'left');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function pinjam($data)
    {
        $this->db->insert('peminjaman', $data);
    }

    // Fungsi untuk memperbarui rating buku
    // Fungsi untuk memperbarui rating buku
    public function update_buku_rating($buku_id, $new_rating)
    {
        // Ambil semua ulasan untuk buku ini
        $this->db->select('rating');
        $ulasan = $this->db->get_where('ulasan', ['buku_id' => $buku_id])->result();

        // Hitung total rating dan jumlah ulasan
        $total_rating = 0;
        $jumlah_ulasan = count($ulasan);

        foreach ($ulasan as $item) {
            $total_rating += $item->rating;
        }

        // Tambahkan rating baru
        $total_rating += $new_rating;
        $jumlah_ulasan += 1; // Tambah satu untuk ulasan baru

        // Hitung rata-rata rating
        $average_rating = $total_rating / $jumlah_ulasan;

        // Update data buku dengan rata-rata rating dan jumlah ulasan
        $data = [
            'average_rating' => $average_rating,
            'jumlah_ulasan' => $jumlah_ulasan
        ];

        $this->db->where('buku_id', $buku_id);
        return $this->db->update('buku', $data);
    }


    // Fungsi untuk menambahkan ulasan
    public function add_ulasan($data)
    {
        // Memastikan data yang diterima valid
        if (isset($data['buku_id']) && isset($data['rating']) && isset($data['review_text'])) {
            return $this->db->insert('ulasan', $data);
        }
        return false; // Jika data tidak valid
    }

    // Fungsi untuk mendapatkan semua ulasan berdasarkan buku_id
    public function get_ulasan_by_buku($buku_id)
    {
        return $this->db->get_where('ulasan', ['buku_id' => $buku_id])->result();
    }

    // Fungsi untuk memperbarui ulasan
    public function update_ulasan($ulasan_id, $data)
    {
        $this->db->where('ulasan_id', $ulasan_id);
        return $this->db->update('ulasan', $data);
    }

    // Fungsi untuk menghapus ulasan
    public function delete_ulasan($ulasan_id)
    {
        $this->db->where('ulasan_id', $ulasan_id);
        return $this->db->delete('ulasan');
    }

    public function getBukuByKategori($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori); // Filter berdasarkan kategori
        return $this->db->get('buku')->result_array(); // Ambil hasil sebagai array
    }



}