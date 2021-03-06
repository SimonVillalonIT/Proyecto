<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buscador_controller extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Buscador_model");        
    }
	public function buscar(){
        $query = $this->Buscador_model->buscar();
        echo json_encode($query);
     }
     public function paginabusquedas(){
        $palabra = $this->input->post('keyword');
        if(empty($palabra)){
            $datos['resultado']="error";
        $this->load->view('Busquedas_view',$datos);
        }else{
        $datos['resultado'] = $this->Buscador_model->mostrarbusqueda($palabra);
        $this->load->view('Busquedas_view',$datos);
        }}
    }
    

?>