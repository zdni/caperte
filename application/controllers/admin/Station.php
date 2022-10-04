<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Station extends Uadmin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'fuel_model',
            'station_model',
            'stock_model',
            'users_model',
        ]);
		$this->load->library('upload');
        $this->data['menu_id'] = 'station_index';
	}

	public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $role_name = $this->session->userdata('role_name');
        $station = $this->station_model->station_by_user_id( $user_id )->row();
        if( $station ) return redirect( base_url('admin/station/detail/') . $station->id );
        if( $role_name == 'Uadmin' ) return redirect( base_url('admin/dashboard') );

        $this->data['datas'] = $this->station_model->station()->result();
        $this->data['users'] = $this->users_model->uadmin()->result();
        $this->data['page'] = 'SPBU';
        $this->render('admin/stations');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama SPBU', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat SPBU', 'required');
        $this->form_validation->set_rules('longi', 'Kordinat Longitude', 'required');
        $this->form_validation->set_rules('lat', 'Kordinat Latitude', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Data SPBU Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $longi = $this->input->post('longi');
            $lat = $this->input->post('lat');
            $user_id = $this->input->post('user_id');

            $data['nama'] = $nama;
            $data['alamat'] = $alamat;
            $data['longi'] = $longi;
            $data['lat'] = $lat;
            $data['user_id'] = $user_id;
        
            if( $this->station_model->tambah( $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Membuat SPBU Baru!';
            } else {
                $message = 'Gagal Membuat SPBU Baru!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/station') );
    }

    public function detail( $station_id = NULL )
    {
        if( !$station_id ) return redirect( base_url('admin/station') );

        $station = $this->station_model->station( $station_id )->row();
        $this->data['station'] = $station;

        $this->data['fuels'] = $this->fuel_model->fuel()->result();
        $this->data['datas'] = $this->stock_model->stock( $station_id )->result();
        $this->data['page'] = $station->nama;
        $this->data['status'] = ['Habis', 'Tersedia'];
        $this->render('admin/station');
    }

    public function ubah()
    {
        $this->form_validation->set_rules('nama', 'Nama SPBU', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat SPBU', 'required');
        $this->form_validation->set_rules('longi', 'Kordinat Longitude', 'required');
        $this->form_validation->set_rules('lat', 'Kordinat Latitude', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data SPBU Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $longi = $this->input->post('longi');
            $lat = $this->input->post('lat');
            $user_id = $this->input->post('user_id');

            $data['nama'] = $nama;
            $data['alamat'] = $alamat;
            $data['longi'] = $longi;
            $data['lat'] = $lat;
            $data['lat'] = $lat;
            $data['user_id'] = $user_id;
        
            if( $this->station_model->ubah( $id, $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah SPBU!';
            } else {
                $message = 'Gagal Mengubah SPBU!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/station') );
    }

    public function hapus()
    {
        if( !$_POST ) return redirect( base_url('admin/station') );

        $alert = 'error';
        $message = 'Gagal Menghapus SPBU!';

        $this->form_validation->set_rules('id', 'Id SPBU', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->station_model->hapus( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus SPBU!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/station') );
    }

    public function change_image()
    {
        $url = base_url('admin/station');
        if( !$_POST ) return redirect( $url );

        $alert = 'error';
        $message = 'Gagal Mengubah Gambar SPBU!';

        $this->form_validation->set_rules('id', 'Id SPBU', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if($_FILES['image']['name']){
				$uploaded_foto = $this->upload_image( time() );
                $image = $uploaded_foto['file_name'];
				$data['image'] = $image;
			}

            if( $this->station_model->ubah( $id, $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah Gambar SPBU!';
            }
            $url = base_url('admin/station/detail/') . $id;
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( $url );        
    }

    public function upload_image( $title )
	{
		$config['upload_path']          = './uploads/station/';
		$config['overwrite']            = true;
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 2048;
		$config['file_name']			= $title;

		$this->upload->initialize($config);
		if (!$this->upload->do_upload('image')) {
			$this->session->set_flashdata('alert', 'error');   
			$this->session->set_flashdata('message', $this->upload->display_errors());   
			return redirect( base_url('admin/station') );
		} else {
			$uploaded_data = $this->upload->data();
		}
		return $uploaded_data;
	}
}
