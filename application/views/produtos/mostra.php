

<div class="container">
    <div class="row text-center pt-5">
        <div class="col-lg-12 ml-auto">                
            <div class="h2">
                <span class="text"><?= $produto["nome"] ?>,</span>
            </div>
            <div class="h2">
                <span class="text"><?= $produto["preco"] ?></span>
            </div>        
            <div class="h2">
                <span class="text"><?= auto_typography(html_escape($produto["descricao"])) ?></span>
            </div>            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="h3 p3">Compre agora mesmo!</div>
            <div class="form-group">
            
            <?php

            echo form_open("vendas/nova");

            echo form_hidden("produto_id", $produto["id"]);

            echo form_input(array(
                "name" => "data_entrega",
                "class" => "form-control p-3 m-3",
                "maxlength" => "255",
                "type" => "date",
                "pattern" => "dd/MM/yyyy"
            ));

            echo form_button(array(

                "class" => "btn btn-primary btn-block p-3 m-3",
                "content" => "Comprar",
                "type" => "submit"

            ));


            echo form_close();
            
            ?>

            </div>

        </div>
    </div>
</div>
