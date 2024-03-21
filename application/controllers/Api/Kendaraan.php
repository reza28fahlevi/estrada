<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Kendaraan extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('KendaraanModel');
    }

    public function data_get()
    {
        $id = $this->get( 'kendaraan_id' );
        
        if ( $id === null )
        {
            
            $data = $this->KendaraanModel->get_data(TRUE);
            if ( $data )
            {
                // Set the response and exit
                $this->response( $data, 200 );
            }
            else
            {
                // Set the response and exit
                $this->response( [
                    'status' => false,
                    'message' => 'No data were found'
                ], 404 );
            }
        }
        else
        {
            $data = $this->KendaraanModel->get_data(FALSE,$id);
            if ( $data )
            {
                $this->response( $data, 200 );
            }
            else
            {
                $this->response( [
                    'status' => false,
                    'message' => 'No data user found'
                ], 404 );
            }
        }
    }
    
    public function data_post()
    {
        // $id = $this->post( 'kendaraan_id' );
        $data = [
            "jenis_kendaraan" => $this->post( 'jenis_kendaraan' )
        ];
        
        if ( $data !== null )
        {
            
            $insert = $this->KendaraanModel->insert_data($data);
            if ( $insert )
            {
                // Set the response and exit
                $this->response( $insert, 200 );
            }
            else
            {
                // Set the response and exit
                $this->response( [
                    'status' => false,
                    'message' => 'No data were found'
                ], 404 );
            }
        }
        else
        {
            $this->response( [
                'status' => false,
                'message' => 'No data found'
            ], 404 );
        }
    }

    public function data_put()
    {
        $id = $this->put( 'kendaraan_id' );
        $data = [
            "jenis_kendaraan" => $this->put( 'jenis_kendaraan' )
        ];
        
        if ( $id !== null )
        {
            $update = $this->KendaraanModel->update_data($data,$id);
            if ( $update )
            {
                // Set the response and exit
                $this->response( $update, 200 );
            }
            else
            {
                // Set the response and exit
                $this->response( [
                    'status' => false,
                    'message' => 'No data were found'
                ], 404 );
            }
        }
        else
        {
            $this->response( [
                'status' => false,
                'message' => 'No such data found'
            ], 404 );
        }
    }
    
    public function data_delete()
    {
        $id = $this->delete( 'kendaraan_id' );
        
        if ( $id !== null )
        {
            
            $data = $this->KendaraanModel->delete_data($id);
            if ( $data )
            {
                // Set the response and exit
                $this->response( $data, 200 );
            }
            else
            {
                // Set the response and exit
                $this->response( [
                    'status' => false,
                    'message' => 'No data were found'
                ], 404 );
            }
        }
        else
        {
            $this->response( [
                'status' => false,
                'message' => 'No such data found'
            ], 404 );
        }
    }
}