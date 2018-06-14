 <?php 
   session_start();
   if (!isset($_SESSION['usuario'])) header('location: index.php?erro=1');
   
    $id_usuario= $_SESSION['id'];
    
    $id_livro= $_POST['id_livro'];

    $endereço= $_POST['endereco'];

    $titulo= $_POST['titulo'];



  
   ?>



<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
         <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  
 
         <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/estilo.css">


     <link rel="stylesheet" type="text/css" href="css/estilo_rotas.css">






    </head>
 




    <body>






           <?php include('cabecalho_logado.php') ?>

 <div class="jumbotron">
     <div class="container rotas "  style="background: rgb(255,255,255);">


    	<div id="site" class="col-md-5" >



        
        
        
            <form method="post" action="busca.php">
                <fieldset>
                    <legend>    <?php echo $titulo ?></legend>
                    
                    <div>
                        <label for="txtEnderecoPartida">Endereço de partida:</label>
                        <input type="text" id="txtEnderecoPartida" name="txtEnderecoPartida" />
                    </div>
                    
                    <div>
                        <label for="txtEnderecoChegada">Endereço de chegada:</label>
                        <input type="text" id="txtEnderecoChegada" readonly="" value="  <?php echo $endereço ?>" name="txtEnderecoChegada" />
                    </div>
                    
                    <div>
                        <input type="submit" id="btnEnviar" name="btnEnviar" value="Ir" />
                    </div>
                </fieldset>
            </form>





                



        
            <div id="mapa"></div>
            
            <div id="trajeto-texto"></div>
        
        </div>






        
            </div> <!--fim container-->
    </div> <!--Fim jumbotron-->

		
        <!-- Maps API Javascript -->
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADq4q29WItoJI0isqivnieJN1EHCeJceQ" type="text/javascript"></script> 
             <!-- Arquivo de inicialização do mapa -->
        <script src="rotas/js/mapa.js"></script>
    



 
    </body>
</html>