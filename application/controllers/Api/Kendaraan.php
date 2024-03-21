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
            
            $users = $this->KendaraanModel->get_data(TRUE);
            if ( $users )
            {
                // Set the response and exit
                $this->response( $users, 200 );
            }
            else
            {
                // Set the response and exit
                $this->response( [
                    'status' => false,
                    'message' => 'No users were found'
                ], 404 );
            }
        }
        else
        {
            $users = $this->KendaraanModel->get_data(FALSE,$id);
            if ( $users )
            {
                $this->response( $users, 200 );
            }
            else
            {
                $this->response( [
                    'status' => false,
                    'message' => 'No such user found'
                ], 404 );
            }
        }
    }
}