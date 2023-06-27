<?php
   class Usuario extends CI_Model
   {
     function __construct()
     {
       parent::__construct();
     }
     //Funcion que consulta un usuario por Email y Password

     public function obtenerPorEmailPassword($email,$password){
        $this->db->where("email_usu_dn",$email);
        $this->db->where("passwor_usu_dn",$password);
        $usuario=$this->db->get("usuario");
        if ($usuario->num_rows()>0)
        {
          return $usuario->row();
        } else
        {
          return false;//cuando no hay datos
        }
     }
   }//Cierre de la clase (No borrar)
