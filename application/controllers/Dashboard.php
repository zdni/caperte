<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'fuel_model',
            'station_model',
            'stock_model',
        ]);
        $this->template = 'client';
	}

	public function index()
    {
        // return redirect( base_url('auth/login') );

        $this->data['datas'] = $this->station_model->station()->result();
        $this->data['fuels'] = $this->fuel_model->fuel()->result();
        return $this->render('beranda', $this->template);
    }

    public function cari()
    {
        $this->data['datas'] = $this->station_model->station()->result();
        $this->data['fuels'] = $this->fuel_model->fuel()->result();
        
        return $this->render('cari', $this->template);
    }

    public function spbu( $station_id = NULL )
    {
        if( !$station_id ) return redirect( base_url() );

        $this->data['station'] = $this->station_model->station( $station_id )->row();
        $this->data['stocks'] = $this->stock_model->stock( $station_id )->result();
        $this->data['status'] = ['Habis', 'Tersedia'];

        return $this->render('spbu', $this->template);
    }

    public function algorithm()
    {
        $fuels = $this->input->get('fuel');
        
    }
}
