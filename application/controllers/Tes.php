<?php
    class Tes extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->library('form_validation');
            $this->load->model('Tes_model','tes',true);
        }

        public function create()
        {
            if (!$this->tes->validate()){
                $this->load->view('tes/form');
                return;
            }
            $input = (object) $this->input->post();
            $this->cetak($input);
        }

        public function cetak($data){
            echo "<p>Nama : <strong>$data->nama</strong></p>";
            echo "<p>Kelas : <strong>$data->kelas</strong></p>";
            echo "<p>Jenis Kelamin : <strong>$data->jenis_kelamin</strong></p>";
            echo "<p>Hobi : </p>";
            echo "<ul>";
            foreach ($data->hobi as $hobi){
                echo "<li>$hobi</li>";
            }
            echo "</ul>";
            exit;
        }
    }