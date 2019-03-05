<?php
    
    class Tes_model extends CI_Model
    {
        public function getValidationRules()
        {
            return [
                [
                    'field' => 'nama',
                    'label' => 'Nama',
                    'rules' => 'required'
                ],
                [
                    'field' => 'jenis_kelamin',
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required'
                ],
                [
                    'field' => 'kelas',
                    'label' => 'Kelas',
                    'rules' => 'required'
                ],
                [
                    'field' => 'hobi[]',
                    'label' => 'Hobi',
                    'rules' => 'required'
                ]
            ];
        }

        public function validate()
        {
            $this->load->library('form_validation');
            $rules = $this->getValidationRules();
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters('<p class="form-error">','</p>');
            return $this->form_validation->run();
        }
    }