<?php

class Proveedores extends CI_Model {

	//getterrs
	public function getProveedores( $options=array() ){

		if(sizeof($options)>0){
			//listado de opciones
			if(isset($options['order'])){
				$this->db->order_by($options['field'], $options['order']); 
			}
		}
		$query = $this->db->get('proveedores');
		return $query->result_array();
	}

	public function getProveedorByID( $id=null ){
		$this->db->where('id_proveedor',$id);
		$query = $this->db->get('proveedores');
		return $query->row_array(); 
	}

	public function getProveedorByRFC( $rfc=null ){
		$this->db->where('rfc',$rfc);
		$query = $this->db->get('proveedores');
		return $query->row_array(); 
	}

	//setters
    public function addProveedor( $proveedordata=array() ){
        $this->db->insert('proveedores', $proveedordata);
    }

    public function updateProveedor( $proveedordata=array() ){
        $this->db->where('id_proveedor', $proveedordata['id_proveedor']);
        $this->db->update('proveedores', $proveedordata);
    }

    public function deleteProveedor( $id = null ){
        if($id!=null){
            $this->db->where('id_proveedorproveedor', $proveedordata['id_proveedor']);
            $this->db->delete('proveedores');
        }
        
    }

	//especials


}


?>