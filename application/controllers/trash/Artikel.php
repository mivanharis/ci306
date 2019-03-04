<?php 

class Artikel extends CI_Controller
{
	
	public function index($page=null)
	{
		$this->load->database();
		$this->load->helper('url');


		$heading = 'Daftar Artikel';
		$main_view = 'artikel/content';
		$per_halaman = 2;
		//Menghitung Offset
		if ($page==null) {
			$offset = 0;
		} else {
			$offset = ($page * $per_halaman) - $per_halaman;

		}

		$artikel = $this->db->limit($per_halaman,$offset)->get('artikel')->result_array();
		$jumlah = $this->db->get('artikel')->num_rows();

		//Pagination Link
		$this->load->library('pagination');
		$config['base_url'] = base_url('daftar/artikel/halaman');
		$config['uri_segment'] = 4;
		$config['total_rows'] = $jumlah;
		$config['per_page'] = $per_halaman;
		$config['use_page_numbers'] = true;
		$config['num_links'] = 4;
		$config['next_link'] = '|>>|';
		$config['prev_link'] = '|<<|';
		$config['last_link'] = 'Akhir';
		$config['first_link'] = 'Awal';
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();

		$this->load->view('template', compact('heading','artikel','main_view','jumlah','pagination','offset','page','per_halaman'));


	}

	public function show($id)
	{
		$this->load->database();

		$heading = 'Detail Artikel';
		$main_view = 'artikel/artikel';
		$artikel = $this->db->where('id',$id)->get('artikel')->row();
		$jumlah = $this->db->get('artikel')->num_rows();

		$this->load->view('template', compact('heading','artikel','main_view','jumlah'));
	}

	public function create()
	{
		$this->load->helper('url');
		$this->load->helper('form');


		$heading = 'Form Artikel';
		$main_view = 'artikel/form';

		if (!$_POST) {
			$this->load->view('template', compact('heading','main_view'));
		} else {
			$hobis = $this->input->post('hobi',true);
			foreach ($hobis as $hobi) {
				echo "$hobi <br>";
			}
			//=======================================
			// $input = $this->input->post(null,true);
			// echo '<pre>';
			// var_dump($input);
			// echo '</pre>';
			exit;

		}

		// $this->load->view('template', compact('heading','main_view'));


	}


}