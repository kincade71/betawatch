<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Action extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://intranet.forrent.com/index.php/welcome
	 *	- or -  
	 * 		http://intranet.forrent.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	
	public function index()
	{
		echo 'bill';
	}
	
	public function comment()
	{
		$url = "https://deploy-forrent.rhcloud.com/comments/set/".$this->input->post('environment');
		$defaults = array( 
	       CURLOPT_POST => 1, 
	       CURLOPT_HEADER => 0, 
	       CURLOPT_FRESH_CONNECT => 1, 
	       CURLOPT_RETURNTRANSFER => 1, 
	       CURLOPT_FORBID_REUSE => 1, 
	       CURLOPT_TIMEOUT => 4, 
	       CURLOPT_SSL_VERIFYPEER => 0
	   ); 
		$this->curl->simple_post($url, $this->input->post(), $defaults);

		redirect(base_url().$this->input->post('environment'));
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */