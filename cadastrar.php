<?php

 session_start();
include('verifica_login.php');

//require_once '../Estudio/classes/Funcoes.class.php';
//require_once '../Estudio/classes/Cliente.class.php';
//
//
//
//$objFc = new Funcoes ();
//$objCl = new Cliente();
//
//if(isset($_POST["btnSalvar"])){
//    
//    if($objCl->queryInsert($_POST) == 'ok'){
//      header("location: ../Estudio");
//        
//  }else{
//        //echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
//        
//  }
//    
//}




?>

<!DOCTYPE html>
<html lang="en">

<?php include_once 'Fragmentos/_head.php'; ?>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            <?php include_once 'Fragmentos/_menu.php'; ?>
           

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            
                            <div class="header-button">
                            
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/alice.jpg" alt="User />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Alice M.</a>

                            
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">Alice M.</a>
                                                    </h5>
                                                    
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
    <form method="POST" action="cadastraCliente.php" >   
   <div class="main-content">        
    <div class="col-lg-12">
        <div class="box">
            <header class="dark">
                <div class="icons"><i class="fa fa-check"></i></div>
                <h5>Cadastrar novo cliente</h5>
            </header>
            <div id="collapse2" class="body">
                <form class="form-horizontal" id="popup-validation">
                    <div class="row">
                      <div class="col-6">
                     <div class="form-group">
                      <label for="nome_Cliente" class="control-label mb-1">Nome</label>
                      <input type="text" name="nome" required=""   id="nome" class="form-control cc-exp" value=""  placeholder="Insira o nome completo">
                         </div>
                      </div>
                     <div class="col-6">
                         <label class="control-label col-lg-4" for="sexo_Cliente">Sexo</label>
                        <div class="col-6">
                            <select name="sexo" id="sexo"  required="required"  class="validate[required] form-control">
                                <option>Selecione </option>
                                <option value="Fem">Feminino</option>
                                <option value="">Masculino</option>
                            </select>

                  </div>
                    </div>
                      </div>
            </div>
            <div id="collapse2" class="body">
                <form class="form-horizontal"  id="popup-validation">
                    <div class="row">
                      <div class="col-4">
                     <div class="form-group">
                      <label for="cpf_Cliente" class="control-label mb-1">CPF</label>
                      <input id="CPF" type="text" name="cpf"  class="form-control cc-exp" value=""  placeholder="Apenas números"  type="text" maxlength="11" >
                         </div>
                      </div>
                   
                      <div class="form-group">
                     <label for="dataN_Cliente" class="control-label mb-1">Data de Nascimento</label>
                      <div class="col-10">
                          <input class="form-control" type="date"  name="data_Nasc" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="1930-01-01" max="2001-01-01" required=""  value="" id="nascimento">
                      </div>
                  </div>
                    </div>
                <div id="collapse2" class="body">
                <form class="form-horizontal" id="popup-validation">
                    <div class="row">
                      <div class="col-5">
                     <div class="form-group">
                      <label for="email_Cliente" class="control-label mb-1">E-mail</label>
                      <input id="email" type="text" name="email" required=""  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control cc-exp" value=""  placeholder="exemplo@email.com">
                         </div>
                      </div>
                    </div>
                    <div>
                     
                      <div class="col-md-6">
                     <div class="form-group">
                     <br><strong class="card-title">Contato</strong></br>
                 
                 </div>
                     </div>

                     <div class="row">
                      <div class="col-3">
                     <div class="form-group">


                      <label for="cc-exp" class="control-label mb-1">Tipo do contato</label>
                      <input id="tipo" name="tipo" type="tel" required=""  class="form-control cc-exp" value=""  placeholder="Residêncial, celular, recado, trabalho.." >
                         </div>
                      </div>
                   
                      <div class="col-4">
                     <div class="form-group">
                      <label for="cc-exp" class="control-label mb-1">Telefone 1</label>
                      <input id="telefone1" name="telefone1" required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                        OnKeyPress="formatar('## #####-####', this)" class="form-control cc-exp" value=""  placeholder="(XX)00000-0000">
                      </div>
                       </div>
                       <div class="col-4">
                     <div class="form-group">
                      <label for="cc-exp" class="control-label mb-1">Telefone 2</label>
                      <input id="telefone2" name="telefone2" type="text"  maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                        OnKeyPress="formatar('## #####-####', this)" class="form-control cc-exp" value=""  placeholder="(XX)00000-0000">
                         </div>
                      </div>
                     


                      </div>
                       <div class="col-md-6">
                    <div class="col-6">
                    <div class="form-group">
                 <br><strong class="card-title">Endereço</strong></br>
                  </div>
                    </div>
                      </div>
                       <div id="collapse2" class="body">
                <form class="form-horizontal" id="popup-validation">
                    <div class="row">
                      <div class="col-4">
                     <div class="form-group">
                      <label for="cc-exp" class="control-label mb-1">Rua</label>
                      <input id="rua" name="rua" type="tel" required="" class="form-control cc-exp" value=""  placeholder="Insira o nome da rua">
                         </div>
                      </div>
                      <div class="form-group">
                      <label for="numero" class="control-label col-lg-4">Número</label>
                      <input id="numero" name="numero" type="number" required="" class="form-control cc-exp" value=""
                      placeholder="Insira o número">
                         </div>
                         
                      <div class="col-3">
                         <div class="form-group">
                      <label for="cc-exp" class="control-label mb-1">CEP</label>
                      <input id="cep" name="cep"  value="" required="" type="search" maxlength="8" pattern="[0-9]+$"  class="form-control cc-exp" value=""
                      placeholder="Insira o CEP">
                         </div>
                         </div>
                      

                         <div id="collapse2" class="body">
                        <form class="form-horizontal" id="popup-validation">
                        <div class="row">
                         <div class="col-6">
                        <div class="form-group">
                          <label for="cc-exp" class="control-label mb-1">Referência</label>
                      <input id="referencia" name="referencia" required="" type="text" class="form-control cc-exp" value=""  placeholder="Casa, residêncial, condominio..">
                         </div>
                      </div>
                      <div class="col-4">
                      <div class="form-group">
                      <label for="cc-exp" class="control-label mb-1">Bairro</label>
                      <input id="bairro" name="bairro" type="text" required="" class="form-control cc-exp" value="" placeholder="Insirra o nome do Bairro">
                         </div>
                        </div>
                    </div>

                         <div id="collapse2" class="body">
                        <form class="form-horizontal" id="popup-validation">
                       <div class="row">
                         <div class="col-4">
                        <div class="form-group">
                          <label for="cc-exp" class="control-label mb-1">Cidade</label>
                      <input id="cidade" name="cidade" type="text" required="" class="form-control cc-exp" value=""  placeholder="Insirra o nome da Cidade">
                         </div>
                      </div>
                      <div class="col-3">
                      <div class="form-group">
                      <label for="cc-exp" required="" class="control-label col-lg-3">UF</label>
                     <select name="estado" required="" > 
                            <option value="estado">Selecione o Estado</option> 
                            <option value="ac">Acre</option> 
                            <option value="al">Alagoas</option> 
                            <option value="am">Amazonas</option> 
                            <option value="ap">Amapá</option> 
                            <option value="ba">Bahia</option> 
                            <option value="ce">Ceará</option> 
                            <option value="df">Distrito Federal</option> 
                            <option value="es">Espírito Santo</option> 
                            <option value="go">Goiás</option> 
                            <option value="ma">Maranhão</option> 
                            <option value="mt">Mato Grosso</option> 
                            <option value="ms">Mato Grosso do Sul</option> 
                            <option value="mg">Minas Gerais</option> 
                            <option value="pa">Pará</option> 
                            <option value="pb">Paraíba</option> 
                            <option value="pr">Paraná</option> 
                            <option value="pe">Pernambuco</option> 
                            <option value="pi">Piauí</option> 
                            <option value="rj">Rio de Janeiro</option> 
                            <option value="rn">Rio Grande do Norte</option> 
                            <option value="ro">Rondônia</option> 
                            <option value="rs">Rio Grande do Sul</option> 
                            <option value="rr">Roraima</option> 
                            <option value="sc">Santa Catarina</option> 
                            <option value="se">Sergipe</option> 
                            <option value="sp">São Paulo</option> 
                            <option value="to">Tocantins</option> 
                        </select>
                         </div>

                  
                         </div>
                             <div class="col-3">
                           <div class="form-group">
                          <label for="cc-exp" class="control-label mb-1">País</label>
                          <input id="pais" required="" name="pais" type="text" class="form-control cc-exp" value=""
                          placeholder="Insirra o nome do País">
                         </div>
                        </div>
                      </div>  
                         </div>

                  </div>

                      </div>

                        <div class="form-actions no-margin-bottom">
                            <button type="Submit"  class="btn btn-success" name="btnSalvar"  >Salvar</button>
                            <button type="Reset" class="btn btn-danger" name="btnCancelar" >Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->

</div>


                <?php include_once 'Fragmentos/_rodape.php'; ?>
            </div>
        </div>
    </div>
                </form>     


    <!-- Main JS-->
    <script src="js/main.js">
 


</script>

  <script type="text/javascript">
  


  </script>

</body>

</html>
<!-- end document-->
