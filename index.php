<?php 

	session_start();
	$erro_email   = isset($_GET['erro_email'])   ? true : false;
  $erro_usuario = isset($_GET['erro_usuario'])   ? true : false;


 
   if (isset($_SESSION['usuario'])) header('location: home.php');







 ?>



<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Colect</title>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<link rel="stylesheet" type="text/css" href="css/estilo.css">


				<script>
			$(document).ready(function(){

       


        <?php 
        if ($erro_email) {
          echo " $('#cadastro').modal('show'); ";
        }
         ?>

           <?php 
        if ($erro_usuario) {
          echo " $('#login').modal('show'); ";
        }
         ?>



				$('#btn-cadastrar').click(function(){
							var campo_vazio= false;

					if ($('#email_cadastro').val()=='') {
						campo_vazio= true;
						$('#email_cadastro').css({'border-color':'#A94442'});
					} else {
						$('#email_cadastro').css({'border-color':'#CCC'});
					}


          if ($('#nome_cadastro').val()=='') {
            campo_vazio= true;
            $('#nome_cadastro').css({'border-color':'#A94442'});
          } else {
            $('#nome_cadastro').css({'border-color':'#CCC'});
          }


					if ($('#senha_cadastro').val()=='') {
						campo_vazio= true;
						$('#senha_cadastro').css({'border-color':'#A94442'});
					} else {
						$('#senha_cadastro').css({'border-color':'#CCC'});
		
					}

					if (campo_vazio) {
						return false;
					}

					
		
				})
			})						
		</script>





	</head>



	<body>



		
      <!--cabecalho-->

    <nav class="navbar navbar-default navbar-fixed-top navbar-verde "  role="navigation">
      

      <div class="container">
        
        <!-- Header -->
        <div class="navbar-header"> 
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          
          <a class="navbar-brand" href="index.php">
            <span class="img-logo">C</span>
            <span><img src="img/reciclagem-grande.png" style=" max-height: 100% ; width: auto; "></span>
           <span class="img-logo">lect</span>
           </a>

        </div>



        
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="">Sobre</a></li>
            <li><a href="">Ajuda</a></li>
            <li><a href="">Contato</a></li>
            <li class="divisor" role="separator"></li>
            <li><a href="" data-toggle="modal"
          data-target="#cadastro">Inscrever-se</a></li>
            <li><a href="" data-toggle="modal"
          data-target="#login">Entrar</a></li>
          </ul>

      </div>

    </nav>

 

          <!-- modal login -->

          <form method="post" action="logar.php" class="modal fade" id="login">
                     
            <div class="modal-dialog modal-sm">
              
              <div class="modal-content">
                  
                  <!-- cabecalho -->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                      <span class="glyphicon glyphicon-remove"></span>
                    </button>
                    <h4 class="modal-title">Efetuar login</h4>
                  </div>
                  <!-- corpo -->



                  
                  <div class="modal-body">

                     <?php 
                  if ($erro_usuario) {
                    echo '  <font style="color: #FF0000"> Os dados nao foram inseridos corretamente </font> ';
                        }
                         ?>
                    <div class="form-group">
                       <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email"> 
                    </div>
                     <div class="form-group">
                       <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha"> 
                    </div>
                    
                  </div>
                  <!-- rodape -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default"  data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Logar</button>
                  </div>
                 

              </div>

            </div>
          </form> 

          <!-- modal cadastro -->

          <form class="modal fade" id="cadastro" method="post" action="registrar_usuario.php">
                     
            <div class="modal-dialog modal-sm">
              
              <div class="modal-content">
                  
                  <!-- cabecalho -->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                      <span class="glyphicon glyphicon-remove"></span>
                    </button>
                    <h4 class="modal-title">Cadastro</h4>
                  </div>
                  <!-- corpo -->
                  
                  <div class="modal-body">


                     <div class="form-group">
                       <input type="text" id="nome_cadastro" class="form-control" name="nome" placeholder="Digite seu nome ou apelido"> 
                    </div>



                    <div class="form-group">

					         	<?php 

						      if ($erro_email) {
						      	echo '  <font style="color: #FF0000"> email ja existe </font> ';
					             	}

						          ?>
                      <input type="email" id="email_cadastro" class="form-control" name="email"  placeholder="Digite seu email"> 
                    </div>
                     <div class="form-group">
                       <input type="password" id="senha_cadastro" class="form-control" name="senha"  placeholder="Digite sua senha"> 
                    </div>
                    

                    

                  </div>
                  <!-- rodape -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default"  data-dismiss="modal">Cancelar</button>
                      <button type="submit" id="btn-cadastrar" class="btn btn-primary">cadastrar</button>
                  </div>
                  </form>


              </div>

            </div>
          </form> 




  


		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>

	</html>