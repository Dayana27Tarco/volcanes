<?php
class Volcan extends CI_Model //creamos
{
  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function getVolcanes()
  {
    $query = $this->db->get('nomvol');
    return $query->result();
  }

  public function getVolcanPorId($id)
  {
    $this->db->where('id_vol_dn', $id);
    $query = $this->db->get('nomvol');

    if ($query->num_rows() == 1) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function insertarVolcan($data)
  {
    $this->db->insert('nomvol', $data);
  }

  public function editarVolcan($id, $data)
  {
    $this->db->where('id_vol_dn', $id);
    $this->db->update('nomvol', $data);
  }

  public function eliminarVolcan($id)
  {
    $this->db->delete('nomvol', array('id_vol_dn' => $id));
  }
}
