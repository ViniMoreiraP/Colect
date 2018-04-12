  <?php 
   session_start();
   if (!isset($_SESSION['usuario'])) header('location: index.php?erro=1');
   
    $id_usuario= $_SESSION['id'];
    
    require_once('db.class.php');
    $objDb = new db();
    $link =$objDb->conecta_mysql();

    //--qtd de livros

    $sql= "SELECT count(*) AS qtd_livros FROM livros";
    $resultado_id= mysqli_query($link, $sql);


    if ($resultado_id) {
      $registo= mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);
      $qtd_livros= $registo['qtd_livros'];
      
    }else{
      echo "Erro na consulta ao banco de dados";
    }
  
    //--qtd de livros do usuario
    $sql.= " where id_usuario= $id_usuario";


    $resultado_id= mysqli_query($link, $sql);
    if ($resultado_id) {
      $registo= mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);
      $qtd_livros_usuario= $registo['qtd_livros'];
      
    }else{
      echo "Erro na consulta ao banco de dados";
    }

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



           function atualizaMeusLivros(){
        $.ajax({
          url: 'atualiza_meus_livros.php',
          success: function(data){
            $('#meusLivros').html(data);
             
          }
          })
       }

        atualizaMeusLivros();







        $('#meu').click(function(){
          alert('chega bb');


        })



        





      });






        </script>









  </head>



  <body>
    
      <?php include('cabecalho_logado.php') ?>




    <div class="jumbotron">
     <div class="container principal">

      <div class="row">
              <div class="col-md-3">
        
 
                <?php include('painel_intro.php'); ?>



      </div>

      <div class="col-md-9" > 



             <div class="panel panel-default">
              <div style="text-align: center;"><h2 id="meu">Meus Livros</h2></div>
              
            <div class="panel-body"  id="meusLivros">


      </div>
      </div>



      </div>

  
       



      </div> <!--fim da row-->
     </div> <!--fim container-->
    </div> <!--Fim jumbotron-->




 



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>

  </html>