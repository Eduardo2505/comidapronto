<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacto extends CI_Controller {

	
	public function index()
	{
        $this->load->helper('url');
		
		$this->load->view('guia/contacto_viwer');
	}
}


