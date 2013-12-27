<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajaxs extends CI_Controller {

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
		echo 'bill';
	}
	
	public function overview()
	{
		$data['where'] = $this->input->post('whereami');
		$data['whereiam'] = $this->input->post('whereami');
		$data['overview'] = $this->read->overview($this->input->post('whereami'));
		$this->load->view('overview',$data);
	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */