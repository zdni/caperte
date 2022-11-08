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
        $station_id = $this->input->get('station');
        $this->data['datas'] = ($station_id) ? $this->station_model->station( $station_id )->result() : [];
        $this->data['fuels'] = $this->fuel_model->fuel()->result();
        $this->data['keyword_fuels'] = $this->input->get('fuel') ? $this->input->get('fuel') : [] ;
        
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
        if( !$fuels ) return redirect( base_url() );
        
        $stations = $this->stock_model->stock( NULL, $fuels, 1)->result();
        $params = '';
        $station_ids = [];
        $ways = [];
        foreach ($stations as $station) {
            if( !in_array($station->station_id, $station_ids) ) {
                $params = $params . 'station[]=' . $station->station_id . '&';
                $station_ids[] = $station->station_id;
                $ways[] = [
                    'id' => $station->station_id,
                    'nama_spbu' => $station->nama_spbu,
                    'longi' => $station->longi, 
                    'lat' => $station->lat
                ];
            }
        }
        $params = substr($params, 0, -1);
        return redirect( base_url('dashboard/cari?' . $params . '&' . $_SERVER['QUERY_STRING']) );
    }

    public function ambil_spbu_json()
    {
        $station_id = $this->input->get('station');
        $fuel = $this->input->get('fuel');
        $stations = [];
        if( !(!$station_id && $fuel) ) $stations = $this->station_model->station( $station_id )->result();
        
        header('Content-Type: application/json');
        echo json_encode( $stations );
    }

}
