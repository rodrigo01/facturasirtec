<?php

class Facturas extends CI_Model {
    //getterrs
    public function getfacturas( $options=array() ){

        if(sizeof($options)>0){
            //listado de opciones
            if(isset($options['order'])){
                $this->db->order_by($options['field'], $options['order']); 
            }

             if(isset($options['principal'])){
                if($options['principal'])
                $this->db->where('facturas.id_proveedor','1');
                else
                $this->db->where('facturas.id_proveedor !=','1');    
            }
        }
        //join de proveedor
        $this->db->join('proveedores', 'proveedores.id_proveedor = facturas.id_proveedor', 'left');

        $query = $this->db->get('facturas');
        return $query->result_array();
    }

    public function getFacturaByID( $id=null ){
        $this->db->where('id_factura',$id);
        $query = $this->db->get('facturas');
        return $query->row_array(); 
    }

    public function getDetallesByID($id = null){
        $this->db->where('id_factura',$id);
        $query = $this->db->get('detalles_fac');
        return $query->result_array(); 
    }

    //setters
    public function addFactura( $facturadata=array() ){
        $this->db->insert('facturas', $facturadata);
    }

    public function addDetalle($detalle = array()){
        $this->db->insert('detalles_fac', $detalle);

    }

    public function updateFactura( $facturadata=array() ){
        $this->db->where('id_factura', $facturadata['id_factura']);
        $this->db->update('facturas', $facturadata);
    }

    public function deleteFactura( $id = null ){
        if($id!=null){
            $this->db->where('id_factura', $facturadata['id_factura']);
            $this->db->delete('facturas');
        }
        
    }

    //especials
}


?>