<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index()
	{
		$this->load->view('header');
		$this->load->view('login_tmplt');
		$this->load->view('footer');
	}

	public function check(){
		$this->load->model('Usuarios');

		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$login_result = $this->Usuarios->doLogin($username,$password);

		if($login_result){
			//usuario y contraseña correctos
			$this->session->set_userdata('userver', 'modulo9a2');
			redirect('/', 'location');
		}
		else{
			//usuario y contraseña incorrectos
			$info = array();
			$info[]= array('tipo'=>'warning','mensaje'=>'Usuario o contraseña incorrectos');
			$this->session->set_flashdata('info',$info);
			redirect('/login/', 'location');

		}
	}

	public function logout()
	{
		$this->session->set_userdata('userver', 'noactivo');
		$info = array();
		$info[]= array('tipo'=>'warning','mensaje'=>'Has salido satisfactoriamente del sistema');
		$this->session->set_flashdata('info',$info);
		redirect('/login/', 'location');
	}
}
