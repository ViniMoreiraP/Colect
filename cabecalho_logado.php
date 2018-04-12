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
            <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Livros  <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="procurar_livros.php">Procurar</a></li>
            <li><a href="" data-toggle="modal"
          data-target="#oferecer">Oferecer</a></li>

          </ul>
        </li>
            <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Conta <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Perfil</a></li>
            <li><a href="meus_livros.php">Meus Livros</a></li>
            <li><a href="#">Alguma coisa</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Mais alguma coisa pra dar volume</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="sair.php">Sair</a></li>
          </ul>
        </li>
          
            
          </ul>

      </div>

    </nav>


          <form method="post" action="salva_livro.php" class="modal fade" enctype="multipart/form-data" id="oferecer">
                     
            <div class="modal-dialog modal-md">
              
              <div class="modal-content">
                  
                  <!-- cabecalho -->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                      <span class="glyphicon glyphicon-remove"></span>
                    </button>
                    <h4 class="modal-title">Oferecer Livro</h4>
                  </div>
                  <!-- corpo -->



                  
                  <div class="modal-body">


                    <div class="form-group"  >
                      <label for="comment">Titulo:</label>
                      <input type="text" class="form-control"  name="titulo" placeholder="Digite o titulo do livro" required=""> 
                    </div>

                   <div class="form-group">
                  <label for="comment">Comentarios:</label>
                  <textarea class="form-control" rows="5" name="descricao"
                  placeholder="Digite alguns comentarios sobre o livro.

*Estado do livro
*Local de troca
*Qualquer outra coisa que achar relevante

                  "></textarea>
                    </div>

                   <input type="file" required name="arquivo" >
             
                    







                  </div>
                  <!-- rodape -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default"  data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">oferecer</button>
                  </div>
                 

              </div>

            </div>
          </form> 


