<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Volcanes extends CI_Controller
{

  //constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model("volcan");
  }

  public function index()
  {
    $data["listaVolcanes"] = $this->volcan->getVolcanes();
    $this->load->view('header');
    $this->load->view('volcanes/index', $data);
    $this->load->view('footer');
  }

  public function guardarVolcan()
  {
    $datosNuevoVolcan = array(
      "nombre_vol_dn" => $this->input->post('nombre_vol_dn'),
      "provincia_vol_dn" => $this->input->post('provincia_vol_dn'),
      "ultimo_vol_dn" => $this->input->post('ultimo_vol_dn'),
    );
    if (!$this->volcan->insertarVolcan($datosNuevoVolcan)) { // Validacion para insertar en la base de datos
      $response = array(
        'status' => 'ok',
        'message' => '¡Volcan ingresado exitosamente!' // Mensaje de exito
      );
    } else { // Si no se inserta en la base de datos
      $response = array(
        'status' => 'error',
        'message' => '¡Error al registrar volcán!' // Mensaje de error
      );
    }
    echo json_encode($response); // Para usar con ajax y jquery
  }

  public function getVolcanPorId($id)
  {
    $data = $this->volcan->getVolcanPorId($id);
    echo json_encode($data);
  }

  public function editarVolcan($id)
  {
    $id_vol_dn = $id;
    $nombre_vol_dn = $this->input->post('nombre_vol_dn_editar');
    $provincia_vol_dn = $this->input->post('provincia_vol_dn_editar');
    $ultimo_vol_dn = $this->input->post('ultima_vol_dn_editar');
    $datosVolcan = array(
      "nombre_vol_dn" => $nombre_vol_dn,
      "provincia_vol_dn" => $provincia_vol_dn,
      "ultimo_vol_dn" => $ultimo_vol_dn,
    );
    if (!$this->volcan->editarVolcan($id_vol_dn, $datosVolcan)) { // Validacion para editar en la base de datos
      $response = array(
        'status' => 'ok',
        'message' => '¡Volcan editado exitosamente!' // Mensaje de exito
      );
    } else { // Si no se edita en la base de datos
      $response = array(
        'status' => 'error',
        'message' => '¡Error al editar volcán!' // Mensaje de error
      );
    }
    echo json_encode($response); // Para usar con ajax y jquery
  }

  public function eliminarVolcan($id_vol_dn)
  {
    if (!$this->volcan->eliminarVolcan($id_vol_dn)) { // Validacion para eliminar en la base de datos
      $response = array(
        'status' => 'ok',
        'message' => '¡Volcan eliminado exitosamente!' // Mensaje de exito
      );
    } else { // Si no se elimina en la base de datos
      $response = array(
        'status' => 'error',
        'message' => '¡Error al eliminar volcán!' // Mensaje de error
      );
    }
    echo json_encode($response); // Para usar con ajax y jquery
  }
}
