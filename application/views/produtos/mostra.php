

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
</div>