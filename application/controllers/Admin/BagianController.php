<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BagianController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in' !== TRUE)) {
            redirect('/');
        }
    }

    public function index()
    {
        if ($this->session->userdata('role') === '1') {
            $data = array(
                'title' => "Data Bagian"
            );
            $data['bagian']         = $this->db->query("SELECT * FROM bagian")->result();
            $this->load->view('pages/Admin/bagian/index.php', $data);
        } else {
            redirect('/');
        }
    }

    public function create()
    {
        if ($this->session->userdata('role') === '1') {
            $data = array(
                'title' => "Data Bagian"
            );

            $data['bagian']         = $this->db->query("SELECT * FROM bagian")->result();
            $this->load->view('pages/Admin/bagian/add', $data);
        } else {
            redirect('/');
        }
    }

    public function store()
    {
        $nama                       = $this->input->post('nama');

        $data = array(
            'nama_bagian'           => $nama,
        );
        $this->db->insert('bagian', $data);
        redirect('admin/bagian');
    }

    public function edit($id)
    {
        if ($this->session->userdata('role') === '1') {
            $data = array(
                'title' => "Data Bagian"
            );
            $where = array('id_bagian' => $id);
            $data['bagian']         = $this->db->query("SELECT * FROM bagian WHERE id_bagian = $id")->result();
            $this->load->view('pages/Admin/bagian/edit', $data);
        } else {
            redirect('/');
        }
    }

    public function update()
    {
        $id                         = $this->input->post('id');
        $nama                       = $this->input->post('nama');

        $data = array(
            'nama_bagian'            => $nama,
        );

        $where = array('id_bagian' => $id);
        $this->db->update('bagian', $data, $where);
        redirect('admin/bagian');
    }

    public function delete($id)
    {
        $where = array('id_bagian' => $id);
        $this->db->delete('bagian', $where);
        redirect('admin/bagian');
    }
}
