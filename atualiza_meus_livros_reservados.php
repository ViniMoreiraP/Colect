<?php 

  session_start();

  if (!isset($_SESSION['usuario'])) {

    header('Location : index.php?erro=1');
  }



  require_once('db.class.php');
  $objDb = new db();
  $link =$objDb->conecta_mysql();

  $id_usuario=$_SESSION['id'];



  $sql= "SELECT * from livros where id_interessado_reservado= $id_usuario order by data_inclusao desc";


   $resultado_id= mysqli_query($link, $sql);

   if ($resultado_id) {
    
     while($registo= mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){

  echo '


           <div class="col-xs-6 col-md-4" >

            <div style="text-align: center;"><h4 id="meu">'.$registo['titulo'].'</h4></div>


           
   
                       

   <div class="dropdown">
  <button id="'.$registo['id_livro'].'" class="btn btn-default dropdown-toggle meu-livro " type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
             <img class="img-responsive primeirasAmostras" src="img-livros/'.$registo['arquivo'].'" >
  </button>





  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="livro.php?cod='.md5($registo['id_livro']).'&">Perfil</a></li>
    <li><a href="" data-toggle="modal"
          data-target="#busca-'.$registo['id_livro'].'">Ir buscar</a></li>

    <li role="separator" class="divider"></li>
    <li><a href="" data-toggle="modal"
          data-target="#desistir-'.$registo['id_livro'].'">Desistir</a></li>

    <li role="separator" class="divider"></li>
    <li><a href="" data-toggle="modal"
          data-target="#livro_coletado-'.$registo['id_livro'].'">livro coletado</a></li>
  </ul>
</div>



          </div>    





         <form method="post" action="busca.php" class="modal fade"  id="busca-'.$registo['id_livro'].'">
                     
            <div class="modal-dialog modal-md">
              
              <div class="modal-content">
                  
                  <!-- cabecalho -->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                      <span class="glyphicon glyphicon-remove"></span>
                    </button>
                    <h4 class="modal-title">Confirma Busca:  '.$registo['titulo'].'</h4>
                  </div>
                  <!-- corpo -->



                  
                  <div class="modal-body">


                  <div class="form-group" style="display: none;"  >
                      <label for="comment">ID:</label>
                      <input type="text"  class="form-control" name="id_livro" value="'.$registo['id_livro'].'" readonly > 
                    </div>


                    <div class="form-group"  >
                      <label for="comment">Titulo:</label>
                      <input type="text" class="form-control" name="titulo" value="'.$registo['titulo'].'" 
                      readonly > 
                    </div>

                    <div class="form-group"  >
                      <label for="comment">Endereco:</label>
                      <input type="text" class="form-control" name="endereco" value="'.$registo['endereco'].'" required=""
                      readonly > 
                    </div>


                   <div class="form-group">
                  <label for="comment">Comentarios:</label>
                  <textarea class="form-control"  rows="5" name="descricao"
                
                  readonly 

                >'.$registo['descricao'].'</textarea>
                    </div>

                 
             
                    







                  </div>
                  <!-- rodape -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default"  data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Buscar</button>
                  </div>
                 

              </div>

            </div>
          </form> 


          <form method="post" action="desistir.php" class="modal fade"  id="desistir-'.$registo['id_livro'].'">
                     
            <div class="modal-dialog modal-md">
              
              <div class="modal-content">
                  
                  <!-- cabecalho -->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                      <span class="glyphicon glyphicon-remove"></span>
                    </button>
                    <h4 class="modal-title">Desisitr de :  '.$registo['titulo'].'</h4>
                  </div>
                  <!-- corpo -->



                  
                  <div class="modal-body">


                  <div class="form-group" style="display: none;"  >
                      <label for="comment">ID:</label>
                      <input type="text"  class="form-control" name="id_livro" value="'.$registo['id_livro'].'" readonly > 
                    </div>



                    <div class="form-group"  >
                      <label for="comment">Titulo:</label>
                      <input readonly type="text" class="form-control" name="titulo" value="'.$registo['titulo'].'" placeholder="Digite o titulo do livro" required=""> 
                    </div>


                            <div class="form-group"  >
                      <label for="comment">Endereco:</label>
                      <input type="text" class="form-control" name="endereco" value="'.$registo['endereco'].'" required=""
                      readonly > 
                    </div>

                   <div class="form-group">
                  <label for="comment">Comentarios:</label>
                  <textarea readonly class="form-control"  rows="5" name="descricao"
                  placeholder="Digite alguns comentarios sobre o livro.

          *Estado do livro
          *Local de troca
          *Qualquer outra coisa que achar relevante

                  ">'.$registo['descricao'].'</textarea>
                    </div>

                 
             
                    







                  </div>
                  <!-- rodape -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default"  data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Desistir</button>
                  </div>
                 

              </div>

            </div>
          </form> 



                    <form method="post" action="coletar.php" class="modal fade"  id="livro_coletado-'.$registo['id_livro'].'">
                     
            <div class="modal-dialog modal-md">
              
              <div class="modal-content">
                  
                  <!-- cabecalho -->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                      <span class="glyphicon glyphicon-remove"></span>
                    </button>
                    <h4 class="modal-title">Confirmar coleta de :  '.$registo['titulo'].'</h4>
                  </div>
                  <!-- corpo -->



                  
                  <div class="modal-body">


                  <div class="form-group" style="display: none;"  >
                      <label for="comment">ID:</label>
                      <input type="text"  class="form-control" name="id_livro" value="'.$registo['id_livro'].'" readonly > 
                    </div>



                    <div class="form-group"  >
                      <label for="comment">Titulo:</label>
                      <input readonly type="text" class="form-control" name="titulo" value="'.$registo['titulo'].'" placeholder="Digite o titulo do livro" required=""> 
                    </div>


                            <div class="form-group"  >
                      <label for="comment">Endereco:</label>
                      <input type="text" class="form-control" name="endereco" value="'.$registo['endereco'].'" required=""
                      readonly > 
                    </div>

                   <div class="form-group">
                  <label for="comment">Comentarios:</label>
                  <textarea readonly class="form-control"  rows="5" name="descricao"
                  placeholder="Digite alguns comentarios sobre o livro.

          *Estado do livro
          *Local de troca
          *Qualquer outra coisa que achar relevante

                  ">'.$registo['descricao'].'</textarea>
                    </div>

                 
             
                    







                  </div>
                  <!-- rodape -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default"  data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Confirmar Coleta</button>
                  </div>
                 

              </div>

            </div>
          </form> 












          ';
     }






   }else {
    echo "erro na consulta de tweets no banco de dados";
   }

 ?>








 <div ></div>