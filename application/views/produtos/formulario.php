<div class="container jumbotron">
<div class="row">
         
      <div class="col-lg-6 col-md-6 col-sm-6">
            <h1>Cadastro</h1>

            <!-- pode ter a validacao aqui -->
            <!-- validation_errors("<div class='alert alert-danger'>","</div>") -->


               <div class="form-group">


<?php 
 echo form_open("produtos/novo");

 echo form_input(array(
       "name" => "nome",
       "class" => "form-control p-3 m-3",
       "placeholder" => "Nome",
       "maclength" => "255",
       "value" => set_value("nome","")
 ));
 echo form_error("nome");
 
 echo form_input(array(
       "name" => "preco",
       "class" => "form-control p-3 m-3",
       "placeholder" => "Preco",
       "type" => "number",
       "maclength" => "255",
       "preco" => set_value("preco","")
 ));
 echo form_error("preco");

echo form_textarea(array(
    "name" => "descricao",
    "class" => "form-control p-3 m-3",
    "placeholder" => "Descrição",
    "descricao" => set_value("descricao","")
));
echo form_error("descricao");

echo form_button(array(
    "class" => "btn btn-primary btn-block p-3 m-3",
    "type" => "submit",
    "content"=> "Cadastrar"
));

 echo form_close();


?>
            </div>
        </div>
    </div>
</div>