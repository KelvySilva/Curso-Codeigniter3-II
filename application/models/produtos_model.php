 <?php

 class Produtos_Model extends CI_Model {
     public function findAll(){
         return $this->db->get("produtos")->result_array();
     }

     public function salva($produto){
        $this->db->insert("produtos", $produto);
     }

     public function busca($id){
         return $this->db->get_where("produtos", array(
             "id" => $id
         ))->row_array();
     }
     
 }