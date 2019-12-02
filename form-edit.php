<?php
session_start();
include('verifica_login.php');

include_once 'init.php';

// pega o ID da URL
$id = isset($_GET['id_cliente']) ? (int) $_GET['id_cliente'] : null;
 
// valida o ID
if (empty($id))
{
    echo "ID para alteração não definido";
    exit;
}
 
// busca os dados du usuário a ser editado
$PDO = db_connect();
$sql = "SELECT nome, sexo, cpf, data_Nasc, email, rua, numero, cep, cidade, bairro, estado, pais, referencia, tipo, telefone1,telefone2 FROM  tb_cliente  WHERE id_cliente = :id_cliente";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_cliente', $id, PDO::PARAM_INT);
 
$stmt->execute();
 
$user = $stmt->fetch(PDO::FETCH_ASSOC);
 
// se o método fetch() não retornar um array, significa que o ID não corresponde a um usuário válido
if (!is_array($user))
{
    echo "Nenhum usuário encontrado";
    exit;
}







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


            <form  action="edit.php" method="post" >   
   <div class="main-content">        
    <div class="col-lg-12">
        <div class="box">
            <header class="dark">
                <div class="icons"><i class="fa fa-check"></i></div>
                <h5>CADASTRO DE CLIENTES</h5>
            </header>
            <div id="collapse2" class="body">
                <form class="form-horizontal" id="popup-validation">
                    <div class="row">
                      <div class="col-6">
                     <div class="form-group">
                      <label for="nome_Cliente" class="control-label mb-1">Nome</label>
                      <input type="text" name="nome"   id="nome_Cliente" class="form-control cc-exp" value="<?php echo $user['nome'] ?>"  placeholder="Insira o nome completo">
                         </div>
                      </div>
                     <div class="col-6">
                         <label class="control-label col-lg-4" for="sexo_Cliente">Sexo</label>
                        <div class="col-6">
                            
                          
                            <select name="sexo" id="sexo_Cliente" required=""   class="validate[required] form-control">
                                <option>Selecione</option>
                                <option value="Fem" <?php echo $user ['sexo']=='Fem'?'selected':'';?>>Feminino</option>
                                <option value="Mas" <?php echo $user ['sexo']=='Mas'?'selected':'';?>>Masculino</option>
                            </select>


                  </div>
                    </div>
                      </div>
            </div>
            <div id="collapse2" class="body">
                <form class="form-horizontal" id="popup-validation">
                    <div class="row">
                      <div class="col-4">
                     <div class="form-group">
                      <label for="cpf_Cliente" class="control-label mb-1">CPF</label>
                      <input id="cpf_Cliente" type="text" name="cpf"  class="form-control cc-exp" value="<?php echo $user['cpf'] ?>"  placeholder="Apenas números"  type="text" maxlength="11" pattern="[0-9]+$">
                         </div>
                      </div>
                   
                      <div class="form-group">
                     <label for="dataN_Cliente" class="control-label mb-1">Data de Nascimento</label>
                      <div class="col-10">
                          <input <input id="dataN_Cliente" type="date" name="data_Nasc"  class="form-control cc-exp" value="<?php echo $user['data_Nasc'] ?>">
                      </div>
                  </div>
                    </div>
                <div id="collapse2" class="body">
                <form class="form-horizontal" id="popup-validation">
                    <div class="row">
                      <div class="col-5">
                     <div class="form-group">
                      <label for="email_Cliente" class="control-label mb-1">E-mail</label>
                      <input id="email_Cliente" type="text" name="email"   class="form-control cc-exp" value=" <?php echo $user['email'] ?>"  placeholder="exemplo@email.com">
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
                      <input id="cc-exp" name="tipo" type="tel"   class="form-control cc-exp" value="<?php echo $user['tipo'] ?>"  placeholder="Residêncial, celular, recado, trabalho.." >
                         </div>
                      </div>
                   
                      <div class="col-4">
                     <div class="form-group">
                      <label for="cc-exp" class="control-label mb-1">Telefone 1</label>
                      <input id="cc-exp" name="telefone1" value="<?php echo $user['telefone1'] ?>" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                        OnKeyPress="formatar('## #####-####', this)" class="form-control cc-exp" value=""  placeholder="(XX)00000-0000">
                      </div>
                       </div>
                       <div class="col-4">
                     <div class="form-group">
                      <label for="cc-exp" class="control-label mb-1">Telefone 2</label>
                      <input id="cc-exp" name="telefone2" value="<?php echo $user['telefone2'] ?>" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
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
                      <input id="cc-exp" name="rua" type="tel"  class="form-control cc-exp" value="<?php echo $user['rua'] ?>"  placeholder="Insira o nome da rua">
                         </div>
                      </div>
                      <div class="form-group">
                      <label for="cc-exp" class="control-label col-lg-4">Número</label>
                      <input id="cc-exp" name="numero" type="tel" value="<?php echo $user['numero']?>"  class="form-control cc-exp"
                      placeholder="Insira o número">
                         </div>
                         
                      <div class="col-3">
                         <div class="form-group">
                      <label for="cc-exp" class="control-label mb-1">CEP</label>
                      <input id="cc-exp" name="cep"  value="<?php echo $user['cep'] ?>" type="search" maxlength="8" pattern="[0-9]+$"  class="form-control cc-exp" value=""
                      placeholder="Insira o CEP">
                         </div>
                         </div>
                      

                         <div id="collapse2" class="body">
                        <form class="form-horizontal" id="popup-validation">
                        <div class="row">
                         <div class="col-6">
                        <div class="form-group">
                          <label for="cc-exp" class="control-label mb-1">Referência</label>
                      <input id="cc-exp" name="referencia"  type="text" class="form-control cc-exp" value="<?php echo $user['referencia'] ?>"  placeholder="Casa, residêncial, condominio..">
                         </div>
                      </div>
                      <div class="col-4">
                      <div class="form-group">
                      <label for="cc-exp" class="control-label mb-1">Bairro</label>
                      <input id="cc-exp" name="bairro" type="text"  class="form-control cc-exp" value="<?php echo $user['bairro'] ?>" placeholder="Insirra o nome do Bairro">
                         </div>
                        </div>
                    </div>

                         <div id="collapse2" class="body">
                        <form class="form-horizontal" id="popup-validation">
                       <div class="row">
                         <div class="col-4">
                        <div class="form-group">
                          <label for="cc-exp" class="control-label mb-1">Cidade</label>
                      <input id="cc-exp" name="cidade" type="text" class="form-control cc-exp" value="<?php echo $user['cidade'] ?>"  placeholder="Insirra o nome da Cidade">
                         </div>
                      </div>
                      <div class="col-3">
                      <div class="form-group">
                      <label for="cc-exp" class="control-label col-lg-4">UF</label>
                     <select name="estado" > 
                            <option value="estado">Selecione o Estado</option> 
                            <option value="ac" <?php echo $user ['estado']=='ac'?'selected':'';?> >Acre</option> 
                            <option value="al" <?php echo $user ['estado']=='al'?'selected':'';?> >Alagoas</option> 
                            <option value="am" <?php echo $user ['estado']=='am'?'selected':'';?> >Amazonas</option> 
                            <option value="ap" <?php echo $user ['estado']=='ap'?'selected':'';?> >Amapá</option> 
                            <option value="ba" <?php echo $user ['estado']=='ba'?'selected':'';?>  >Bahia</option> 
                            <option value="ce" <?php echo $user ['estado']=='ce'?'selected':'';?> >Ceará</option> 
                            <option value="df" <?php echo $user ['estado']=='df'?'selected':'';?> >Distrito Federal</option> 
                            <option value="es" <?php echo $user ['estado']=='es'?'selected':'';?> >Espírito Santo</option> 
                            <option value="go" <?php echo $user ['estado']=='go'?'selected':'';?> >Goiás</option> 
                            <option value="ma" <?php echo $user ['estado']=='ma'?'selected':'';?> >Maranhão</option> 
                            <option value="mt" <?php echo $user ['estado']=='mt'?'selected':'';?> >Mato Grosso</option> 
                            <option value="ms" <?php echo $user ['estado']=='ms'?'selected':'';?> >Mato Grosso do Sul</option> 
                            <option value="mg" <?php echo $user ['estado']=='mg'?'selected':'';?> >Minas Gerais</option> 
                            <option value="pa" <?php echo $user ['estado']=='pa'?'selected':'';?> >Pará</option> 
                            <option value="pb" <?php echo $user ['estado']=='pb'?'selected':'';?> >Paraíba</option> 
                            <option value="pr" <?php echo $user ['estado']=='pr'?'selected':'';?>  >Paraná</option> 
                            <option value="pe" <?php echo $user ['estado']=='pe'?'selected':'';?> >Pernambuco</option> 
                            <option value="pi" <?php echo $user ['estado']=='pi'?'selected':'';?> >Piauí</option> 
                            <option value="rj" <?php echo $user ['estado']=='rj'?'selected':'';?>  >Rio de Janeiro</option> 
                            <option value="rn" <?php echo $user ['estado']=='rn'?'selected':'';?> >Rio Grande do Norte</option> 
                            <option value="ro" <?php echo $user ['estado']=='ro'?'selected':'';?> >Rondônia</option> 
                            <option value="rs" <?php echo $user ['estado']=='rs'?'selected':'';?> >Rio Grande do Sul</option> 
                            <option value="rr" <?php echo $user ['estado']=='rr'?'selected':'';?> >Roraima</option> 
                            <option value="sc" <?php echo $user ['estado']=='sc'?'selected':'';?> >Santa Catarina</option> 
                            <option value="se" <?php echo $user ['estado']=='se'?'selected':'';?> >Sergipe</option> 
                            <option value="sp" <?php echo $user ['estado']=='sp'?'selected':'';?> >São Paulo</option> 
                            <option value="to" <?php echo $user ['estado']=='to'?'selected':'';?> >Tocantins</option> 
                        </select>
                         </div>

                  
                         </div>
                             <div class="col-3">
                           <div class="form-group">
                          <label for="cc-exp" class="control-label mb-1">País</label>
                          <input id="cc-exp" name="pais" type="text" class="form-control cc-exp" value="<?php echo $user['pais'] ?>"
                          placeholder="Insirra o nome do País">
                         </div>
                        </div>
                      </div>  
                         </div>

                  </div>

                      </div>

                        <div class="form-actions no-margin-bottom">
                             <input type="hidden" name="id" value="<?php echo $id ?>">
                             
                             <a href="buscarCadastro.php"><button type="Reset" class="btn btn-warning"   name="btnCancelar">< Voltar </button></a>
                            <button type="Submit" class="btn btn-success" name="btnalterar">alterar</button>
                          
                     
                           
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
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->

