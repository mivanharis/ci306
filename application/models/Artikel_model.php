<?php 
	class Artikel_model extends CI_Model
	{
		public $table = 'artikel';

		public function paginate($page = null, $perPage = null)
		{
			if ($page == null) $page = 0;
			if ($perPage == null) $perPage = 10;
			$offset = $this->calculateOffset($page,$perPage);
			return $this->db->limit($perPage,$offset)
							->get($this->table)
							->result();
		}
		protected function calculateOffset($page,$perPage)
		{
			if ($page==0) {
				$offset = 0 ;
			} else {
				$offset = ($page * $perPage) - $perPage;
			}
			return $offset;
			
		}
		public function countAll()
		{
			return $this->db->get($this->table)->num_rows();
		}
		public function createPagination($baseUrl,$jumlah,$perPage = null)
		{
			$this->load->library('pagination');
			$this->load->helper('url');

			if ($perPage==null) {
				$perPage=10;
			}

			$config['base_url'] 		= site_url($baseUrl);
			$config['total_rows'] 		= $jumlah;
			$config['per_page'] 		= $perPage;
			$config['use_page_numbers'] = true;
			$config['first_link'] 		= '<<';
			$config['last_link'] 		= '>>';
			$config['next_link'] 		= '|Next|';
			$config['prev_link'] 		= '|Prev|';
			$this->pagination->initialize($config);
			return $this->pagination->create_links();
		}
		public function get($id)
		{
			return $this->db->where('id',$id)
							->get($this->table)
							->row();
		}
		public function insert($artikel)
		{
			$this->db->insert($this->table,$artikel);
			return $this->db->insert_id();
		}
		public function getDefaultValues()
		{
			return [
				'tanggal' => '',
				'judul' => '',
				'isi' => ''
			];
		}
		public function update($id,$artikel)
		{
			return $this->db->where('id',$id)
							->update($this->table, $artikel);
		}
		public function delete($id)
		{
			return $this->db->where('id',$id)
							->delete($this->table);
		}
		public function getValidationRules()
		{
			return [
				[
					'field' =>'tanggal',
					'label' =>'Tanggal Penulisan',
					'rules' =>'trim|required|callback_isFormatTanggalValid'
				],
				[
					'field' =>'judul',
					'label' =>'Judul Artikel',
					'rules' =>'trim|required|max_length[20]'
				],
				[
					'field' =>'isi',
					'label' =>'Isi Artikel',
					'rules' =>'trim|required|max_length[255]'
				]
			];
		}
		public function validate()
		{
			$this->load->library('form_validation');
			$rules = $this->getValidationRules();
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_error_delimiters('<span class="form-error">','</span>');
			return $this->form_validation->run();
		}
	}