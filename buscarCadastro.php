<?php

session_start();
include('verifica_login.php');

require_once 'init.php';

ini_set("display_errors", 1);
ini_set("display_startup_erros", 1);
error_reporting(E_ALL);

// abre a conexão
$PDO = db_connect();

// SQL para contar o total de registros
$sql_count = "SELECT COUNT(*) AS total FROM tb_cliente ORDER BY nome ASC";


// SQL para selecionar os registros
$sql = "SELECT 	id_cliente, nome, cpf, email  FROM  tb_cliente ORDER BY nome ASC";




$sql_condicao = "SELECT COUNT(*) AS id_cliente FROM tb_cliente
INNER JOIN tb_eventos ON tb_cliente.id_cliente = tb_eventos.id_cliente 
where tb_cliente.id_cliente = 3";




// conta o toal de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
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
                </div>
            </header>
            <!-- HEADER DESKTOP-->




            <!-- MAIN CONTENT-->


            <div class="main-content">


                        <!-- 
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
                                                   
                                                        <form class="form-header" action="" method="POST">
                                                            <input type="text" placeholder="Buscar" name="buscar" class="form-control">
                        
                                                        <button class="au-btn--submit" type="submit">
                                                            <i class="zmdi zmdi-search"></i>
                                                        </button>
                                                    </form>
                                                
                                                </div>
                                            </div>-->

                                            <div class="col-lg-12">
                                                <div class="box">
                                                    <header>
                                                        <div class="icons"><i class="fa fa-table"></i></div>
                                                        <h5>Cadastro</h5>

                                                    </header>
                                                    <div id="collapse4" class="body">
                                                        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th><p>CLIENTE(S) <?php echo $total ?></p></th>
                                                                    <?php if ($total > 0): ?>
                                                                        <table class="table" width="100%" border="1">
                                                                            <thead class="thead-dark">
                                                                                <tr>
                                                                                    <th>Código</th>
                                                                                    <th>Nome</th>
                                                                                    <th>CPF</th>
                                                                                    <th>EMAIL</th>
                                                                                    <th>Ações</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                                                                                    <tr>
                                                                                        <td><?php echo $user['id_cliente'] ?></td>
                                                                                        <td><?php echo $user['nome'] ?></td>
                                                                                        <td><?php echo $user['cpf'] ?></td>
                                                                                        <td><?php echo $user['email'] ?></td>

                                                                                        <td>
                                                                                            <div class="fa-hover col-lg-12 col-md-20">
                                                                                                <a href="form-edit.php?id_cliente=<?php echo $user['id_cliente'] ?>">
                                                                                                    <i class=" fa fa-pencil"></i> 


                                                                                              <?php if ($sql_condicao < 0): echo " cliente não pode ser apagado ";  ?>
                                                                   <a onclick="return confirm('cliente não pode ser removido!');">      
                                                                      

                                                                                                      

                                                                                                        <i class="fa  fa-times"></i>

                                                                        
                                                                                                    
                                                                                                 <?php else: ?>

                                                                                                    <a href="detele.php?id_cliente=<?php echo $user['id_cliente'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">
                                                                                                        <i class="fa  fa-times"></i>
                                                                                                        <?php endif; ?> 
                                                                                                    
                                                                                                  


                                                                                                       

                                                                                                    </div>

                                                                                               

                                                                                                </tr>
                                                                                            <?php endwhile; ?>
                                                                                        </tbody>
                                                                                    </table>

                                                                                    <?php else: ?>

                                                                                        <p>Nenhum usuário registrado</p>

                                                                                    <?php endif; ?>                         




                                                                                </tr>
                                                                            </thead>

                                                                            <div class="form-actions no-margin-bottom">
                                                                                <a href="imprimeCad.php" <button type="button" class="btn btn-outline-secondary btn-sm">
                                                                                    <i class="fa  fa-print"></i>&nbsp; RELATORIO CLIENTES</button></a>
                                                                                </div>      
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
