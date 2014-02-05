<?php

class Archivos extends CI_Model {
    //getterrs
    public function getArchivos( $options=array() ){

        if(sizeof($options)>0){
            //listado de opciones
            if(isset($options['order'])){
                $this->db->order_by($options['field'], $options['order']); 
            }
        }
        //join de proveedor
       // $this->db->join('proveedores', 'proveedores.id_proveedor = facturas.id_proveedor', 'left');
        $query = $this->db->get('facturas');
        return $query->result_array();
    }

    public function getArchivoByID( $id=null ){
        $this->db->where('id_rel',$id);
        $query = $this->db->get('archivos');
        return $query->row_array(); 
    }

    public function getXMLbyFactura($id=null){
        $this->db->where('id_factura',$id);
        $this->db->where('tipo_archivo',1);
        $query = $this->db->get('archivos');
        return $query->row_array();
    }

    public function getPDFbyFactura($id=null){
        $this->db->where('id_factura',$id);
        $this->db->where('tipo_archivo',2);
        $query = $this->db->get('archivos');
        return $query->row_array();
    }

    //setters
    public function addArchivo( $archivodata=array() ){
        $this->db->insert('archivos', $archivodata);
    }

    public function updateArchivo( $archivodata=array() ){
        $this->db->where('id_rel', $archivodata['id_rel']);
        $this->db->update('archivos', $archivodata);
    }

    public function deleteArchivo( $id = null ){
        if($id!=null){
            $this->db->where('id_rel', $archivodata['id_rel']);
            $this->db->delete('archivos');
        }
        
    }

    //especials
}


?>