<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main_pj extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');	
		$this->load->library('session');
		$this->load->library('email');

	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('Projetos/main_pj');
	}

    public function gerencia_projetos(){
        $this->load->view('Projetos/gerencia_projetos');
    }

	public function criar_projetos(){
        $this->load->view('Projetos/criar_projetos');
    }
	
}

