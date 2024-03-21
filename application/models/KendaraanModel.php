<?php
class KendaraanModel extends CI_Model {
    public function __construct() {
        parent::__construct();
        // Load any libraries or helpers if needed
    }

    public function get_data($all = TRUE,$id = NULL) {
        if(!$all) $this->db->where('kendaraan_id',$id);
        $this->db->select('*')->from('tbl_kendaraan');
        if($all){
            $data = $this->db->get()->result_object();
        }else{
            $data = $this->db->get()->row_object();
        }

        return $data;
    }

    function insert_data($data = array()) {
        return $this->db->insert('tbl_kendaraan', $data);
    }
    
    function update_data($data = array(),$id) {
        $this->db->where('kendaraan_id', $id);
        return $this->db->update('tbl_kendaraan', $data);
    }
    
    function delete_data($id) {
        $this->db->where('kendaraan_id', $id);
        return $this->db->delete('tbl_kendaraan');
    }
}
