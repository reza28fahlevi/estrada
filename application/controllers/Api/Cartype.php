<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Cartype extends RestController {

    private $table;

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('GlobalModel');
        $this->table = 'tbl_cartype';
    }

    public function data_get()
    {
        $id = $this->get( 'codetype' );
        
        $dataid = [
            "codetype" => $id
        ];
        
        if ( $id === null )
        {
            
            $data = $this->GlobalModel->get_data($this->table,$dataid,TRUE);
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
            $data = $this->GlobalModel->get_data($this->table,$dataid,FALSE);
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
        // $id = $this->post( 'codetype' );
        $data = [
            "codetype" => $this->post( 'codetype' ),
            "cartype" => $this->post( 'cartype' ),
            "kendaraan_id" => $this->post( 'kendaraan_id' ),
        ];
        
        if ( $data !== null )
        {
            
            $insert = $this->GlobalModel->insert_data($this->table,$data);
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
        $id = $this->put( 'codetype' );
        $dataid = [
            "codetype" => $id
        ];
        $data = [
            "codetype" => $this->post( 'codetype' ),
            "cartype" => $this->post( 'cartype' ),
            "kendaraan_id" => $this->post( 'kendaraan_id' ),
        ];
        
        if ( $id !== null )
        {
            $update = $this->GlobalModel->update_data($this->table,$dataid,$data);
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
        $id = $this->delete( 'codetype' );
        $dataid = [
            "codetype" => $id
        ];
        
        if ( $id !== null )
        {
            
            $data = $this->GlobalModel->delete_data($this->table,$dataid);
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