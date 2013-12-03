<?php
class Read extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	// Load the rest client spark
	$this->load->spark('restclient-2');
	
	// Load the library
	$this->load->library('rest');
	
	// Set config options (only 'server' is required to work)
	
	$config = array('server'            => 'https://deploy-forrent.rhcloud.com/',
			//'api_key'         => 'Setec_Astronomy'
			//'api_name'        => 'X-API-KEY'
			//'http_user'       => 'username',
			//'http_pass'       => 'password',
			//'http_auth'       => 'basic',
			//'ssl_verify_peer' => TRUE,
			//'ssl_cainfo'      => '/certs/cert.pem')
	);
	
	// Run some setup
	$this->rest->initialize($config);
	}
	
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
    
    public function servernames(){
    	$data = array();
    	$names = $this->rest->get('list/environments');
    	sort($names);
    	foreach ($names as $name){
    		foreach ($name as $server){
    			$data[].= $server->environment;
    		}
    	}
    	return $data;
    }
    
    public function server01($envirnoment){
    	$data = $this->rest->get('latest/server/'.$envirnoment.'betafe01');
    	return $data;
    }
    
    public function server02($envirnoment){
    	$data = $this->rest->get('latest/server/'.$envirnoment.'betafe02');
    	return $data;
    }
    
    public function history($envirnoment){
    	$data = $this->rest->get('/latest/_enviro/'.$envirnoment);
    	return $data;
    }
}   
 ?>