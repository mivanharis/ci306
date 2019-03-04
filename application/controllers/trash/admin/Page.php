<?php 
/**
 * 
 */
class page extends CI_Controller
{
	public function index()
	{
		echo 'admin/page/index';
	}
	public function halo($nama)
	{
		echo "Halo, $nama!";
	}
	
}

