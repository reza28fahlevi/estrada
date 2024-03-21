<?php
class GlobalModel extends CI_Model {
    public function __construct() {
        parent::__construct();
        // Load any libraries or helpers if needed
    }

    public function get_data($table,$where=array(),$all = TRUE) {
        
        if(!$all) {
            foreach($where as $name => $value){
                $this->db->where($name,$value);
            }
        }
        $this->db->select('*')->from($table);
        if($all){
            $data = $this->db->get()->result_object();
        }else{
            $data = $this->db->get()->row_object();
        }

        return $data;
    }

    function insert_data($table,$data = array()) {
        return $this->db->insert($table, $data);
    }
    
    function update_data($table,$where=array(),$data = array()) {
        foreach($where as $name => $value){
            $this->db->where($name,$value);
        }
        return $this->db->update($table, $data);
    }
    
    function delete_data($table,$where=array()) {
        foreach($where as $name => $value){
            $this->db->where($name,$value);
        }
        return $this->db->delete($table);
    }
}
