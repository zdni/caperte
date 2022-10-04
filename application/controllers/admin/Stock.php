<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends Uadmin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'station_model',
            'stock_model',
        ]);
        $this->data['menu_id'] = 'stock_index';
	}

    public function tambah()
    {
        $this->form_validation->set_rules('station_id', 'Nama SPBU', 'required');
        $this->form_validation->set_rules('fuel_id', 'Nama Bahan Bakar', 'required');
        $this->form_validation->set_rules('harga', 'Harga Bahan Bakar', 'required');
        $this->form_validation->set_rules('status', 'Status Bahan Bakar', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Data Stok Bahan Bakar Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $station_id = $this->input->post('station_id');
            $fuel_id = $this->input->post('fuel_id');
            $harga = $this->input->post('harga');
            $status = $this->input->post('status');

            $data['station_id'] = $station_id;
            $data['fuel_id'] = $fuel_id;
            $data['harga'] = $harga;
            $data['status'] = $status;
        
            if( $this->stock_model->tambah( $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Membuat Stok Bahan Bakar Baru!';
            } else {
                $message = 'Gagal Membuat Stok Bahan Bakar Baru!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/station/detail/') . $station_id );
    }

    public function ubah()
    {
        $this->form_validation->set_rules('harga', 'Harga Bahan Bakar', 'required');
        $this->form_validation->set_rules('status', 'Status Bahan Bakar', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data Stok Bahan Bakar Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $station_id = $this->input->post('station_id');

            $harga = $this->input->post('harga');
            $status = $this->input->post('status');

            $data['harga'] = $harga;
            $data['status'] = $status;
        
            if( $this->stock_model->ubah( $id, $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah Stok Bahan Bakar!';
            } else {
                $message = 'Gagal Mengubah Stok Bahan Bakar!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/station/detail/') . $station_id );
    }

    public function hapus()
    {
        if( !$_POST ) return redirect( base_url('admin/station') );

        $alert = 'error';
        $message = 'Gagal Menghapus Stok Bahan Bakar!';

        $this->form_validation->set_rules('id', 'Id Stok Bahan Bakar', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $station_id = $this->input->post('station_id');
            if( $this->stock_model->hapus( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Stok Bahan Bakar!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/station/detail/') . $station_id );
    }
}
