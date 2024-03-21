<?php
class KendaraanModel extends CI_Model {
    public function __construct() {
        parent::__construct();
        // Load any libraries or helpers if needed
    }

    public function get_data($all = TRUE,$id = NULL) {
        // Your database operations here
        if(!$all) $this->db->where('kendaraan_id',$id);
        $this->db->select('*')->from('tbl_kendaraan');
        if($all){
            $data = $this->db->get()->result_object();
        }else{
            $data = $this->db->get()->row_object();
        }

        return $data;
    }
}
