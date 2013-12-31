<?php
class Create extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function createFile($where,$data,$user){
		$dateCreated = date('m-d-Y',time());
		$datas = json_encode($data,JSON_PRETTY_PRINT);
		if (!write_file('./watching/'.$where.'_'.$dateCreated.'_'.$user.'.json', $datas))
		{
		     echo 'Unable to write the file';
		}
		else
		{
		     echo 'File written!';
		}
	}
}   
 ?>