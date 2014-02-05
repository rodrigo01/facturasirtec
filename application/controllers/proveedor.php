<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedor extends CI_Controller {


	public function index()
	{
		$this->load->model('Proveedores');
		$data['proveedores'] = $this->Proveedores->getProveedores(array('order'=>'ASC','field'=>'nombre'));

		$this->load->view('header');
		$this->load->view('menu_opciones');
		$this->load->view('proveedor_lista',$data);
		$this->load->view('footer');
	}

	public function ver($id=null)
	{
		$this->load->model('Proveedores');
		
		if($id!=null){
			$data['proveedor'] = $this->Proveedores->getProveedorByID( $id );
			if(sizeof($data['proveedor'])>0){
				$this->load->view('header');
				$this->load->view('menu_opciones');
				$this->load->view('proveedor_ver',$data);
				$this->load->view('footer');
			}else{
				$info = array();
				$info[]= array('tipo'=>'warning','mensaje'=>'No existe proveedor');
				$this->session->set_flashdata('info',$info);
				redirect('/proveedor', 'location');
			}
		}
		else{
			$info = array();
			$info[]= array('tipo'=>'warning','mensaje'=>'Proveedor Invalido');
			$this->session->set_flashdata('info',$info);
			redirect('/proveedor', 'location');
		}

		
	}

	public function editar($id=null)
	{
		

		$this->load->model('Proveedores');
		
		if($id!=null){
			$data['proveedor'] = $this->Proveedores->getProveedorByID( $id );
			if(sizeof($data['proveedor'])>0){
				$this->load->view('header');
				$this->load->view('menu_opciones');
				$this->load->view('proveedor_editar',$data);
				$this->load->view('footer');
			}else{
				$info = array();
				$info[]= array('tipo'=>'warning','mensaje'=>'No existe proveedor');
				$this->session->set_flashdata('info',$info);
				redirect('/proveedor', 'location');
			}
		}
		else{
			$info = array();
			$info[]= array('tipo'=>'warning','mensaje'=>'Proveedor Invalido');
			$this->session->set_flashdata('info',$info);
			redirect('/proveedor', 'location');
		}
	}

	public function crear()
	{
		$this->load->view('header');
		$this->load->view('menu_opciones');
		$this->load->view('proveedor_agregar');
		$this->load->view('footer');
		
	}

	public function insert()
	{
		
		$this->load->model('Proveedores');

		if($this->input->post('proveedor')){
			if(sizeof($this->input->post('proveedor'))>0){
				
				$proveedor = $this->input->post('proveedor');
				$proveedor['rfc'] = strtoupper($proveedor['rfc']);
				$getproveedor = $this->Proveedores->getProveedorByRFC( strtoupper($proveedor['rfc']) );

	        	if(sizeof($getproveedor)==0){

	        		$this->Proveedores->addProveedor( $this->input->post('proveedor') );

	        		$info = array();
					$info[]= array('tipo'=>'success','mensaje'=>'Proveedor dado de alta satisfactoriamente');
					$this->session->set_flashdata('info',$info);
					redirect('/proveedor', 'location');

	        	}
	        	else{
	        		$info = array();
					$info[]= array('tipo'=>'warning','mensaje'=>'RFC de Proveedor ya existente');
					$this->session->set_flashdata('info',$info);
					redirect('/proveedor', 'location');
	        	}

			}
			else{
				$info = array();
				$info[]= array('tipo'=>'warning','mensaje'=>'Existe envio pero es invalido');
				$this->session->set_flashdata('info',$info);
				redirect('/proveedor', 'location');
			}
		}
		else{
			$info = array();
			$info[]= array('tipo'=>'warning','mensaje'=>'No hay informacion enviada');
			$this->session->set_flashdata('info',$info);
			redirect('/proveedor', 'location');
		}
		
	}

	public function update()
	{
		
		$this->load->model('Proveedores');

		if($this->input->post('proveedor')){
			if(sizeof($this->input->post('proveedor'))>0){
				
				$proveedor = $this->input->post('proveedor');
				
        		$this->Proveedores->updateProveedor( $proveedor );

        		$info = array();
				$info[]= array('tipo'=>'success','mensaje'=>'Proveedor Actualizado');
				$this->session->set_flashdata('info',$info);
				redirect('/proveedor', 'location');
			}
			else{
				$info = array();
				$info[]= array('tipo'=>'warning','mensaje'=>'Existe envio pero es invalido');
				$this->session->set_flashdata('info',$info);
				redirect('/proveedor', 'location');
			}
		}
		else{
			$info = array();
			$info[]= array('tipo'=>'warning','mensaje'=>'No hay informacion enviada');
			$this->session->set_flashdata('info',$info);
			redirect('/proveedor', 'location');
		}
		
	}

}
