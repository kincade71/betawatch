<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Neon extends CI_Controller {

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
		$data['title'] = 'BetaWatch';
		$data['projectname'] = 'BetaWatch';
		$data['main_content'] = 'welcome_message';
		$data['where'] = $this->uri->segment(1);
		$data['whereiam'] = $this->uri->segment(1);
		$data['navigation'] = $this->read->servernames();
		$data['overview'] = $this->read->history($this->uri->segment(1));
		$data['enviorment01'] = $this->read->server01($this->uri->segment(1));
		$data['enviorment02'] = $this->read->server02($this->uri->segment(1));
		$data['history'] = $this->read->history($this->uri->segment(1));
		if($this->session->userdata('enable_profiler') == 'TRUE'){
			$this->output->enable_profiler(TRUE);
		}
		$this->load->view('main/main_template',$data);
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
		redirect(base_url());
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
		redirect(base_url());
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */