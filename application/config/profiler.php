<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Profiler Sections
| -------------------------------------------------------------------------
| This file lets you determine whether or not various sections of Profiler
| data are displayed when the Profiler is enabled.
| Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/profiling.html
|
*/

$config['benchmarks']         	= ($this->session->userdata('benchmarks') == 'TRUE')?TRUE:FALSE;	//Elapsed time of Benchmark points and total execution time	TRUE
$config['config']         	  	= ($this->session->userdata('config') == 'TRUE')?TRUE:FALSE;	//CodeIgniter Config variables	TRUE
$config['controller_info']		= ($this->session->userdata('controller_info') == 'TRUE')?TRUE:FALSE;	//The Controller class and method requested	TRUE
$config['get']          		= ($this->session->userdata('get') == 'TRUE')?TRUE:FALSE;	//Any GET data passed in the request	TRUE
$config['http_headers']         = ($this->session->userdata('http_headers') == 'TRUE')?TRUE:FALSE;	// HTTP headers for the current request	TRUE
$config['memory_usage']         = ($this->session->userdata('memory_usage') == 'TRUE')?TRUE:FALSE;	//Amount of memory consumed by the current request, in bytes	TRUE
$config['post']          		= ($this->session->userdata('post') == 'TRUE')?TRUE:FALSE;	//Any POST data passed in the request	TRUE
$config['queries']          	= ($this->session->userdata('queries') == 'TRUE')?TRUE:FALSE;	//Listing of all database queries executed, including execution time	TRUE
$config['uri_string']          	= ($this->session->userdata('uri_string') == 'TRUE')?TRUE:FALSE;	//The URI of the current request	TRUE
$config['query_toggle_count']   = ($this->session->userdata('query_toggle_count') == 'TRUE')?'50':FALSE; 	//The number of queries after which the query block will default to hidden.	25

/* End of file profiler.php */
/* Location: ./application/config/profiler.php */