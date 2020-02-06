<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_acciones extends CI_Model
{

    public function RegistrarUser($datos)
    {
        $this->db->insert('fp_user', $datos);
        return $this->db->affected_rows();
    }

    public function loguear($usr, $pass)
    {
        $this->db->select('*');
        $this->db->from('fp_user');
        $this->db->where('us_correo', $usr);
        $this->db->where('us_pass', $pass);
        return $this->db->get();
    }

    public function usuarios()
    {
        $this->db->select('*');
        $this->db->from('fp_user');
        return $this->db->get();
    }

    public function get_user($id)
    {
        $this->db->select('*');
        $this->db->from('fp_user');
        $this->db->where('us_id', $id);
        return $this->db->get();
    }

    public function get_user_email($email)
    {
        $this->db->select('*');
        $this->db->from('fp_user');
        $this->db->where('us_correo', $email);
        return $this->db->get();
    }

    public function ActualizarUser($data, $id)
    {
        $this->db->set($data);
        $this->db->where('us_id', $id);
        $this->db->update('fp_user');
        return $this->db->affected_rows();
    }

    public function DeleteUser($id)
    {
        $this->db->where('us_id', $id);
        $this->db->delete('fp_user');
    }

    public function Paises()
    {
        $this->db->select('*');
        $this->db->from('fp_pais');
        return $this->db->get();
    }

    public function AddPais($datos)
    {
        $this->db->insert('fp_pais', $datos);
        return $this->db->affected_rows();
    }

    public function DeletePais($id)
    {
        $this->db->where('pais_id', $id);
        $this->db->delete('fp_pais');
    }

    public function get_pais($id)
    {
        $this->db->select('*');
        $this->db->from('fp_pais');
        $this->db->where('pais_id', $id);
        return $this->db->get();
    }

    public function UpdatePais($data, $id)
    {
        $this->db->set($data);
        $this->db->where('pais_id', $id);
        $this->db->update('fp_pais');
        return $this->db->affected_rows();
    }

    public function get_partidos()
    {
        $this->db->select('pt_id');
        $this->db->select('pt_date');
        $this->db->select('pt_status');
        $this->db->select('pt_pais_uno_anotacion');
        $this->db->select('pt_pais_dos_anotacion');
        $this->db->select('p1.pais_nombre AS pais_uno_nombre');
        $this->db->select('p2.pais_nombre AS pais_udos_nombre');
        $this->db->from('fp_partidos');
        $this->db->join('fp_pais AS p1', 'fp_partidos.pt_pais_uno_id = p1.pais_id');
        $this->db->join('fp_pais AS p2', 'fp_partidos.pt_pais_dos_id = p2.pais_id');
        return $this->db->get();
    }

    public function AddPartidos($datos)
    {
        $this->db->insert('fp_partidos', $datos);
        return $this->db->affected_rows();
    }

    public function SumGolPartido($ID, $num_equipo)
    {
        if ($num_equipo == 1) {
            $this->db->set('pt_pais_uno_anotacion', 'pt_pais_uno_anotacion + 1', false);
        } else {
            $this->db->set('pt_pais_dos_anotacion', 'pt_pais_dos_anotacion + 1', false);
        }
        $this->db->where('pt_id', $ID);
        $this->db->update('fp_partidos');

        return $this->db->affected_rows();
    }

    public function RestGolPartido($ID, $num_equipo)
    {
        if ($num_equipo == 1) {
            $this->db->set('pt_pais_uno_anotacion', 'pt_pais_uno_anotacion - 1', false);
        } else {
            $this->db->set('pt_pais_dos_anotacion', 'pt_pais_dos_anotacion - 1', false);
        }
        $this->db->where('pt_id', $ID);
        $this->db->update('fp_partidos');

        return $this->db->affected_rows();
    }

    public function FinalizePartido($ID)
    {
        $this->db->set('pt_status', 2);
        $this->db->where('pt_id', $ID);
        $this->db->update('fp_partidos');

        return $this->db->affected_rows();
    }

}

/* End of file M_acciones.php */
/* Location: ./application/models/M_acciones.php */
