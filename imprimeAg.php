<?php

include_once 'init.php';

// pega o ID da URL
$id = isset($_GET['id_eventos']) ? (int) $_GET['id_eventos'] : null;
 
// valida o ID
if (empty($id))
{
    echo "ID para alteração não definido";
    exit;
}
 
// busca os dados du usuário a ser editado
$PDO = db_connect();
$sql = "SELECT tipo_evento, data_evento, prof_eventos, descricao_evento  FROM  tb_eventos  WHERE id_eventos = :id_eventos";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_eventos', $id, PDO::PARAM_INT);
 
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





                    <form method="POST" action="edite-agenda.php" >  

                    <!-- MAIN CONTENT-->
                    <div class="main-content">
                        <div class="col-lg-12">
                            <div class="box">

                                <div class="card">
                                    <div class="card-header">
                                        <strong>DADOS DO EVENTO </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            
                                    
                                            
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Selecione o cliente</label>
                                                </div>

                                                <div class="col-6">
                                                    <select name="nome" id="nome_Cliente" required=""   class="validate[required] form-control">
                                                        <option>Selecione</option>
                                                        <?php
                                                        $conn = mysqli_connect('localhost', 'root', '');
                                                        mysqli_select_db($conn, "estudio_bd");

                                                        if (!$conn) {
                                                            die("Não foi possivel conectar ao banco de dados; " . mysqli_connect_error($conn));
                                                        } else {
                                                            echo " ";
                                                        }

                                                        $result_cat = "SELECT * FROM tb_cliente ORDER BY nome";
                                                        $resultado_cat = mysqli_query($conn, $result_cat);
                                                        while($row_cat = mysqli_fetch_assoc($resultado_cat) ) {
                                                                echo '<option value="'.$row_cat['id_cliente'].'">'.$row_cat['nome'].'</option>';
                                                        }
                                                        
                                                        $conn->close();
                                                ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Tipo do evento</label>
                                                </div>

                                                <div class="col-6">
                                                    <select name="tipo_evento" id="" required="" disabled=""  class="validate[required] form-control">
                                                        <option>Selecione</option>
                                                        <option value="Casamento"<?php echo $user ['tipo_evento']=='Casamento'?'selected':'';?>>Casamento</option>
                                                        <option value="Aniversario Infantil"<?php echo $user ['tipo_evento']=='Aniversario Infantil'?'selected':'';?>>Aniversario Infantil</option>
                                                        <option value="Aniversario 15 Anos" <?php echo $user ['tipo_evento']=='Aniversario 15 Anos'?'selected':'';?>>Aniversario 15 Anos</option>
                                                        <option value="Sessão de fotos"<?php echo $user ['tipo_evento']=='Sessão de fotos'?'selected':'';?>>Sessão de fotos</option>
                                                    </select>

                                                </div>
                                            </div>
                                             <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Data do evento</label>
                                            </div>
                                            <div class="col-6">
                                            <input class="form-control" type="date" disabled=""  name="data_evento" required=""  value="<?php echo $user['data_evento'] ?>" id="example-date-input">
                                        </div>
                                        </div>

                                        <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label  class=" form-control-label">Fotógrafos</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="password-input" disabled="" value="<?php echo $user['prof_eventos'] ?>" name="prof_eventos" placeholder="Fotógrafos" class="form-control">
                                            <small class="help-block form-text">Escreva quais Fotógrafos participarão do evento</small>
                                        </div>
                                    </div>

                                      <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Descrição do Evento</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input name="descricao_evento" disabled="" value="<?php echo $user['prof_eventos'] ?>" id="textarea-input"  rows="9" placeholder="Detalhes importantes, ex: Levar lente 50mm.." class="form-control"></input>
                                        </div>

                                        </div>
                            </div>

                            <div class="card-footer">
                                <input type="hidden" name="id_eventos" value="<?php echo $id ?>">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Concluir
                                </button>
                                 <button type="button" class="btn btn-outline-secondary btn-sm">
                                            <i class="fa  fa-print"></i>&nbsp; IMPRIMIR</button>
                            </div>
                            <div class="user-data__footer">
                                  
                               
                                       
                                    </div>
                        </div>
                    </div>
                </div>
                    
                          </form>  
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



