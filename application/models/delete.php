<?php
class Delete extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function deleteFile($where,$user){
		
		if (!unlink('./watching/'.$where.'_'.$user.'.json'))
		{
		     echo 'Unable to delete the file';
		}
		else
		{
		     echo 'File deleted!';
		}
	}
}   
 ?>