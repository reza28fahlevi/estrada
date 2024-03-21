<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Cctv extends RestController {

    private $table;

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('GlobalModel');
        $this->table = 'tbl_cctv';
    }

    public function data_get()
    {
        $id = $this->get( 'channel_id' );
        
        $dataid = [
            "channel_id" => $id
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
        // $id = $this->post( 'channel_id' );
        $data = [
            "channel_id" => $this->post( 'channel_id' ),
            "nama_cctv" => $this->post( 'nama_cctv' ),
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
        $id = $this->put( 'channel_id' );
        $dataid = [
            "channel_id" => $id
        ];
        $data = [
            "channel_id" => $this->post( 'channel_id' ),
            "nama_cctv" => $this->put( 'nama_cctv' )
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
        $id = $this->delete( 'channel_id' );
        $dataid = [
            "channel_id" => $id
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