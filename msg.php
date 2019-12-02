<?php

function ExibirMsg($text)
{
    switch ($text)
    {

         case 0:

            echo'        <div class="alert alert-warnig">
                                Favor preencher todos(s) o(s) campo(s) obrigatórios(s)
                            </div>';
            break;
        
        case -3:

            echo'        <div class="alert alert-danger">
                                Empresa não foi encontrado!
                            </div>';
            break;
        
}

?>