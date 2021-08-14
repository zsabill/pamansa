<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Pendaftaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pendaftaran?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pendaftaran?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pendaftaran';
            $config['first_url'] = base_url() . 'pendaftaran';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pendaftaran_model->total_rows($q);
        $pendaftaran = $this->Pendaftaran_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pendaftaran_data' => $pendaftaran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Pendaftaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Pendaftaran' => '',
        ];

        $data['page'] = 'pendaftaran/pendaftaran_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Pendaftaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pendaftaran' => $row->id_pendaftaran,
		'status_pembayaran' => $row->status_pembayaran,
		'id_siswabaru' => $row->id_siswabaru,
	    );
        $data['title'] = 'Pendaftaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pendaftaran/pendaftaran_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('pendaftaran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pendaftaran/create_action'),
	    'id_pendaftaran' => set_value('id_pendaftaran'),
	    'status_pembayaran' => set_value('status_pembayaran'),
	    'id_siswabaru' => set_value('id_siswabaru'),
	);
        $data['title'] = 'Pendaftaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pendaftaran/pendaftaran_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'status_pembayaran' => $this->input->post('status_pembayaran',TRUE),
		'id_siswabaru' => $this->input->post('id_siswabaru',TRUE),
	    );

            $this->Pendaftaran_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('pendaftaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pendaftaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pendaftaran/update_action'),
		'id_pendaftaran' => set_value('id_pendaftaran', $row->id_pendaftaran),
		'status_pembayaran' => set_value('status_pembayaran', $row->status_pembayaran),
		'id_siswabaru' => set_value('id_siswabaru', $row->id_siswabaru),
	    );
            $data['title'] = 'Pendaftaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pendaftaran/pendaftaran_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('pendaftaran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pendaftaran', TRUE));
        } else {
            $data = array(
		'status_pembayaran' => $this->input->post('status_pembayaran',TRUE),
		'id_siswabaru' => $this->input->post('id_siswabaru',TRUE),
	    );

            $this->Pendaftaran_model->update($this->input->post('id_pendaftaran', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('pendaftaran'));
        }
    }
    public function terima($id, $user) 
    {
        
            $data = array(
		'status_validasi_berkas' => 'Berkas Diterima',
		
	    );

            $this->Pendaftaran_model->update ($id, $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('calon_siswa/read/'. $user));
        
    }
    public function tolak($id, $user) 
    {
      
        
            $data = array(
		'status_validasi_berkas' => 'Berkas Ditolak',
		
	    );

            $this->Pendaftaran_model->update ($id, $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('calon_siswa/read/'. $user));
        
    }
    
    public function delete($id) 
    {
        $row = $this->Pendaftaran_model->get_by_id($id);

        if ($row) {
            $this->Pendaftaran_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('pendaftaran'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('pendaftaran'));
        }
    }

    public function deletebulk(){
        $delete = $this->Pendaftaran_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('success', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('status_pembayaran', 'status pembayaran', 'trim|required');
	$this->form_validation->set_rules('id_siswabaru', 'id siswabaru', 'trim|required');

	$this->form_validation->set_rules('id_pendaftaran', 'id_pendaftaran', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pendaftaran.php */
/* Location: ./application/controllers/Pendaftaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-13 18:30:27 */
/* http://harviacode.com */