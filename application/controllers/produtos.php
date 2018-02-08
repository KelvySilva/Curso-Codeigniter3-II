<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {
    
    public function index(){

       //Debugar
       //this->output->enable_profiler(TRUE);
        
        $this->load->model("produtos_model");

        $produtos = $this->produtos_model->findALl(); 

        $dados = array("produtos" => $produtos);
        
        $this->load->helper(array("currency"));
        $this->load->view("header.php");
        $this->load->view("/produtos/index.php", $dados);
        $this->load->view("footer.php");
    }

    public function formulario(){
        $this->load->view("header.php");
        $this->load->view("produtos/formulario");
        $this->load->view("footer.php");
    }

    public function novo(){
        $this->load->library("form_validation");

        //precisa ter prefixo callback em validacao customizada
        $this->form_validation->set_rules("nome","nome","required|min_length[5]|callback_nao_ter_palavra_melhro");
        $this->form_validation->set_rules("preco","preco","required");
        $this->form_validation->set_rules("descricao","descricao","trim|required|min_length[10]");

        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>", "</div>");


        $suc = $this->form_validation->run();
        if ($suc) {
            $usuarioLogado = $this->session->userdata("usuario_logado");
            $produto = array(
            "nome" => $this->input->post("nome"),
            "descricao" => $this->input->post("descricao"),
            "preco" => $this->input->post("preco"),
            "usuario_id" => $usuarioLogado["id"]

            );

            $this->load->model("produtos_model");
            $this->produtos_model->salva($produto);
            $this->session->set_flashdata("success", "Produto salvo com sucesso!");
            redirect("/");
        }else {
            $this->load->view("header.php");
            $this->load->view("produtos/formulario");
            $this->load->view("footer.php");
        }
    }

    public function mostra($id){
        $this->load->helper("typography"); 
        $this->load->model("produtos_model");
        $produto = $this->produtos_model->busca($id);
        $dados = array("produto" => $produto);
        $this->load->view("header.php");
        $this->load->view("produtos/mostra", $dados);
        $this->load->view("footer.php");
    }

    public function nao_ter_palavra_melhro($nome){
        $posicao = strpos($nome, "melhor" );
        if($posicao != false){
            return true;
        } else {
            $this->form_validation->set_message("nao_ter_palavra_melhro","o campo '%s' não pode ter a palavra melhor");
            return false;
        }
    }
}