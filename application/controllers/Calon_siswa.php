<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Calon_siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Calon_siswa_model');
        $this->load->model('Nilai_model');
        $this->load->model('Pendaftaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'calon_siswa?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'calon_siswa?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'calon_siswa';
            $config['first_url'] = base_url() . 'calon_siswa';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Calon_siswa_model->total_rows($q);
        $calon_siswa = $this->Calon_siswa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'calon_siswa_data' => $calon_siswa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Calon Siswa';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Calon Siswa' => '',
        ];

        $data['page'] = 'calon_siswa/calon_siswa_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id)
    {
        $row = $this->Calon_siswa_model->get_by_id($id);
        $pendaftaran = $this->db->query("select status_validasi_berkas, status_pembayaran, bukti_pembayaran from pendaftaran where id_siswabaru = $row->id_siswabaru")->row();
        if ($row) {
            $data = array(
                'id_siswabaru' => $row->id_siswabaru,
                'status_validasi_berkas' => $pendaftaran->status_validasi_berkas,
                'status_pembayaran' => $pendaftaran->status_pembayaran,
                'bukti_pembayaran' => $pendaftaran->bukti_pembayaran,
                'id_user' => $row->id_user,
                'nama_siswa' => $row->nama_siswa,
                'tempat_lahir' => $row->tempat_lahir,
                'tanggal' => $row->tanggal,
                'bulan' => $row->bulan,
                'tahun' => $row->tahun,
                'jenis_kelamin' => $row->jenis_kelamin,
                'agama' => $row->agama,
                'alamat_lengkap' => $row->alamat_lengkap,
                'kode_pos' => $row->kode_pos,
                'asal_sekolah' => $row->asal_sekolah,
                'alamat_sekolah' => $row->alamat_sekolah,
                'tahun_lulus' => $row->tahun_lulus,
                'no_ijazah' => $row->no_ijazah,
                'nisn' => $row->nisn,
                'no_telp' => $row->no_telp,
                'email' => $row->email,
                'nilai_unmatematika' => $row->nilai_unmatematika,
                'nilai_unbinggris' => $row->nilai_unbinggris,
                'nilai_unbindonesia' => $row->nilai_unbindonesia,
                'upload_kk' => $row->upload_kk,
                'upload_aktekelahiran' => $row->upload_aktekelahiran,
                'upload_skl' => $row->upload_skl,
            );
            $data['title'] = 'Kelola Pendaftaran';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'calon_siswa/calon_siswa_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('calon_siswa'));
        }
    }

    public function create()
    {
        $id_user = $this->ion_auth->user()->row();
        $id_user = $id_user->id;
        $cek = $this->db->query("select id_user from calon_siswa where id_user = $id_user")->row();
        if ($cek) {
            redirect('calon_siswa/read/' . $id_user);
        }
        $data = array(
            'button' => 'Create',
            'action' => site_url('calon_siswa/create_action'),
            'id_siswabaru' => set_value('id_siswabaru'),
            'id_user' => set_value('id_user'),
            'nama_siswa' => set_value('nama_siswa'),
            'tempat_lahir' => set_value('tempat_lahir'),
            'tanggal' => set_value('tanggal'),
            'bulan' => set_value('bulan'),
            'tahun' => set_value('tahun'),
            'jenis_kelamin' => set_value('jenis_kelamin'),
            'agama' => set_value('agama'),
            'alamat_lengkap' => set_value('alamat_lengkap'),
            'kode_pos' => set_value('kode_pos'),
            'asal_sekolah' => set_value('asal_sekolah'),
            'alamat_sekolah' => set_value('alamat_sekolah'),
            'tahun_lulus' => set_value('tahun_lulus'),
            'no_ijazah' => set_value('no_ijazah'),
            'nisn' => set_value('nisn'),
            'no_telp' => set_value('no_telp'),
            'email' => set_value('email'),
            'nilai_unmatematika' => set_value('nilai_unmatematika'),
            'nilai_unbinggris' => set_value('nilai_unbinggris'),
            'nilai_unbindonesia' => set_value('nilai_unbindonesia'),
            'upload_kk' => set_value('upload_kk'),
            'upload_aktekelahiran' => set_value('upload_aktekelahiran'),
            'upload_skl' => set_value('upload_skl'),
        );
        $data['title'] = 'Calon Siswa';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'calon_siswa/calon_siswa_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $upload_kk = $_FILES['upload_kk'];
        if ($upload_kk == '') {
        } else {
            $config['upload_path'] = './assets/berkas/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']     = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('upload_kk')) {

                $upload_kk = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('calon_siswa/create');
            }
        }
        $upload_aktekelahiran = $_FILES['upload_aktekelahiran'];
        if ($upload_aktekelahiran == '') {
        } else {
            $config['upload_path'] = './assets/berkas/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']     = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('upload_aktekelahiran')) {

                $upload_aktekelahiran = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('calon_siswa/create');
            }
        }
        $upload_skl = $_FILES['upload_skl'];
        if ($upload_skl == '') {
        } else {
            $config['upload_path'] = './assets/berkas/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']     = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('upload_skl')) {

                $upload_skl = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('calon_siswa/create');
            }
        }
        $bukti_pembayaran = $_FILES['bukti_pembayaran'];
        if ($bukti_pembayaran == '') {
        } else {
            $config['upload_path'] = './assets/berkas/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']     = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('bukti_pembayaran')) {

                $bukti_pembayaran = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('calon_siswa/create');
            }
        }

        $id_user = $this->ion_auth->user()->row();
        $id_user = $id_user->id;
        $data = array(
            'id_user' => $id_user,
            'nama_siswa' => $this->input->post('nama_siswa', TRUE),
            'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
            'tanggal' => $this->input->post('tanggal', TRUE),
            'bulan' => $this->input->post('bulan', TRUE),
            'tahun' => $this->input->post('tahun', TRUE),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
            'agama' => $this->input->post('agama', TRUE),
            'alamat_lengkap' => $this->input->post('alamat_lengkap', TRUE),
            'kode_pos' => $this->input->post('kode_pos', TRUE),
            'asal_sekolah' => $this->input->post('asal_sekolah', TRUE),
            'alamat_sekolah' => $this->input->post('alamat_sekolah', TRUE),
            'tahun_lulus' => $this->input->post('tahun_lulus', TRUE),
            'no_ijazah' => $this->input->post('no_ijazah', TRUE),
            'id_siswabaru' => $this->input->post('nisn', TRUE),
            'nisn' => $this->input->post('nisn', TRUE),
            'no_telp' => $this->input->post('no_telp', TRUE),
            'email' => $this->input->post('email', TRUE),
            'nilai_unmatematika' => $this->input->post('nilai_unmatematika', TRUE),
            'nilai_unbinggris' => $this->input->post('nilai_unbinggris', TRUE),
            'nilai_unbindonesia' => $this->input->post('nilai_unbindonesia', TRUE),
            'upload_kk' => $upload_kk,
            'upload_aktekelahiran' => $upload_aktekelahiran,
            'upload_skl' => $upload_skl,
        );
        $this->Calon_siswa_model->insert($data);
        $id_siswa = $this->input->post('nisn', TRUE);
        $data = array(
            'status_pembayaran' => 'Lunas',
            'id_siswabaru' => $id_siswa,
            'bukti_pembayaran' => $bukti_pembayaran,
        );

        $this->Pendaftaran_model->insert($data);

        $data = array(
            'nilai_unmatematika' => $this->input->post('nilai_unmatematika', TRUE),
            'nilai_unbinggris' => $this->input->post('nilai_unbinggris', TRUE),
            'nilai_unbindonesia' => $this->input->post('nilai_unbindonesia', TRUE),
            'id_calonsiswa' => $id_siswa,
        );

        $this->Nilai_model->insert($data);
        $this->session->set_flashdata('success', 'Create Record Success');
        redirect(site_url('calon_siswa/read/' . $id_user));
    }

    public function update($id)
    {
        $row = $this->Calon_siswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('calon_siswa/update_action'),
                'id_siswabaru' => set_value('id_siswabaru', $row->id_siswabaru),
                'id_user' => set_value('id_user', $row->id_user),
                'nama_siswa' => set_value('nama_siswa', $row->nama_siswa),
                'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'bulan' => set_value('bulan', $row->bulan),
                'tahun' => set_value('tahun', $row->tahun),
                'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
                'agama' => set_value('agama', $row->agama),
                'alamat_lengkap' => set_value('alamat_lengkap', $row->alamat_lengkap),
                'kode_pos' => set_value('kode_pos', $row->kode_pos),
                'asal_sekolah' => set_value('asal_sekolah', $row->asal_sekolah),
                'alamat_sekolah' => set_value('alamat_sekolah', $row->alamat_sekolah),
                'tahun_lulus' => set_value('tahun_lulus', $row->tahun_lulus),
                'no_ijazah' => set_value('no_ijazah', $row->no_ijazah),
                'nisn' => set_value('nisn', $row->nisn),
                'no_telp' => set_value('no_telp', $row->no_telp),
                'email' => set_value('email', $row->email),
                'nilai_unmatematika' => set_value('nilai_unmatematika', $row->nilai_unmatematika),
                'nilai_unbinggris' => set_value('nilai_unbinggris', $row->nilai_unbinggris),
                'nilai_unbindonesia' => set_value('nilai_unbindonesia', $row->nilai_unbindonesia),
                'upload_kk' => set_value('upload_kk', $row->upload_kk),
                'upload_aktekelahiran' => set_value('upload_aktekelahiran', $row->upload_aktekelahiran),
                'upload_skl' => set_value('upload_skl', $row->upload_skl),
            );
            $data['title'] = 'Calon Siswa';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'calon_siswa/calon_siswa_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('calon_siswa'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_siswabaru', TRUE));
        } else {
            $data = array(
                'id_user' => $this->input->post('id_user', TRUE),
                'nama_siswa' => $this->input->post('nama_siswa', TRUE),
                'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
                'tanggal' => $this->input->post('tanggal', TRUE),
                'bulan' => $this->input->post('bulan', TRUE),
                'tahun' => $this->input->post('tahun', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'agama' => $this->input->post('agama', TRUE),
                'alamat_lengkap' => $this->input->post('alamat_lengkap', TRUE),
                'kode_pos' => $this->input->post('kode_pos', TRUE),
                'asal_sekolah' => $this->input->post('asal_sekolah', TRUE),
                'alamat_sekolah' => $this->input->post('alamat_sekolah', TRUE),
                'tahun_lulus' => $this->input->post('tahun_lulus', TRUE),
                'no_ijazah' => $this->input->post('no_ijazah', TRUE),
                'nisn' => $this->input->post('nisn', TRUE),
                'no_telp' => $this->input->post('no_telp', TRUE),
                'email' => $this->input->post('email', TRUE),
                'nilai_unmatematika' => $this->input->post('nilai_unmatematika', TRUE),
                'nilai_unbinggris' => $this->input->post('nilai_unbinggris', TRUE),
                'nilai_unbindonesia' => $this->input->post('nilai_unbindonesia', TRUE),
                'upload_kk' => $this->input->post('upload_kk', TRUE),
                'upload_aktekelahiran' => $this->input->post('upload_aktekelahiran', TRUE),
                'upload_skl' => $this->input->post('upload_skl', TRUE),
            );

            $this->Calon_siswa_model->update($this->input->post('id_siswabaru', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('calon_siswa'));
        }
    }

    public function delete($id)
    {
        $row = $this->Calon_siswa_model->get_by_id($id);

        if ($row) {
            $this->Calon_siswa_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('calon_siswa'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('calon_siswa'));
        }
    }

    public function deletebulk()
    {
        $delete = $this->Calon_siswa_model->deletebulk();
        if ($delete) {
            $this->session->set_flashdata('success', 'Delete Record Success');
        } else {
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_user', 'id user', 'trim|required');
        $this->form_validation->set_rules('nama_siswa', 'nama siswa', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('bulan', 'bulan', 'trim|required');
        $this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
        $this->form_validation->set_rules('agama', 'agama', 'trim|required');
        $this->form_validation->set_rules('alamat_lengkap', 'alamat lengkap', 'trim|required');
        $this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|required');
        $this->form_validation->set_rules('asal_sekolah', 'asal sekolah', 'trim|required');
        $this->form_validation->set_rules('alamat_sekolah', 'alamat sekolah', 'trim|required');
        $this->form_validation->set_rules('tahun_lulus', 'tahun lulus', 'trim|required');
        $this->form_validation->set_rules('no_ijazah', 'no ijazah', 'trim|required');
        $this->form_validation->set_rules('nisn', 'nisn', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('nilai_unmatematika', 'nilai unmatematika', 'trim|required');
        $this->form_validation->set_rules('nilai_unbinggris', 'nilai unbinggris', 'trim|required');
        $this->form_validation->set_rules('nilai_unbindonesia', 'nilai unbindonesia', 'trim|required');
        $this->form_validation->set_rules('upload_kk', 'upload kk', 'trim|required');
        $this->form_validation->set_rules('upload_aktekelahiran', 'upload aktekelahiran', 'trim|required');
        $this->form_validation->set_rules('upload_skl', 'upload skl', 'trim|required');

        $this->form_validation->set_rules('id_siswabaru', 'id_siswabaru', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    public function print()
    {
        $data = array(
            'calon_siswa_data' => $this->Calon_siswa_model->get_all(),
            'start' => 0
        );
        $this->load->view('calon_siswa/print', $data);
    }
    public function edit()
    {
        $id_user = $this->ion_auth->user()->row();
        $id_user = $id_user->id;
        $row = $this->Calon_siswa_model->get_by_id($id_user);
        $pendaftaran = $this->db->query("select status_validasi_berkas, status_pembayaran, bukti_pembayaran from pendaftaran where id_siswabaru = $row->id_siswabaru")->row();
        if ($row) {
            $data = array(
                'action' => 'calon_siswa/edit_action',
                'id_siswabaru' => $row->id_siswabaru,
                'status_validasi_berkas' => $pendaftaran->status_validasi_berkas,
                'status_pembayaran' => $pendaftaran->status_pembayaran,
                'bukti_pembayaran' => $pendaftaran->bukti_pembayaran,
                'id_user' => $row->id_user,
                'nama_siswa' => $row->nama_siswa,
                'tempat_lahir' => $row->tempat_lahir,
                'tanggal' => $row->tanggal,
                'bulan' => $row->bulan,
                'tahun' => $row->tahun,
                'jenis_kelamin' => $row->jenis_kelamin,
                'agama' => $row->agama,
                'alamat_lengkap' => $row->alamat_lengkap,
                'kode_pos' => $row->kode_pos,
                'asal_sekolah' => $row->asal_sekolah,
                'alamat_sekolah' => $row->alamat_sekolah,
                'tahun_lulus' => $row->tahun_lulus,
                'no_ijazah' => $row->no_ijazah,
                'nisn' => $row->nisn,
                'no_telp' => $row->no_telp,
                'email' => $row->email,
                'nilai_unmatematika' => $row->nilai_unmatematika,
                'nilai_unbinggris' => $row->nilai_unbinggris,
                'nilai_unbindonesia' => $row->nilai_unbindonesia,
                'upload_kk' => $row->upload_kk,
                'upload_aktekelahiran' => $row->upload_aktekelahiran,
                'upload_skl' => $row->upload_skl,
            );
            $data['title'] = 'Kelola Pendaftaran';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Dashboard' => '',
            ];

            $data['page'] = 'calon_siswa/calon_siswa_edit';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('calon_siswa'));
        }
    }
    public function edit_action()
    {
        $upload_kk = $_FILES['upload_kk'];
        // var_dump($upload_kk['name']);
        // exit;
        if ($upload_kk['name'] == '') {
            $upload_kk = $this->input->post('supload_kk');
        } else {
            $config['upload_path'] = './assets/berkas/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']     = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('upload_kk')) {
                $old_image = $this->input->post('supload_kk');;
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/berkas/' . $old_image);
                }
                $upload_kk = $this->upload->data('file_name');
                // $this->db->set('upload_kk', $upload_kk);
            } else {
                $upload_kk = $this->input->post('supload_kk');
            }
        }
        $upload_aktekelahiran = $_FILES['upload_aktekelahiran'];
        if ($upload_aktekelahiran['name'] == '') {
            $upload_aktekelahiran = $this->input->post('supload_aktekelahiran');
        } else {
            $config['upload_path'] = './assets/berkas/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']     = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('upload_aktekelahiran')) {

                $old_image = $this->input->post('supload_aktekelahiran');
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/berkas/' . $old_image);
                }
                $upload_aktekelahiran = $this->upload->data('file_name');
            }
            // $this->db->set('upload_aktekelahiran', $upload_aktekelahiran);
            else {
                $upload_aktekelahiran = $this->input->post('supload_aktekelahiran');
            }
        }
        $upload_skl = $_FILES['upload_skl'];
        if ($upload_skl['name'] == '') {
            $upload_skl = $this->input->post('supload_skl');
        } else {
            $config['upload_path'] = './assets/berkas/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']     = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('upload_skl')) {

                $old_image = $this->input->post('supload_skl');
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/berkas/' . $old_image);
                }
                $upload_skl = $this->upload->data('file_name');
                // $this->db->set('upload_skl', $upload_skl);
            } else {
                $upload_skl = $this->input->post('supload_skl');
            }
        }
        $bukti_pembayaran = $_FILES['bukti_pembayaran'];
        if ($bukti_pembayaran['name'] == '') {
            $bukti_pembayaran = $this->input->post('sbukti_pembayaran');
        } else {
            $config['upload_path'] = './assets/berkas/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']     = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('bukti_pembayaran')) {

                $old_image = $this->input->post('sbukti_pembayaran');
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/berkas/' . $old_image);
                }
                $bukti_pembayaran = $this->upload->data('file_name');
                // $this->db->set('bukti_pembayaran', $bukti_pembayaran);
            } else {
                $bukti_pembayaran = $this->input->post('sbukti_pembayaran');
            }
        }

        $id_user = $this->ion_auth->user()->row();
        $id_user = $id_user->id;
        $data = array(
            // 'id_user' => $id_user, 
            'nama_siswa' => $this->input->post('nama_siswa', TRUE),
            'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
            'tanggal' => $this->input->post('tanggal', TRUE),
            'bulan' => $this->input->post('bulan', TRUE),
            'tahun' => $this->input->post('tahun', TRUE),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
            'agama' => $this->input->post('agama', TRUE),
            'alamat_lengkap' => $this->input->post('alamat_lengkap', TRUE),
            'kode_pos' => $this->input->post('kode_pos', TRUE),
            'asal_sekolah' => $this->input->post('asal_sekolah', TRUE),
            'alamat_sekolah' => $this->input->post('alamat_sekolah', TRUE),
            'tahun_lulus' => $this->input->post('tahun_lulus', TRUE),
            'no_ijazah' => $this->input->post('no_ijazah', TRUE),
            'id_siswabaru' => $this->input->post('nisn', TRUE),
            'nisn' => $this->input->post('nisn', TRUE),
            'no_telp' => $this->input->post('no_telp', TRUE),
            'email' => $this->input->post('email', TRUE),
            'nilai_unmatematika' => $this->input->post('nilai_unmatematika', TRUE),
            'nilai_unbinggris' => $this->input->post('nilai_unbinggris', TRUE),
            'nilai_unbindonesia' => $this->input->post('nilai_unbindonesia', TRUE),
            'upload_kk' => $upload_kk,
            'upload_aktekelahiran' => $upload_aktekelahiran,
            'upload_skl' => $upload_skl,
        );
        $this->Calon_siswa_model->update($this->input->post('id_siswabaru'), $data);
        $id_siswa = $this->input->post('nisn', TRUE);
        $data = array(
            'status_pembayaran' => 'Lunas',
            'id_siswabaru' => $id_siswa,
            'bukti_pembayaran' => $bukti_pembayaran,
        );

        $this->Pendaftaran_model->update($this->input->post('id_siswabaru'), $data);

        $data = array(
            'nilai_unmatematika' => $this->input->post('nilai_unmatematika', TRUE),
            'nilai_unbinggris' => $this->input->post('nilai_unbinggris', TRUE),
            'nilai_unbindonesia' => $this->input->post('nilai_unbindonesia', TRUE),
            'id_calonsiswa' => $id_siswa,
        );

        $this->Nilai_model->update($this->input->post('id_siswabaru'), $data);
        $this->session->set_flashdata('success', 'Create Record Success');
        redirect(site_url('calon_siswa/read/' . $id_user));
    }
}

/* End of file Calon_siswa.php */
/* Location: ./application/controllers/Calon_siswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-13 18:30:07 */
/* http://harviacode.com */