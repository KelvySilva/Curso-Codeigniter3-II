<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {
    public function autenticar(){
        $this->load->model("usuarios_model");
        $email = $this->input->post("email");
        $senha = md5($this->input->post("senha"));
        $usuario = $this->usuarios_model->buscaEmailESenha($email, $senha);
        if ($usuario) {
            $this->session->set_userdata(array("usuario_logado" => $usuario));
            $this->session->set_flashdata("success", "Logado com sucesso!");
            $dados = array("mensagem" => "Logado com sucesso!", "classe" => "alert alert-success");
        }else {
            $this->session->set_flashdata("danger", "Usuário ou senha incorreta!");
        }
        // $this->load->view("header.php");
        // $this->load->view("login/autenticar", $dados);
        // $this->load->view("footer.php");
        redirect('/');
    }

    public function logout(){
        $this->session->unset_userdata(array("usuario_logado"));
        $this->session->set_flashdata("success", "Deslogado com sucesso!");
        redirect('/');
      
    }
}