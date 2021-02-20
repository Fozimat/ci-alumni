<?php
class Chart_model extends CI_Model{

	public function get_all_fruits() 
    { 
        return $this->db->get('Fruits')->result(); 
    }

}
