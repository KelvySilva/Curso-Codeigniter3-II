<?php

class Usuarios_Model extends CI_Model {
    public function salva($usuario){
        $this->db->insert("usuarios", $usuario);
    }

    public function buscaEmailESenha($email, $senha){
        $this->db->where("email", $email);
        $this->db->where("senha", $senha);

        return $this->db->get("usuarios")->row_array();
    }
}