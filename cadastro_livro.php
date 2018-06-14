<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


        <link href="http://fonts.googleapis.com/css?family=Open+Sans:600" type="text/css" rel="stylesheet" />
       
        <link href="css/estilo.css" type="text/css" rel="stylesheet" />
        <link href="css/estilo_cadastro.css" type="text/css" rel="stylesheet" />
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADq4q29WItoJI0isqivnieJN1EHCeJceQ" type="text/javascript"></script> 
        
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="mapa.js"></script>
 
    

    </head>
    
    <body>
      

    <div class="jumbotron">
     <div class="container principal">






        <div id="apresentacao">
            <h1>Cadastro Livro</h1>

             <form method="post" action="salva_livro.php" class="modal fade" enctype="multipart/form-data" id="oferecer">
               

                <fieldset>

                    <div class="campos">
                        <label for="titulo">Titulo:</label>
                        <input type="text" id="tiluto" name="titulo" />
                  
                    </div>

                    <div class="campos">
                 <label for="comment">Comentario:</label>
                <textarea class="form-control" rows="7" name="descricao"
                  placeholder=" Digite alguns comentarios sobre o livro.

      *Estado do livro
      *Local de troca
      *Qualquer outra coisa que achar relevante

                  "></textarea>
                  

                    <input type="file" required name="arquivo" >



                    </div>

            
                    <div class="campos">
                        <label for="txtEndereco">Endereço:</label>
                        <input type="text" placeholder="Endereço de coleta do livro" id="txtEndereco" name="txtEndereco" />
                        <input type="button"  id="btnEndereco" name="btnEndereco" value="Mostrar no mapa" />
                    </div>

                    <div id="mapa"></div>


                	<input type="submit" value="Enviar" name="btnEnviar" />
                    
                    <input type="hidden" id="txtLatitude" name="txtLatitude" />
                    <input type="hidden" id="txtLongitude" name="txtLongitude" />

                </fieldset>
            </form>

         


      </div> <!--fim container-->
    </div> <!--Fim jumbotron-->


    </body>
</html>
