<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Situaciones extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("situacion");
	}

	//renderiza la vista index de estudiantes
	public function situacion()
	{
		$data["listadoSituaciones"] = $this->situacion->obtenerTodos();
		$this->load->view('header');
		$this->load->view('situaciones/situacion', $data);
		$this->load->view('footer');
	}
	//renderiza la vista nuevo de estudiantes
	public function nueva_situacion()
	{
		$this->load->view('header');
		$this->load->view('situaciones/nueva_sucursal');
		$this->load->view('footer');
	}

	// InvalidArgumentException
	public function index()
	{
		$data["listado"] = $this->situacion->obtenerTodos();
		$this->load->view("header");
		$this->load->view("situaciones/index", $data);
		$this->load->view("footer");
	}
	// asignaturas



	//funcion para capturar los valores del
	//formulario nuevo
	public function guardar()
	{
		$datosSucursal = array(
			"provincia_suc_dn" => $this->input->post('provincia_suc_dn'),
			"ciudad_suc_dn" => $this->input->post('ciudad_suc_dn'),
			"estado_suc_dn" => $this->input->post('estado_suc_dn'),
			"direccion_suc_dn" => $this->input->post('direccion_suc_dn'),
			"email_suc_dn" => $this->input->post('email_suc_dn')
		);
		if ($this->sucursal->insertar($datosSucursal)) {
			$resultado = array("estado" => "ok", "mensaje" => "ingresado exitosamente");
		} else {
			$resultado = array("estado" => "error");
		}
		echo json_encode($resultado);
	}
	// funcion para eliminar estudiante
	public function borrar($id_suc_dn)
	{
		if ($this->sucursal->eliminarPorId($id_suc_dn)) {
			redirect("sucursales/index");
		} else {
			echo "Error al eliminar XD";
		}
	}

	public function editar($id)
	{
		$data["sucursalEditar"] = $this->sucursal->ObtenerPorId($id);
		$this->load->view('header');
		$this->load->view('sucursal/editar', $data);
		$this->load->view('footer');
	}
	public function procesarEditar()
	{
		$datosSucursalEditado = array(
			"id_suc_dn" => $this->input->post('id_suc_dn'),
			"provincia_suc_dn" => $this->input->post('provincia_suc_dn"'),
			"ciudad_suc_dn" => $this->input->post('ciudad_suc_dn'),
			"estado_suc_dn" => $this->input->post('estado_suc_dn'),
			"direccion_suc_dn" => $this->input->post('direccion_suc_dn'),
			"email_suc_dn" => $this->input->post('email_suc_dn')
		);
		$id = $this->input->post("id_suc_dn");

		if ($this->sucursal->editar($id, $datosSucursalEditado)) {
			redirect("sucursales/sucursal");
		} else {
			echo "<h1>ERROR</h1>";
		}
	}

} //cierre de la clase no borrar despues estas en problemas te conozco
