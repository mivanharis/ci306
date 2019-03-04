<?php

/**
 * 
 */
class Blog extends CI_Controller
{
	
	public function index()
	{
		echo "Daftar Artikel";
	}
	public function show($kategori, $id_artikel)
	{
		echo "Kategori 	: <strong>$kategori</strong> <br>";
		// echo "Judul 	: <strong>$judul</strong>";
		echo "Id Artikel: <strong>$id_artikel</strong>";
	}
}