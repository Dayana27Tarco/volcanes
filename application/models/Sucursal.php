<?php
   class Sucursal extends CI_Model
   {
     function __construct()
     {
       parent::__construct();
     }
     public function insertar($datos){
        return $this->db->insert("sucursal",$datos);
     }
     
     public function obtenerTodos(){
        $sucursales=$this->db->get("sucursal");
        if ($sucursales->num_rows()>0) {
          return $sucursales;
        } else {
          return false;
        }
     }

     public function eliminarPorId($id){
        $this->db->where("id_suc_dn",$id);
        return $this->db->delete("sucursal");
     }

     public function obtenerPorId($id){
        $this->db->where("id_suc_dn",$id);
        $sucursal=$this->db->get("sucursal");
        if($sucursal->num_rows()>0){
          return $sucursal->row();
        }else{
          return false;
        }
     }

     public function actualizar($id,$datos){
       $this->db->where("id_suc_dn",$id);
       return $this->db->update("sucursal",$datos);
     }

   }
