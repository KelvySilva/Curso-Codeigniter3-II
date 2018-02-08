<div class="jumbotron">
   <div class="container">

     <?php if($this->session->flashdata("success")) : ?>   
            <div class="alert alert-success" role="alert">
                  <?= $this->session->flashdata("success") ?>
            </div>
      <?php endif ?>
      <?php if($this->session->flashdata("danger")) : ?>   
            <div class="alert alert-danger" role="alert">
                  <?= $this->session->flashdata("danger") ?>
            </div>
      <?php endif ?>
        

        
                         
      <h1 class="pt-2 pb-2">Produtos</h1>
   <table class="table table-inverse table-bordered rounded">
         <thead>
               <tr class="">
                  <th>#</th>
                  <th>Nome</th>
                  <th>Descricao</th>
                  <th>Preco</th>
               </tr>
         </thead>
         <tbody>
               <?php foreach($produtos as $produto) : ?>
                  <tr>
                     <td><?= $produto['id'] ?></td>
                     <td>
                        <?= anchor("produtos/{$produto['id']}", $produto["nome"]) ?>
                     </td>                
                     <td><?= character_limiter($produto['descricao'],10) ?></td>                
                     <td><?= valorEmReais($produto['preco']) ?></td>
                  </tr>     
               <?php endforeach ?>            
         </tbody>
      </table>



      <div class="row">
         
      <div class="col-lg-6 col-md-6 col-sm-6">
            <h1>Cadastro</h1>
               <div class="form-group">
               <?php
                     echo form_open("usuarios/novo");

                     //dá pra usar form_label para o label
                     echo form_input(array(
                           "name" => "nome",
                           "class" => "form-control p-3 m-3",
                           "placeholder" => "Nome",
                           "maclength" => "255"
                     ));

                     echo form_input(array(
                           "name" => "email",
                           "class" => "form-control p-3 m-3",
                           "placeholder" => "Email",
                           "type" => "email",
                           "maclength" => "255"
                     ));
                     //pode usar form_password
                     echo form_input(array(
                           "name" => "senha",
                           "class" => "form-control p-3 m-3",
                           "placeholder" => "Senha",
                           "type" => "password",
                           "maclength" => "255"
                     ));

                     echo form_button(array(
                           "class" => "btn btn-primary btn-block p-3 m-3",
                           "type" => "submit",
                           "content"=> "Cadastrar"
                     ));
                     echo form_close();
                  ?> 
            </div>

         </div>   
         <div class="col-lg-6 col-md-6 col-sm-6">
         <?php if ($this->session->userdata("usuario_logado")) :  ?>
             <h1>Sair</h1>        
             <div class="form-group text-center">
             <?= anchor('produtos/formulario', 'Cadastro de Produtos', array("class" => "btn btn-primary p-3 m-3 btn-block")); ?>
             <?= anchor('login/logout', 'Logout', array("class" => "btn btn-primary p-3 m-3 btn-block")); ?>
             </div>        

                         <?php else : ?>


                         <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                          <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                                          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button> -->
                                          </div>      
                                          <div class="modal-body">
                                          <?php
                                          echo form_open("login/autenticar");

                                          echo form_input(array(
                                                "name" => "email",
                                                "class" => "form-control p-3 m-3",
                                                "placeholder" => "Email",
                                                "type" => "email",
                                                "maclength" => "255"
                                          ));
                                          //pode usar form_password
                                          echo form_input(array(
                                                "name" => "senha",
                                                "class" => "form-control p-3 m-3",
                                                "placeholder" => "Senha",
                                                "type" => "password",
                                                "maclength" => "255"
                                          ));

                                          echo form_button(array(
                                                "class" => "btn btn-primary btn-block p-3 m-3",
                                                "type" => "submit",
                                                "content"=> "Login"
                                          ));
                                          
                                          echo form_close();               
                                          ?>
                                          </div>
                                         
                                    </div>
                              </div>
                        </div>

                        <?php endif ?>
                  </div>
          </div>
      </div>
   </div>
</div>

