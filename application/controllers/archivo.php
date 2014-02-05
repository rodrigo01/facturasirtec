<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Archivo extends CI_Controller {


	public function index()
	{
		//no hay nada que mostrar directamente
	}

	public function cargarpdf($id=null)
	{
		if($id!=null){
			$this->load->model('Facturas');
			$this->load->model('Proveedores');
			$data['factura'] = $this->Facturas->getFacturaByID( $id );
			$data['proveedor'] = $this->Proveedores->getProveedorByID( $data['factura']['id_proveedor'] );
			if(sizeof($data['factura'])>0){
				$this->load->view('header');
				$this->load->view('menu_opciones');
				$this->load->view('archivo_cargarpdf',$data);
				$this->load->view('footer');
			}else{
				$info = array();
				$info[]= array('tipo'=>'warning','mensaje'=>'No existe factura');
				$this->session->set_flashdata('info',$info);
				redirect('/factura/proveedores', 'location');
			}
			
		}else{
			$info = array();
			$info[]= array('tipo'=>'warning','mensaje'=>'Factura no valida');
			$this->session->set_flashdata('info',$info);
			redirect('/factura/proveedores', 'location');
		}
		
	}

	public function loadpdf(){
		$this->load->model('Archivos');
		$this->load->model('Facturas');
		//inspeccionamos primer el archivo XML
		$config['upload_path'] = './archivos/pdf/';
		$config['allowed_types'] = '*'; 
		
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload("archpdf"))
		{
			$info = array();
			$info[]= array('tipo'=>'warning','mensaje'=>'Error al cargar PDF');
			$this->session->set_flashdata('info',$info);
			redirect('/factura/proveedores', 'location');
		}
		else
		{
			$udatapdf = array('upload_data' => $this->upload->data());
			$fname = $udatapdf['upload_data']['raw_name'];
			$filename = $fname.'.pdf';

			$factura = $this->input->post('factura');
			$archivo['id_factura'] = $factura['id_factura'];
			$archivo['tipo_archivo'] = 2;  //1 - XML , 2-PDF
			$archivo['nombre_archivo'] = $filename;

			//agregamos archivo pdf de factura a bd
			$this->Archivos->addArchivo($archivo);

			//actualizamos factura
			$this->Facturas->updateFactura( array('id_factura'=>$factura['id_factura'],'pdf'=>1) );

			$info = array();
			$info[]= array('tipo'=>'success','mensaje'=>'Se cargo PDF a sistema');
			$this->session->set_flashdata('info',$info);
			redirect('/factura/proveedores', 'location');

		}

	}
}

?>