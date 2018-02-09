<?php
class Migration_Adiciona_Campo_Vendido_Em_Produtos extends CI_Migration {

    public function up(){
        $this->dbforge->add_column('produtos', array(
            'vendido' => arra(
                'type' => 'boolean',
                'default' => '0'
            )
        ));
    }

    public function down(){
        $this->dbforge->drop_column('produtos','vendido');
    }

} 