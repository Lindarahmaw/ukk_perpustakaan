<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Middleware untuk akses peminjam
    }

    public function dashboard()
    {
        $this->load->view('index');
    }
}
