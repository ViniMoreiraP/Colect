  <?php 
   session_start();
   if (!isset($_SESSION['usuario'])) header('location: index.php?erro=1');
   
    $id_usuario= $_SESSION['id'];
    
  
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




        <script type="text/javascript">
          $(document).ready(function(){



           function atualizaLivros(){
        $.ajax({
          url: 'atualiza_livros.php',
          success: function(data){
            $('#recendes').html(data);
             
          }
          })
       }


        atualizaLivros();


      });

        </script>









  </head>



  <body>
    
      <?php include('cabecalho_logado.php') ?>




    <div class="jumbotron">
     <div class="container principal">

      <div class="row">
      <div class="col-md-3">
        

        <?php include('painel_intro.php') ?>



      </div>

      <div class="col-md-9" > 



             <div class="panel panel-default">
              <div style="text-align: center;"><h2>Adicionados Recentemente</h2></div>
              
            <div class="panel-body"  id="recendes">


      </div>
      </div>



      </div>

  
       



      </div> <!--fim da row-->
     </div> <!--fim container-->
    </div> <!--Fim jumbotron-->




 



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>

  </html>