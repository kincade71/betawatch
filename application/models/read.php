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
	
	$config = array('server' => 'https://deploy-forrent.rhcloud.com/');
	
	// Run some setup
	$this->rest->initialize($config);
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
    
    public function servers(){
    	$data = array();
    	$names = $this->rest->get('latest/_all');
    	sort($names);
    	foreach ($names as $name){
    		foreach ($name as $server){
    			$data[].= $server->server;
    		}
    	}
    	return $data;
    }
    
    public function server($envirnoment){
    	$data = $this->rest->get('latest/server/'.$envirnoment);
    	return $data;
    }
    
    public function overview($envirnoment){
    	$data = $this->rest->get('/latest/_enviro/'.$envirnoment);
    	return $data;
    }
    
    public function history($envirnoment){
    	$data = $this->rest->get('/history/_enviro/'.$envirnoment);
    	return $data;
    }
    
    /*
     * Convert seconds to human readable text.
    *
    */
    public function secs_to_h($secs)
    {
    	$units = array(
    			"week"   => 7*24*3600,
    			"day"    =>   24*3600,
    			"hour"   =>      3600,
    			"minute" =>        60,
    			"second" =>         1,
    	);
    
    	// specifically handle zero
    	if ( $secs == 0 ) return "0 seconds";
    
    	$s = "";
    
    	foreach ( $units as $name => $divisor ) {
    		if ( $quot = intval($secs / $divisor) ) {
    			$s .= "$quot $name";
    			$s .= (abs($quot) > 1 ? "s" : "") . ", ";
    			$secs -= $quot * $divisor;
    		}
    	}
    
    	return substr($s, 0, -2).' ago';
    }
}   
 ?>