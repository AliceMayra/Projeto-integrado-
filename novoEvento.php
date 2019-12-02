<?php
 session_start();
include('verifica_login.php');

include_once 'conexao.php';

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





                    <form method="POST" action="cadastraEvento.php" >  

                    <!-- MAIN CONTENT-->
                    <div class="main-content">
                        <div class="col-lg-12">
                            <div class="box">

                                <div class="card">
                                    <div class="card-header">
                                        <strong>Agendar um novo evento </strong> 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            
                                    
                                            
                                            
                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Selecione o cliente</label>
                                                </div>

                                                <div class="col-6">
                                                    <select name="id_cliente" id="cliente" required=""  class="validate[required] form-control">
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
                                                    <select name="tipo_evento" id="sport" required=""  class="validate[required] form-control">
                                                        <option>Selecione</option>
                                                        <option value="Casamento">Casamento</option>
                                                        <option value="Aniversario Infantil">Aniversario Infantil</option>
                                                        <option value="Aniversario 15 Anos">Aniversario 15 Anos</option>
                                                        <option value="Sessão de fotos">Sessão de fotos</option>
                                                    </select>

                                                </div>
                                            </div>
                                             <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email-input" class=" form-control-label">Data do evento</label>
                                            </div>
                                            <div class="col-6">
                                            <input class="form-control" type="date"  name="data_evento" required=""  value="" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="2019-11-04" max="2060-02-18" id="example-date-input">
                                        </div>
                                        </div>

                                        <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label  class=" form-control-label">Fotógrafos</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" id="password-input" name="prof_eventos" required="" placeholder="Fotógrafos" class="form-control">
                                            <small class="help-block form-text">Escreva quais Fotógrafos participarão do evento</small>
                                        </div>
                                    </div>

                                      <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Descrição do Evento</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="descricao_evento" required="" id="textarea-input" rows="9" placeholder="Detalhes importantes, ex: Horario previsto, levar lente 50mm.." class="form-control"></textarea>
                                        </div>

                                        </div>
                            </div>

                            <div class="card-footer">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Concluir
                                </button>
                                <a href="novoEvento.php"> <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Cancelar
                                    </button></a>
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

        <script>
 function valida()
  {
      if (document.nome_Cliente.sel.options[sel.selectedIndex].value=="")
        {
           alert("Selecione o cliente!");
           document.form1.sel.focus();
           return false;
        }
        return true;
  }
  
        </script>

</body>

</html>
<!-- end document-->
