<?php 




  

	 $sql= "SELECT * from chat_livro where id_interessado = $id_usuario and id_livro = $id_livro " ;
	
	 $resultado_id= mysqli_query($link, $sql);

	 if ($resultado_id) {
	 	$registo= mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);
	 	
	 	if (isset($registo['id_chat'])) {
	 		
	 		$chat= 'sim';


	 	}else{
	 	
	 		$chat= 'nao';

	 	}
	 

	  }else {
    echo "erro na consulta de tweets no banco de dados do chat visitante iniciado";
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
            $('#btn_cria_chat').click(function(){

        	   	 $.ajax({
                url: 'cria_chat.php',
                method: 'post',
                data: {
                id_livro:'<?php echo $id_livro ?>' ,


                      },
                success: function(data){
                       
                          chat() ;

                }
              })



        		});
         
   
              function chat(){
              $.ajax({
                url: 'chat.php',
                method: 'post',
                data: {
                id_livro_crip:'<?php echo md5($id_livro)  ?>' 
                      },
                success: function(data){
                  $('#chat').html(data);
                }
              })
            }






        })
        </script>





  </head>



  <body>
    			

    		
  
  			<button type="button" id="btn_cria_chat"  class="btn cria_chat btn-success btn-lg">Chat com o fornecedor</button> 


 



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>

  </html>