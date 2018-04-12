<?php 

   session_start();
   if (!isset($_SESSION['usuario'])) header('location: index.php');

   $id_livro= $_GET['cod'];


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






             function perfil_livro(){
              $.ajax({
                url: 'dados_livro.php',
                method: 'post',
                data: {
                id_livro_crip:'<?php echo $id_livro ?>' 
                      },
                success: function(data){
                  $('#dados').html(data);
                }
              })
            }


            function chat(){
              $.ajax({
                url: 'chat.php',
                method: 'post',
                data: {
                id_livro_crip:'<?php echo $id_livro ?>' 
                      },
                success: function(data){
                  $('#chat').html(data);
                }
              })
            }


        


        chat();

        perfil_livro();




      

      });

        </script>





  </head>



  <body>
    
    <?php include('cabecalho_logado.php') ?>




    <div class="jumbotron">
     <div class="container principal">
     
      <div class="row">
              <div class="col-md-4">
        
            <div class="panel panel-default">
          <div class="panel-body" id="chat">
            
            
          </div>
        </div>

       


      </div>

      <div class="col-md-8" > 

             <div class="panel panel-default">
      
              
            <div class="panel-body"  id="dados">


        </div>

      </div>



      </div>

  
       



      </div> <!--fim da row-->
     </div> <!--fim container-->
    </div> <!--Fim jumbotron-->




 



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>

  </html>