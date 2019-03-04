<?php 
/**
 * 
 */
class page extends CI_Controller
{
	public function index()
	{
		echo 'page/index <br>';
		echo 'Selamat Belajar Code Igniter';
	}
	public function halo($nama)
	{
		echo "Halo, $nama!";
	}
	
}

