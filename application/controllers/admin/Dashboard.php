<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends User_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'fuel_model',
            'station_model',
            'stock_model',
            'users_model',
        ]);
        $this->db->query(
            'SET SESSION sql_mode =
            REPLACE(REPLACE(REPLACE(
            @@sql_mode,
            "ONLY_FULL_GROUP_BY,", ""),
            ",ONLY_FULL_GROUP_BY", ""),
            "ONLY_FULL_GROUP_BY", "")'
        );
	}

	public function index()
    {
        $user_id = $this->session->userdata('user_id');

        $this->data['fuel'] = count( $this->fuel_model->fuel()->result() );
        $this->data['station'] = count( $this->station_model->station()->result() );
        $this->data['users'] = count( $this->users_model->users()->result() );
        
        $station = $this->station_model->station_by_user_id( $user_id )->row();
        $this->data['station'] = $station;
        if( $station ) {
            $this->data['stocks'] = $this->stock_model->stock( $station->id )->result();
            $this->data['status'] = ['Habis', 'Tersedia'];
        }
        
        $this->data['page'] = 'Beranda';
        $this->render('admin/dashboard');
    }
}
