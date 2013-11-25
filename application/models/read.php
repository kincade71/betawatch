<?php
class Read extends CI_Model {
	
	/**
	 * Runs a quick select from db
	 *
	 * @access	public
	 * @param	NULL
	 * @return	array
	 */
   	public function test()
    {
    	
        $this->db->limit(1000);
        $this->db->where('ticket','6615');
        $query = $this->db->get('ticket_change');
        $data = $query->result_array();
        return $data;
    }
}   
 ?>