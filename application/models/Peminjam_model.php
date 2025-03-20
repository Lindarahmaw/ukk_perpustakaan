<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjam_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getPeminjam()
    {
        $query = $this->db->get('peminjam');
        return $query->result_array();
    }
}


