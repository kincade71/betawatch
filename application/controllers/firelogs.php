<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Firelogs extends CI_Controller {

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
	public function __construct()
	{
		parent::__construct();
		if($this->input->cookie('lights')){
			$lights = array(
					'lights'  => $this->input->cookie('lights'),
			);
			$this->session->set_userdata($lights);
		}
	}
	
	public function index()
	{
	    /*
	    highly advised that you use authentification 
	    before running this controller to keep the world out of your logs!!!
	    you can use whatever method you like does not have to be logs
	    */
		
	   $this->load->spark('fire_log/0.8.2');
	    // thats it, ill take if from there
	}
	
	
	public function lightsoff(){
		$lights = array(
				'lights'  => 'inverse',
		);
		
		$this->session->set_userdata($lights);
		$cookie = array(
				'name'   => 'lights',
				'value'  => 'inverse',
				'expire' => time()+60*60*24*30,
				'path'   => '/',
				'secure' => FALSE
		);
		
		$this->input->set_cookie($cookie);
		redirect(base_url().$this->uri->segment(1));
	}
	
	public function lightson(){
		$lights = array(
				'lights'  => NULL,
		);
	
		$this->session->set_userdata($lights);
		$cookie = array(
				'name'   => 'lights',
				'value'  => NULL,
				'expire' => NULL,
				'path'   => '/',
				'secure' => FALSE
		);
		
		$this->input->set_cookie($cookie);
		redirect(base_url().$this->uri->segment(1));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */