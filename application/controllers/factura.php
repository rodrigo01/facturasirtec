<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Factura extends CI_Controller {


	public function index()
	{
		
	}

	public function proveedores(){
		$this->load->model('Facturas');
		$data['facturas'] = $this->Facturas->getfacturas(array('order'=>'DESC','field'=>'id_factura','principal'=>false));

		$this->load->view('header');
		$this->load->view('menu_opciones');
		$this->load->view('factura_proveedores_lista',$data);
		$this->load->view('footer');
	}

	public function emitidas(){
		$this->load->model('Facturas');
		$data['facturas'] = $this->Facturas->getfacturas(array('order'=>'DESC','field'=>'id_factura','principal'=>true));

		$this->load->view('header');
		$this->load->view('menu_opciones');
		$this->load->view('factura_proveedores_lista',$data);
		$this->load->view('footer');
	}

	public function cargarxml(){
		$this->load->view('header');
		$this->load->view('menu_opciones');
		$this->load->view('factura_cargarxml');
		$this->load->view('footer');
	}

	public function ver($id=null){
		$this->load->model('Facturas');
		$this->load->model('Proveedores');
		
		if($id!=null){
			$data['factura'] = $this->Facturas->getFacturaByID( $id );
			if(sizeof($data['factura'])>0){
				//cargamos detalles de factura
				$data['proveedor'] = $this->Proveedores->getProveedorByID( $data['factura']['id_proveedor'] );
				$data['detalles'] = $this->Facturas->getDetallesByID( $id );

				//listo para impresion
				$this->load->view('header');
				$this->load->view('menu_opciones');
				$this->load->view('factura_ver',$data);
				$this->load->view('footer');

			}else{
				$info = array();
				$info[]= array('tipo'=>'warning','mensaje'=>'No existe Factura');
				$this->session->set_flashdata('info',$info);
				redirect('/proveedor', 'location');
			}
		}
		else{
			$info = array();
			$info[]= array('tipo'=>'warning','mensaje'=>'Factura Invalida');
			$this->session->set_flashdata('info',$info);
			redirect('/proveedor', 'location');
		}
	}

	public function load(){

		//cargamos modulos
		$this->load->model('Proveedores');
		$this->load->model('Facturas');
		$this->load->model('Archivos');

		//inspeccionamos primer el archivo XML
		$config['upload_path'] = './archivos/xml/';
		$config['allowed_types'] = '*'; 
		
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload("archxml"))
		{
			//error
			$error = array('error' => $this->upload->display_errors());
			$info = array();
			$info[]= array('tipo'=>'warning','mensaje'=>"PDF no cargado o Error en archivo");
			$this->session->set_flashdata('info',$info);
			redirect('/factura/proveedores', 'location');

		}
		else
		{
			//se subio :D
			$udata = array('upload_data' => $this->upload->data());
			//print_r($udata);
			$fname = $udata['upload_data']['raw_name'];
			$filename = $fname.'.xml';
	        $xmlfile="./archivos/xml/".$filename;
			
	        $xmlRaw = file_get_contents($xmlfile);

	        $this->load->library('simplexml');
	        $Comprobante = $this->simplexml->xml_parse($xmlRaw);
	        
	        $preFactura = array();
	        $factura = array();



	        //recorremos XML y guardamos en variables
	        foreach($Comprobante as $key=>$value)
	        {
	        	$preFactura[$key] = $value;
	        }

	        //verificamos si es Cfdi o xml normal
	        if(isset($preFactura['cfdi:Emisor'])){
	        	//con cfdi
	        	$tip = 'cfdi:';
	        }
	        else{
	        	//factura normal
	        	$tip = '';
	        }

	        //Base de factura
	        //emisor
	        


	        //verificamos si existen los datos del receptor y del emisor
	        $rfc = $preFactura[$tip.'Emisor']['@attributes']['rfc'];
	        $proveedor = $this->Proveedores->getProveedorByRFC( $rfc );

	        if(sizeof($proveedor)>0){
	        	//si existe emisor
	        	//echo 'Existe Emisor';
	        }
	        else{
	        	//echo 'No Existe Emisor';
	        	//creamos la cuenta a emisor
	        	$atributo = $preFactura[$tip.'Emisor']['@attributes'];
	        	$proveedor['rfc'] = $atributo['rfc'];
	        	$proveedor['nombre'] = $atributo['nombre'];  
	        	$domiciliofis = $preFactura[$tip.'Emisor'][$tip.'DomicilioFiscal']['@attributes'];
	        	$proveedor['calle'] = $domiciliofis['calle'];
	        	$proveedor['cp'] = $domiciliofis['codigoPostal'];
	        	$proveedor['colonia'] = $domiciliofis['colonia'];
	        	$proveedor['estado'] = $domiciliofis['estado'];
	        	$proveedor['municipio'] = $domiciliofis['municipio'];
	        	$proveedor['noexterior'] = $domiciliofis['noExterior'];
	        	if(!isset($domiciliofis['noInterior'])){$domiciliofis['noInterior'] = "S/N";}
	        	$proveedor['nointerior'] = $domiciliofis['noInterior'];
	        	$proveedor['pais'] = $domiciliofis['pais'];
	        	$this->Proveedores->addProveedor($proveedor); /// añadimos proveedor

	        }

	        //comprobamos receptor
	        $rfc = $preFactura[$tip.'Receptor']['@attributes']['rfc'];
	        $receptor = $this->Proveedores->getProveedorByRFC( $rfc );

	        if(sizeof($receptor)>0){
	        	//si existe receptor
	        	//echo 'Existe receptor';
	        }
	        else{
	        	//echo 'No Existe receptor';
	        	//creamos la cuenta a emisor
	        	$proveedor = array();
	        	$atributo = $preFactura[$tip.'Receptor']['@attributes'];
	        	$proveedor['rfc'] = $atributo['rfc'];
	        	$proveedor['nombre'] = $atributo['nombre'];  
	        	$domiciliofis = $preFactura[$tip.'Receptor'][$tip.'Domicilio']['@attributes'];
	        	

	        	if(!isset($domiciliofis['calle'])){$proveedor['calle'] = "No Definido";}else{$proveedor['calle'] = $domiciliofis['calle']; }

	        	if(!isset($domiciliofis['codigoPostal'])){$proveedor['cp'] = "0";}else{$proveedor['cp'] = $domiciliofis['codigoPostal']; }
	        	if(!isset($domiciliofis['colonia'])){$proveedor['colonia'] = "No Definido";}else{$proveedor['colonia'] = $domiciliofis['colonia']; }
	        	if(!isset($domiciliofis['estado'])){$proveedor['estado'] = "No Definido";}else{$proveedor['estado'] = $domiciliofis['estado']; }
	        	if(!isset($domiciliofis['municipio'])){$proveedor['estado'] = "No Definido";}else{$proveedor['municipio'] = $domiciliofis['municipio']; }

	        	if(!isset($domiciliofis['noExterior'])){$proveedor['noexterior'] = "S/N";}else{$proveedor['noexterior'] = $domiciliofis['noExterior']; }

	        	if(!isset($domiciliofis['noInterior'])){$domiciliofis['noInterior'] = "S/N";}
	        	$proveedor['nointerior'] = $domiciliofis['noInterior'];

	        	if(!isset($domiciliofis['pais'])){$proveedor['pais'] = "No Definido";}else{$proveedor['pais'] = $domiciliofis['pais']; }

	        	

	        	$this->Proveedores->addProveedor($proveedor); /// añadimos proveedor

	        }

	        $rfc = $preFactura[$tip.'Emisor']['@attributes']['rfc'];
	        $proveedor = $this->Proveedores->getProveedorByRFC( $rfc );
	        $factura['id_proveedor'] = $proveedor['id_proveedor'];

	        $rfc = $preFactura[$tip.'Receptor']['@attributes']['rfc'];
	        $receptor = $this->Proveedores->getProveedorByRFC( $rfc );
	        $factura['id_receptor'] = $receptor['id_proveedor'];
	        

	       //$proveedor = $this->Proveedores->getProveedorByRFC( $rfc );
	        if(sizeof($proveedor)>0){

		        $factura['id_proveedor'] = $proveedor['id_proveedor'];

		        $factura['lugar_expedicion'] = $preFactura["@attributes"]['LugarExpedicion'];
		        if(isset($preFactura["@attributes"]['Moneda'])){ $factura['moneda'] = $preFactura["@attributes"]['Moneda']; }
		        if(isset($preFactura["@attributes"]['NumCtaPago'])){ $factura['numctapago'] = $preFactura["@attributes"]['NumCtaPago']; }
		        if(isset($preFactura["@attributes"]['TipoCambio'])){ $factura['tipocambio'] = $preFactura["@attributes"]['TipoCambio']; }
		        if(isset($preFactura["@attributes"]['condicionesDePago'])){ $factura['condicionespago'] = $preFactura["@attributes"]['condicionesDePago']; }
		        if(isset($preFactura["@attributes"]['descuento'])){ $factura['descuento'] = $preFactura["@attributes"]['descuento']; }
		        //para fecha
		        if(isset($preFactura["@attributes"]['fecha'])){
		        	$datosFecha =  explode('T',$preFactura["@attributes"]['fecha']);
		        	$factura['fecha'] = $datosFecha[0];
		        	$factura['hora'] = $datosFecha[1]; 
		        }
		        if(isset($preFactura["@attributes"]['folio'])){ $factura['folio'] = $preFactura["@attributes"]['folio']; }
		        if(isset($preFactura["@attributes"]['metodoDePago'])){ $factura['metodopago'] = $preFactura["@attributes"]['metodoDePago']; }
		        if(isset($preFactura["@attributes"]['noCertificado'])){ $factura['nocertificado'] = $preFactura["@attributes"]['noCertificado']; }
		        if(isset($preFactura["@attributes"]['serie'])){ $factura['serie'] = $preFactura["@attributes"]['serie']; }
		        if(isset($preFactura["@attributes"]['subTotal'])){ $factura['subtotal'] = $preFactura["@attributes"]['subTotal']; }
		        if(isset($preFactura["@attributes"]['tipoDeComprobante'])){ $factura['tipocomprobante'] = $preFactura["@attributes"]['tipoDeComprobante']; }
		        if(isset($preFactura["@attributes"]['total'])){ $factura['total'] = $preFactura["@attributes"]['total']; }

		        //Impuestos
		        if(isset($preFactura[$tip.'Impuestos']['@attributes']['totalImpuestosRetenidos'])){ $factura['impuestosretenidos'] = $preFactura[$tip.'Impuestos']['@attributes']['totalImpuestosRetenidos']; }
				if(isset($preFactura[$tip.'Impuestos']['@attributes']['totalImpuestosTrasladados'])){ $factura['impuestostrasladados'] = $preFactura[$tip.'Impuestos']['@attributes']['totalImpuestosTrasladados']; }

				//Detalles de factura
				//cfdi:Conceptos
				if(isset($preFactura[$tip.'Conceptos'])){
					/*echo '<pre>';
					print_r($preFactura['cfdi:Conceptos']['cfdi:Concepto']);
					echo '</pre>';*/
					if(isset($preFactura[$tip.'Conceptos'][$tip.'Concepto'])){

						if(sizeof($preFactura[$tip.'Conceptos'][$tip.'Concepto'])>1)
						{
							//para varios
							foreach($preFactura[$tip.'Conceptos'][$tip.'Concepto'] as $rowconcepto){
							
							$preConcepto[] = array(
								'cantidad'=>$rowconcepto['@attributes']['cantidad'], 
								'descripcion'=>$rowconcepto['@attributes']['descripcion'], 
								'punitario'=>$rowconcepto['@attributes']['valorUnitario'], 
								'unidad'=>$rowconcepto['@attributes']['unidad'],
								'importe'=>$rowconcepto['@attributes']['importe']
								);
							}
							/*echo 'Varios';
							echo "<pre>";
							print_r($preFactura[$tip.'Conceptos'][$tip.'Concepto']);
							echo "</pre>";*/

						}
						else{
							//solo uno
							/*echo 'Solo una';
							echo "<pre>";
							print_r($preFactura[$tip.'Conceptos']	);
							echo "</pre>";*/
							$rowconcepto = $preFactura[$tip.'Conceptos'][$tip.'Concepto'];
							$preConcepto[] = array(
								'cantidad'=>$rowconcepto['@attributes']['cantidad'], 
								'descripcion'=>$rowconcepto['@attributes']['descripcion'], 
								'punitario'=>$rowconcepto['@attributes']['valorUnitario'], 
								'unidad'=>$rowconcepto['@attributes']['unidad'],
								'importe'=>$rowconcepto['@attributes']['importe']
								);
						}

						
					}

					/*echo '<pre>';
					print_r($preConcepto);
					echo '</pre>';*/
				}

				
				//ahora cargamos PDF
				//inspeccionamos primer el archivo XML
				$config['upload_path'] = './archivos/pdf/';
				$config['allowed_types'] = '*'; 
				
				$this->upload->initialize($config);
				if ( ! $this->upload->do_upload("archpdf"))
				{
					//error
					//seguro no se cargo o no existe
					//cargamos factura a BD
					$this->Facturas->addFactura( $factura );
					$id_factura = $this->db->insert_id();

					//cargamos conceptos
					foreach($preConcepto as $detalle){
						$detalle['id_factura'] = $id_factura;
						$this->Facturas->addDetalle($detalle);
					}

					$archivo['id_factura'] = $id_factura;
					$archivo['tipo_archivo'] = 1;  //1 - XML , 2-PDF
					$archivo['nombre_archivo'] = $filename;
					//agregamos archivo de factura a bd
					$this->Archivos->addArchivo($archivo);

					$info = array();
					$info[]= array('tipo'=>'success','mensaje'=>"Factura Cargada");
					$info[]= array('tipo'=>'warning','mensaje'=>"Archivo PDF no cargado o Error en Archivo");
					$this->session->set_flashdata('info',$info);
					redirect('/factura/proveedores', 'location');
				}
				else
				{
					//cargamos factura a BD
					$factura['pdf']=1;
					$this->Facturas->addFactura( $factura );
					$id_factura = $this->db->insert_id();

					$archivo['id_factura'] = $id_factura;
					$archivo['tipo_archivo'] = 1;  //1 - XML , 2-PDF
					$archivo['nombre_archivo'] = $filename;
					//agregamos archivo de factura a bd
					$this->Archivos->addArchivo($archivo);

					$udatapdf = array('upload_data' => $this->upload->data());
					$fname = $udatapdf['upload_data']['raw_name'];
					$filename = $fname.'.pdf';

					$archivo['id_factura'] = $id_factura;
					$archivo['tipo_archivo'] = 2;  //1 - XML , 2-PDF
					$archivo['nombre_archivo'] = $filename;
					//agregamos archivo pdf de factura a bd
					$this->Archivos->addArchivo($archivo);

					$info = array();
					$info[]= array('tipo'=>'success','mensaje'=>"Factura Cargada");
					$info[]= array('tipo'=>'success','mensaje'=>"Archivo PDF Cargado");
					$this->session->set_flashdata('info',$info);
					redirect('/factura/proveedores', 'location');

				}

			}else{
				$info = array();
				$info[]= array('tipo'=>'warning','mensaje'=>'No existe proveedor');
				$this->session->set_flashdata('info',$info);
				redirect('/factura/proveedores', 'location');
			}

			
		}


		


	}



}
