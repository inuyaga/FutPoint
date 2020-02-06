<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_acciones');
    }

    public function index()
    {
        $this->load->view('base_header');
        $this->load->view('inicio/index');
        $this->load->view('base_footer');
    }

    public function registrar()
    {
        $this->load->view('base_header');
        $this->load->view('inicio/registro');
        $this->load->view('base_footer');
    }

    public function nuevo_user()
    {
        $in_correo    = $this->input->post('in_correo');
        $in_pass      = $this->input->post('in_pass');
        $in_nombre    = $this->input->post('in_nombre');
        $in_telefono  = $this->input->post('in_telefono');
        $in_direccion = $this->input->post('in_direccion');

        // VALIDAMOS LOS CAMPOS QUE NO ESTEN VACION

        if ($in_correo == "" || $in_pass == "" || $in_nombre == "" || $in_telefono == "" || $in_direccion == "") {
            $this->session->set_flashdata('mensaje',
                '<div class="alert alert-danger">
				<strong>Error!</strong> Debe de rellenar los campos
			</div>'
            );
            redirect('Welcome/registrar', 'refresh');
        } else {

            // VALIDAMOS QUE NO EXISTA EL MISMO CORREO

            $qry = $this->M_acciones->get_user_email($in_correo);

            foreach ($qry->result() as $key) {
                $this->session->set_flashdata('mensaje',
                    '<div class="alert alert-danger">
				<strong>Error!</strong> Ya Existe un usuario con el correo ' . $in_correo . '
			</div>'
                );
                redirect('Welcome/registrar', 'refresh');
            }

            // HACEMOS LAS INSERCIONES CORRESPONDIENTE

            $data = array(
                'us_correo'    => $in_correo,
                'us_nombre'    => $in_nombre,
                'us_telefono'  => $in_telefono,
                'us_direccion' => $in_direccion,
                'us_pass'      => $in_pass,
            );

            $resp = $this->M_acciones->RegistrarUser($data);

            if ($resp > 0) {

                $this->session->set_flashdata('mensaje',
                    '<div class="alert alert-success">
				<strong>Ok!</strong> Registro exitoso
			</div>'
                );
                redirect('Welcome/index', 'refresh');
            }

        }

    }

    public function Iniciar()
    {
        $this->load->view('base_header');
        $this->load->view('inicio/login');
        $this->load->view('base_footer');
    }

    public function Login()
    {
        $in_correo = $this->input->post('in_correo');
        $in_pass   = $this->input->post('in_pass');

        $data = $this->M_acciones->loguear($in_correo, $in_pass);

        $usuario;
        // NOS LOGUEAMOS Y LA SESION LO GUARDAMOS EN VARIABLES GLOBALES DE session
        foreach ($data->result() as $key) {
            $this->session->activo      = true;
            $usuario['us_correo']       = $key->us_correo;
            $usuario['us_nombre']       = $key->us_nombre;
            $usuario['us_telefono']     = $key->us_telefono;
            $usuario['us_direccion']    = $key->us_direccion;
            $usuario['us_is_superuser'] = $key->us_is_superuser;
            $this->session->user        = $usuario;
            redirect('Welcome', 'refresh');
        }

        $this->session->set_flashdata('mensaje',
            '<div class="alert alert-danger">
				<strong>Error!</strong> No existe el usuario
			</div>'
        );
        redirect('Welcome/Iniciar', 'refresh');

    }

    public function CerrarSesion()
    {
        session_unset();
        redirect(base_url());
    }

    public function ListUser()
    {
        $data["users"] = $this->M_acciones->usuarios();
        $this->load->view('base_header');
        $this->load->view('inicio/list_user', $data);
        $this->load->view('base_footer');
    }

    public function UserUpdate($id)
    {
        $data["user"] = $this->M_acciones->get_user($id)->result();
        $this->load->view('base_header');
        $this->load->view('inicio/edit_user', $data);
        $this->load->view('base_footer');
    }

    public function user_update($id)
    {
        $in_correo    = $this->input->post('in_correo');
        $in_pass      = $this->input->post('in_pass');
        $in_nombre    = $this->input->post('in_nombre');
        $in_telefono  = $this->input->post('in_telefono');
        $in_direccion = $this->input->post('in_direccion');
        $tip_user     = $this->input->post('tip_user');
        // ACTUALIZAMOS REGISTROS DE USUARIOS
        $data = array(
            'us_correo'       => $in_correo,
            'us_pass'         => $in_pass,
            'us_nombre'       => $in_nombre,
            'us_telefono'     => $in_telefono,
            'us_direccion'    => $in_direccion,
            'us_is_superuser' => $tip_user,
        );

        $resultado = $this->M_acciones->ActualizarUser($data, $id);

        if ($resultado > 0) {
            $this->session->set_flashdata('mensaje',
                '<div class="alert alert-success">
				<strong>Ok!</strong> Actualizacion exitoso
			</div>'
            );
            redirect('welcome/ListUser/', 'refresh');
        }

    }

    public function Confirmacion($u_id)
    {
        // HACEMOS CONFIRMACION DE ELIMINACION
        $id = $this->input->post('id');
        if (is_null($id)) {
            $data['user'] = $u_id;
            $this->load->view('base_header');
            $this->load->view('inicio/confirmacion', $data);
            $this->load->view('base_footer');
        } else {
            $this->M_acciones->DeleteUser($id);
            redirect('welcome/ListUser/', 'refresh');
        }

    }

    public function PaisList()
    {
        $data['paises'] = $this->M_acciones->Paises();
        $this->load->view('base_header');
        $this->load->view('pais/pais_list', $data);
        $this->load->view('base_footer');
    }

    public function PaisCreate()
    {
        $pais_nombre = $this->input->post('pais_nombre');

        if (is_null($pais_nombre)) {
            $this->load->view('base_header');
            $this->load->view('pais/create');
            $this->load->view('base_footer');
        } else {
            $data = array('pais_nombre' => $pais_nombre);

            $resp = $this->M_acciones->AddPais($data);
            if ($resp > 0) {
                $this->session->set_flashdata('mensaje',
                    '<div class="alert alert-success">
				<strong>Ok!</strong> Registro exitoso
			</div>'
                );
                redirect('Welcome/PaisList', 'refresh');
            }

        }

    }

    public function PaisDelete($obj_id)
    {
        $id = $this->input->post('id');
        if (is_null($id)) {
            $data['user'] = $obj_id;
            $this->load->view('base_header');
            $this->load->view('inicio/confirmacion', $data);
            $this->load->view('base_footer');
        } else {
            $this->M_acciones->DeletePais($id);
            redirect('welcome/PaisList/', 'refresh');
        }
    }

    public function PaisUpdate($obj_id)
    {
        $pais_nombre = $this->input->post('pais_nombre');
        if (is_null($pais_nombre)) {
            $data['obj'] = $this->M_acciones->get_pais($obj_id)->result();
            $this->load->view('base_header');
            $this->load->view('pais/create', $data);
            $this->load->view('base_footer');
        } else {
            $data = array('pais_nombre' => $pais_nombre);
            $this->M_acciones->UpdatePais($data, $obj_id);
            redirect('welcome/PaisList/', 'refresh');
        }
    }

    public function PartidoList()
    {
        $data['partidos'] = $this->M_acciones->get_partidos();
        $this->load->view('base_header');
        $this->load->view('partidos/listar', $data);
        $this->load->view('base_footer');
        $this->load->view('partidos/script');
    }

    public function PartidoAdd()
    {
        $pt_date_f      = $this->input->post('pt_date_f');
        $pt_date_h      = $this->input->post('pt_date_h');
        $pt_status      = $this->input->post('pt_status');
        $pt_pais_uno_id = $this->input->post('pt_pais_uno_id');
        $pt_pais_dos_id = $this->input->post('pt_pais_dos_id');

        if (is_null($pt_date_f) && is_null($pt_date_h) && is_null($pt_status) && is_null($pt_pais_uno_id) && is_null($pt_pais_dos_id)) {
            $data['paises'] = $this->M_acciones->Paises();
            $this->load->view('base_header');
            $this->load->view('partidos/crear', $data);
            $this->load->view('base_footer');
        } else {

            $data = array(
                'pt_date'        => $pt_date_f . " " . $pt_date_h,
                'pt_status'      => $pt_status,
                'pt_pais_uno_id' => $pt_pais_uno_id,
                'pt_pais_dos_id' => $pt_pais_dos_id,
            );

            $respuesta = $this->M_acciones->AddPartidos($data);
            if ($respuesta > 0) {
                $this->session->set_flashdata('mensaje',
                    '<div class="alert alert-success">
						<strong>Ok!</strong> Registro exitoso
					</div>'
                );
                redirect('Welcome/PartidoList', 'refresh');}
        }

    }

    public function AddGool()
    {
        // FUNCIONES ESPECIFICAS PARA EL JSON
        $IDPartido  = $this->input->post('IDPartido');
        $num_equipo = $this->input->post('num_equipo');
        $Tipo       = $this->input->post('Tipo');

        if ($Tipo == "+") {
            $respuesta = $this->M_acciones->SumGolPartido($IDPartido, $num_equipo);
        } else {
            $respuesta = $this->M_acciones->RestGolPartido($IDPartido, $num_equipo);
        }
    }

    public function FinisPartido()
    {
        // FUNCIONES ESPECIFICAS PARA EL JSON
        $IDPartido = $this->input->post('IDPartido');
        $this->M_acciones->FinalizePartido($IDPartido);
    }

}
