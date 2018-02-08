<?php

function valorEmReais($valor){
    return "R$ " . number_format($valor, 2,",",".");

}