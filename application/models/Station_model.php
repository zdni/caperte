<?php

class Station_model extends CI_Model {
    private $_table = 'station';

    public function tambah( $data = NULL )
    {
        if ( $data ) {
            $this->db->insert( $this->_table, $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
        return false;
    }

    public function ubah( $id = NULL, $data = NULL )
    {
        if ( $id && $data ) {
            $this->db->where( $this->_table . '.id', $id );
            return $this->db->update( $this->_table, $data );
        }
        return false;
    }

    public function hapus( $id = NULL )
    {
        if ( $id ) {
            // hapus foreign key
            $this->db->where( 'stock.station_id', $id );
            $delete = $this->db->delete( 'stock' );

            if( $delete ) {
                $this->db->where( $this->_table . '.id', $id );
                return $this->db->delete( $this->_table );
            }
        }
        return false;
    }

    public function station( $id = NULL )
    {
        $this->db->select( $this->_table . '.*' );
        $this->db->select( 'users.name AS uadmin_name' );
        if( $id ) $this->db->where( $this->_table . '.id', $id);
        $this->db->join(
            'users',
            'users.id = station.user_id',
            'left'
        );
        return $this->db->get( $this->_table );
    }

    public function station_by_user_id( $user_id = NULL ) 
    {
        if( $user_id ) $this->db->where( $this->_table . '.user_id', $user_id);
        return $this->station();
    }
}

?>