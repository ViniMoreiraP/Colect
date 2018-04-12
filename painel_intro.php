    <?php 
   
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





            <div class="panel panel-default">
            <div class="panel-body">

              <h4> Seja Bem Vindo,  <?= $_SESSION['usuario'] ?></h4> 


              <hr>
              <div class="row" >

              <div class="col-md-6">
                Seus Livros <br> 
                <a href="meus_livros.php">
                <?php echo $qtd_livros_usuario ?>
                </a>
              </div>
              <div class="col-md-6">
               Livros Totais<br>
               <a href="procurar_livros.php">
               <?php echo $qtd_livros ?>
               </a>
              </div>
              </div>

              <br>

              <div class="row">

              <div class="col-md-6">
                Qualquer coisa <br> 
               0 
              </div>
              <div class="col-md-6">
                Outra coisa<br>
                0 
              </div>
              </div>


            </div>
          </div>