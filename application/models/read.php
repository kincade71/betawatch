<?php
class Read extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	// Load the rest client spark
	$this->load->spark('restclient-2');
	
	// Load the library
	$this->load->library('rest');
	
	// Set config options (only 'server' is required to work)http://localhost:8080/
	
	$config = array('server' => 'http://deploy-forrent.rhcloud.com/');
	
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
    	array_multisort($data);
    	return $data;
    }
    
    public function history($envirnoment){
    	$data = $this->rest->get('/history/_enviro/'.$envirnoment);
    	return $data;
    }
    
    //get notes 
	public function notes($envirnoment) {
		$result = array();
		$data = $this->rest->get('/note/get/'.$envirnoment);
		foreach($data as $info){
			
			$result['note'].= $info->note;
			$result['date'].= $this->secs_to_h((time()-$info->datestamp/ 1000));
		}
    	return $result;

	}

    //get comments
    public function comments($envirnoment){
        $data = $this->rest->get('comments/get/'.$envirnoment);
        return $data;
    }

    //get ratings
    public function ratings($envirnoment){
        $rating = array();
        $stars = NULL;

        $data = $this->rest->get('comments/get/'.$envirnoment);
        foreach($data as $info){ 
            if(isset($info->rating)){
                $rating[].= $info->rating;
            }
        }
         $ratings = round(array_sum($rating)/count($rating),0,PHP_ROUND_HALF_DOWN);
        
        for ($i=0; $i < round($ratings) ; $i++) { 
                $stars.= "<i class='glyphicon glyphicon-star'></i>";
            }

         for ($i=0; $i < round((5-$ratings)); $i++) {      
                $stars.="<i class='glyphicon glyphicon-star-empty'></i>";
             }

      return $stars;
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
    
    function watch($where,$user){
    	
    	$olddata = json_decode(read_file('./watching/'.$where.'_'.$user.'.json'),true);
    	$newdata = $this->overview($where);//json_decode(read_file('./watching/argon_10.68.14.67.json'),true);
    	
    	$result = json_decode(json_encode($newdata), true);
    	
    	for ($i = 0; $i < count($result); $i++) {
    		unset($result[$i]['datestamp']);
    	}
    	for ($i = 0; $i < count($olddata); $i++) {
    		unset($olddata[$i]['datestamp']);
    	}
    	/*echo '<div class="span12">diff';
    	echo '<pre >';
    	for ($i = 0; $i < count($olddata); $i++) {
    		print_r(array_diff($result[$i],$olddata[$i]));
    	}
    	echo '</pre></div></div>';
    	
    	echo '<div class="span6">old';
    	echo '<pre >';
    	print_r($olddata);
    	echo '</pre></div>';
    	
    	echo '<div class="span6">new';
    	echo '<pre >';
    	print_r($result);
    	echo '</pre></div>';*/
    	

    	//print_r($this->check_diff_multi($result,$olddata));
    	foreach ($this->check_diff_multi($result,$olddata) as $key => $val){
    		//print_r($val);
    		if(array_key_exists('release',$val)){
	    		$sendoff = $val['release'].'-';
	    		$sendoff.= $val['codebase'].'-';
	    		$sendoff.= $val['server'].'-';
	    		$sendoff.= $where;
    		}
    		
    	}
    	echo $sendoff;
    }
    
    function check_diff_multi($array1, $array2){
    $result = array();
    foreach($array1 as $key => $val) {
		if(isset($array2[$key])){
           if(is_array($val) && $array2[$key]){
               $result[$key] = array_diff($val, $array2[$key]);
               $result[$key]['server'] = $array2[$key]['server'];
               $result[$key]['codebase'] = $array2[$key]['codebase'];
           }	
       }else {
       	if(array_key_exists('release',$result)){
           $result[$key] = $val;
       	}
       }
   
    }
		return $result;

    }
    
}   
 ?>