<?php 
	class Artikel extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Artikel_model','artikel',true);
			$this->load->helper(['url','form']);
		}

		public function index($page=null)
		{
		// $this->load->model('Artikel_model','artikel',true);
		$artikels = $this->artikel->paginate($page, 2);
		$jumlah = $this->artikel->countAll();
		$pagination = $this->artikel->createPagination('artikel',$jumlah, 2);

		$main_view = 'artikel/index';
		$this->load->view('template', compact('main_view','artikels','jumlah','pagination'));
		}

		public function show($id = null)
		{
			if ($id == null) redirect('artikel');
			$artikel = $this->artikel->get($id);
			if (!$artikel) redirect('artikel');
			$main_view = 'artikel/show';
			$this->load->view('template',compact('main_view','artikel'));
		}

		public function create()
		{
			if (!$_POST) {
				$input = (object) $this->artikel->getDefaultValues();
				// $main_view = 'artikel/form';
				// $form_action = 'artikel/create';
				// $this->load->view('template',compact('main_view','form_action','input'));
			} else {
				$input = (object) $this->input->post();
				// $this->artikel->insert($input);
				// redirect('artikel');
			}

			if (!$this->artikel->validate()) {
				$main_view = 'artikel/form';
				$form_action = 'artikel/create';
				$this->load->view('template',compact('main_view','form_action','input'));
				return;
			}
				$this->artikel->insert($input);
				redirect('artikel');
		}

		public function edit($id = null)
		{
			$artikel = $this->artikel->get($id);
			if (!$artikel) {
				redirect('artikel');
			}
			if (!$_POST) {
				$input = (object) $artikel;
				// $main_view = 'artikel/form';
				// $form_action = "artikel/edit/$id";
				// $this->load->view('template',compact('main_view','form_action','input'));
			} else {
				$input = (object) $this->input->post();
				// $this->artikel->update($id,$input);
				// redirect('artikel');
			}
			if (!$this->artikel->validate()) {
				$main_view = 'artikel/form';
				$form_action = "artikel/edit/$id";
				$this->load->view('template',compact('main_view','form_action','input'));
				return;
			}
			$this->artikel->update($id,$input);
			redirect('artikel');
		}

		public function delete()
		{
			$id 		= $this->input->post('id'); 
			$artikel 	= $this->artikel->get($id);

			if (!$artikel) {
					redirect('artikel');
				}

			$this->artikel->delete($id);
			redirect('artikel');
		}

		public function isFormatTanggalValid($str)
		{
			if (!preg_match('/([0-9]{4})-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])/',$str)) {
				$this->form_validation->set_message('isFormatTanggalValid','Format Tanggal Tidak Valid. (YYYY-MM-DD)');
			return false;
			};
			return true;
		}
		

	}