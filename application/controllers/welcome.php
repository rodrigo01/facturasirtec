<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		if($this->session->userdata('userver')!='active'){
			redirect('/login/', 'location');
		}

		$this->load->view('header');
		$this->load->view('menu_opciones');
		$this->load->view('footer');

	}
}
