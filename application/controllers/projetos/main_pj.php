<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main_pj extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');	
		$this->load->model('projetos/projetos_model');	
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

	public function projetos_rodando(){
		$data['projetos'] = $this->projetos_model->get_projetos_rodando();
		$this->load->view('Projetos/projetos_rodando', $data);
	}

	public function detalhar_projeto($codprojeto){
		$data['dados_projeto'] = $this->projetos_model->get_dados_projeto($codprojeto);
		$data['macrofases'] = $this->projetos_model->get_macrofases_projeto($codprojeto);
		$data['microfases'] = $this->projetos_model->get_microfases_projeto($codprojeto);
		$this->load->view('Projetos/detalhamento', $data);
	}

	public function criar_projetos(){
		$nome_projeto = $this->input->post('nome');
		if($nome_projeto == ""){
        	$this->load->view('Projetos/criar_projetos');
		}else{
			$input = array(
				"nome_projeto" => $nome_projeto,
				"descricao"    => $this->input->post('descricao'),
				"responsavel"  => $this->input->post('responsavel'),
				"data_inicio"  => $this->input->post('data_inicio'),
				"data_prevista_termino" => $this->input->post('data_prevista_termino')
			);
			$retorno = $this->projetos_model->criar_projetos($input);
				if($retorno == 1){
					echo "<script>alert('Seu projeto foi criado com suceso!!');
					window.location.assign('../main_pj/gerencia_projetos');</script>
					
					";
				}else{
					echo "<script>alert('Não foi possível criar seu projeto');
					window.location.assign('../main_pj/gerencia_projetos');</script>
					
					";
				}
		}
    }
	
}

