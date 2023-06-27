<?php
class Situaciones extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("situacion");
    $this->load->model("alerta");
    $this->load->model("volcan");
  }
  //renderizacion de la primera vista de index base de datos
  public function index()
  {
    $data["listadoSituaciones"] = $this->situacion->obtenerTodas();
    $data["listadoVolcan"] = $this->volcan->getVolcanes();
    $data["listadoAlerta"] = $this->alerta->obtenerTodos();
    $this->load->view("header");
    $this->load->view("situaciones/index", $data);
    $this->load->view("footer");
  }

  public function agregar()
  {
    $datos = array(
      "nombre_si_dn" => $this->input->post("nombre_si_dn"),
      "alerta_si_dn" => $this->input->post("alerta_si_dn"),
      "actividad_si_dn" => $this->input->post("actividad_si_dn"),
      "fk_id_nomvol_dn" => $this->input->post("fk_id_nomvol_dn"),
      "fk_id_alerta_dn" => $this->input->post("fk_id_alerta_dn"),
    );
    if ($this->situacion->insertar($datos)) {
      $response = array(
        "status" => "ok",
        "message" => "¡Situacion ingresada exitosamente!"
      );
    } else {
      $response = array(
        "status" => "error",
        "message" => "¡Error al registrar situacion!"
      );
    }
    echo json_encode($response);
  }

  public function eliminar($id)
  {
    if ($this->situacion->eliminarPorId($id)) {
      $response = array(
        "status" => "ok",
        "message" => "¡Situacion eliminada exitosamente!"
      );
    } else {
      $response = array(
        "status" => "error",
        "message" => "¡Error al eliminar situacion!"
      );
    }
    echo json_encode($response);
  }

  public function editar($id)
  {
    $datos = array(
      "nombre_si_dn" => $this->input->post("nombre_si_dn_editar"),
      "alerta_si_dn" => $this->input->post("alerta_si_dn_editar"),
      "actividad_si_dn" => $this->input->post("actividad_si_dn_editar"),
      "fk_id_nomvol_dn" => $this->input->post("fk_id_nomvol_dn_editar"),
      "fk_id_alerta_dn" => $this->input->post("fk_id_alerta_dn_editar"),
    );
    if ($this->situacion->editar($id, $datos)) {
      $response = array(
        "status" => "ok",
        "message" => "¡Situacion editada exitosamente!"
      );
    } else {
      $response = array(
        "status" => "error",
        "message" => "¡Error al editar situacion!"
      );
    }
    echo json_encode($response);
  }

  public function obtenerSituacionPorId($id)
  {
    $situacion = $this->situacion->ObtenerPorId($id);
    echo json_encode($situacion);
  }
}
