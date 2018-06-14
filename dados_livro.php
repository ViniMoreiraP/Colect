<?php

session_start();

  if (!isset($_SESSION['usuario'])) {

    header('Location : index.php?erro=1');
  }



require_once('db.class.php');
  $objDb = new db();
  $link =$objDb->conecta_mysql();

  $id_livro_crip= $_POST['id_livro_crip'];
  $id_usuario=$_SESSION['id'];


  


  $sql= "SELECT date_format(l.data_inclusao,'%d %b %Y %T') AS data_inclusao_formatada ,l.*, u.* from livros AS l JOIN usuarios AS u ON(l.id_usuario = u.id) where md5(id_livro)= '$id_livro_crip' ";

 

   $resultado_id= mysqli_query($link, $sql);

   if ($resultado_id) {
    $registo= mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);

   
    $status   = $registo['disponivel']   ? '[RESERVADO]' : '' ;



     echo '


              <div class="row">
            <div class="col-xs-6 col-md-8" >


            <a href="#" class="thumbnail">
             <img class="primeirasAmostras" src="img-livros/'.$registo['arquivo'].'  " >
            </a>

          </div>

          <div class="col-xs-6 col-md-4" >

              <h2>'.$registo['titulo'].'</h2>

              <h3>'.$status.'</h3>


            

              <hr>
              <br>
          <h4 class="list-group-item-heading"> '.$registo['usuario'].' <small> - '.$registo['data_inclusao_formatada'].' </small> </h4> 

             <hr>
              <br>

                <p>  '.$registo['descricao'].'   </p>



            
          </div>    








      </div>
               

'; //finao do echo


   }else {
    echo "erro na consulta de tweets no banco de dados";
   }















 ?>