<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Traffic extends RestController {

    private $table;

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('GlobalModel');
        $this->table = 'tbl_traffic';
    }

    public function data_get()
    {
        $id = $this->get( 'channel_id' );
        $channel_name = $this->get( 'channel_name' );
        $car_type = $this->get( 'car_type' );
        
        $dataid = [
            "channel_id" => $id,
            "channel_name" => $channel_name,
            "car_type" => $car_type
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
        $data = [
            "channel_id" => $this->post( 'channel_id' ),
            "channel_name" => $this->post( 'channel_name' ),
            "car_type" => $this->post( 'car_type' ),
            "tanggal" => $this->post( 'tanggal' ),
            "jam" => $this->post( 'jam' ),
            "jml" => $this->post( 'jml' ),
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

    public function data_delete()
    {
        $id = $this->delete( 'id' );
        $dataid = [
            "id" => $id
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