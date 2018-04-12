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

          $('#btn_procura_livros').click(function(){

          if($('#nome_livro').val().length > 0){

          $.ajax({

            url: 'get_livros.php',
            method: 'post',
            data: $('#form_procura_livros').serialize() ,
            success: function(data){
            $('#livros').html(data);
            }


          })


        }else{
          alert('digite algo, babaca');
        }
      });


           

      });

        </script>









  </head>



  <body>
    
    <?php include('cabecalho_logado.php'); ?>



    <div class="jumbotron">
     <div class="container principal">

      <div class="row">
              <div class="col-md-3">
        

          <?php include('painel_intro.php') ?>



      </div>
        <div class="col-md-9">
        
        <div class="panel panel-default">
          <div class="panel-body">
            <form id="form_procura_livros" class="input-group">
              <input type="text" id="nome_livro" name="nome_livro" class="form-control" placeholder="Quem voce esta procurando?" maxlength="140" />
              <span class="input-group-btn">
                <button class="btn btn-default" id="btn_procura_livros" type="button">Procurar</button>
              </span>
            </form>
          </div>
        </div>


        <div id="livros" class="list-group">
          


        </div>









      </div>

  
       



      </div> <!--fim da row-->
     </div> <!--fim container-->
    </div> <!--Fim jumbotron-->




 



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>

  </html>