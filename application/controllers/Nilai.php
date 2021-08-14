<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Nilai_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'nilai?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'nilai?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'nilai';
            $config['first_url'] = base_url() . 'nilai';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Nilai_model->total_rows($q);
        $nilai = $this->Nilai_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'nilai_data' => $nilai,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Nilai';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Nilai' => '',
        ];

        $data['page'] = 'nilai/nilai_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Nilai_model->get_by_id($id);
        if ($row) {
            $data = array(
		'nilai_unmatematika' => $row->nilai_unmatematika,
		'nilai_unbinggris' => $row->nilai_unbinggris,
		'nilai_unbindonesia' => $row->nilai_unbindonesia,
		'id_calonsiswa' => $row->id_calonsiswa,
	    );
        $data['title'] = 'Nilai';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'nilai/nilai_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('nilai'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('nilai/create_action'),
	    'nilai_unmatematika' => set_value('nilai_unmatematika'),
	    'nilai_unbinggris' => set_value('nilai_unbinggris'),
	    'nilai_unbindonesia' => set_value('nilai_unbindonesia'),
	    'id_calonsiswa' => set_value('id_calonsiswa'),
	);
        $data['title'] = 'Nilai';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'nilai/nilai_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nilai_unmatematika' => $this->input->post('nilai_unmatematika',TRUE),
		'nilai_unbinggris' => $this->input->post('nilai_unbinggris',TRUE),
		'nilai_unbindonesia' => $this->input->post('nilai_unbindonesia',TRUE),
		'id_calonsiswa' => $this->input->post('id_calonsiswa',TRUE),
	    );

            $this->Nilai_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('nilai'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Nilai_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('nilai/update_action'),
		'nilai_unmatematika' => set_value('nilai_unmatematika', $row->nilai_unmatematika),
		'nilai_unbinggris' => set_value('nilai_unbinggris', $row->nilai_unbinggris),
		'nilai_unbindonesia' => set_value('nilai_unbindonesia', $row->nilai_unbindonesia),
		'id_calonsiswa' => set_value('id_calonsiswa', $row->id_calonsiswa),
	    );
            $data['title'] = 'Nilai';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'nilai/nilai_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('nilai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'nilai_unmatematika' => $this->input->post('nilai_unmatematika',TRUE),
		'nilai_unbinggris' => $this->input->post('nilai_unbinggris',TRUE),
		'nilai_unbindonesia' => $this->input->post('nilai_unbindonesia',TRUE),
		'id_calonsiswa' => $this->input->post('id_calonsiswa',TRUE),
	    );

            $this->Nilai_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('nilai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Nilai_model->get_by_id($id);

        if ($row) {
            $this->Nilai_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('nilai'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('nilai'));
        }
    }

    public function deletebulk(){
        $delete = $this->Nilai_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('success', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('nilai_unmatematika', 'nilai unmatematika', 'trim|required');
	$this->form_validation->set_rules('nilai_unbinggris', 'nilai unbinggris', 'trim|required');
	$this->form_validation->set_rules('nilai_unbindonesia', 'nilai unbindonesia', 'trim|required');
	$this->form_validation->set_rules('id_calonsiswa', 'id calonsiswa', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Nilai.php */
/* Location: ./application/controllers/Nilai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-14 08:50:17 */
/* http://harviacode.com */