<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fuel extends Admin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'fuel_model',
        ]);
        $this->data['menu_id'] = 'fuel_index';
	}

	public function index()
    {
        $this->data['datas'] = $this->fuel_model->fuel()->result();
        $this->data['page'] = 'Bahan Bakar';
        $this->render('admin/fuel');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama Bahan Bakar', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Data Bahan Bakar Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $nama = $this->input->post('nama');

            $data['nama'] = $nama;
        
            if( $this->fuel_model->tambah( $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Membuat Bahan Bakar Baru!';
            } else {
                $message = 'Gagal Membuat Bahan Bakar Baru!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/fuel') );
    }

    public function ubah()
    {
        $this->form_validation->set_rules('nama', 'Nama Bahan Bakar', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data Bahan Bakar Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');

            $data['nama'] = $nama;
        
            if( $this->fuel_model->ubah( $id, $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah Bahan Bakar!';
            } else {
                $message = 'Gagal Mengubah Bahan Bakar!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/fuel') );
    }

    public function hapus()
    {
        if( !$_POST ) return redirect( base_url('admin/fuel') );

        $alert = 'error';
        $message = 'Gagal Menghapus Bahan Bakar!';

        $this->form_validation->set_rules('id', 'Id Bahan Bakar', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->fuel_model->hapus( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Bahan Bakar!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/fuel') );
    }
}
