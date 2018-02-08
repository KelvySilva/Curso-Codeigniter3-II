<?php

class Vendas_Model extends CI_Model {
    public function salva($venda){
        $this->db->insert("vendas", $venda);
    }
}