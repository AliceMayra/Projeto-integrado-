<?php

require_once 'Conexao.php';


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
                                                    <a href="#">
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
                    
                   
                    <div class="main-content">
                        

 
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <select name="sport" id="sport" required=""  class="validate[required] form-control">
                                        <option>Tipo</option>
                                        <option value="0 ">Código</option>
                                        <option value="1 ">Nome</option>
                               </select>
                                </div>

                                </div>
                        <div class="col-4">
                            <div class="form-group">
                           
                                <form class="form-header" action="buscaCad.php" enctype="multipart/form-data" method="POST">
                                    <input type="text" placeholder="Buscar" name="buscar" class="form-control">

                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                        
                        </div>
                    </div>

                        <div class="col-lg-10">
                            <div class="box">
                                <header>
                                    <div class="icons"><i class="fa fa-table"></i></div>
                                    <h5>Cadastro</h5>

                                </header>
                                <div id="collapse4" class="body">
                                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th><p>CLIENTE(S)</p></th>
                                   
                                     <table width="100%" border="1">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Nome</th>
                                                <th>Ações</th>
                                            </tr>
                                            <?php
                                            
                                            $sql_lista = mysql_query("select * from tb_cliente");
                                            $total_sql= mysql_num_rows($sql_lista);
                                            
                                            while ($sql_resultado = mysql_fetch_array($sql_lista)){
                                                
                                                $id_cliente = $sql_resultado ['id_cliente'];
                                                $nomeC = $sql_resultado ['nome'];
                                            
                                            
                                            
                                            
                                            ?>
                                            
                                        </thead>
                                          <tbody>
                                            
                                            <tr>
                                                <td><?php echo $id_cliente ?></td>
                                                <td><?php echo $nomeC ?></td>
                                              
                                                
                                                <?php
                                                }
                                            
                                                
                                                ?>
                                             
                                                <td>
                                                    <a href="form-edit.php?id_cliente=<?php echo $user['id_cliente'] ?>">Editar</a>
                                                    <a href="detele.php?id_cliente=<?php echo $user['id_cliente'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');"> <button type="Reset" class="btn btn-warning"   name="btnCancelar">< Voltar </button></a>
                                                   
                                                </td>
                                            </tr>
                                          
                                        </tbody>
                                    </table>

                               

                                    <p>Nenhum usuário registrado</p>

                                                    
                                    
                                               
                                                

                                            </tr>
                                        </thead>             
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                          
                     
            </div>
            <?php include_once 'Fragmentos/_rodape.php'; ?>

        </div>


        <!-- Main JS-->
        <script src="js/main.js"></script>

    </body>

    </html>
    <!-- end document-->
