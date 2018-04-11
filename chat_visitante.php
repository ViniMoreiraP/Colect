<?php 


	

  

	 $sql= "SELECT * from chat_livro where id_interessado = $id_usuario and id_livro = $id_livro " ;
	
	 $resultado_id= mysqli_query($link, $sql);

	 if ($resultado_id) {
	 	$registo= mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);
	 	

	 

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

        	


            
        	$('#btn_limpar').click(function(){
        		$('#text_msg').val('');
        	});

            $('#btn_msg').click(function(){

        			if($('#text_msg').val().length > 0){
        				
					$.ajax({

						url: 'inclui_msg.php',
						method: 'post',

						  data: {
						  	text_msg: $('#text_msg').val(),
             		   		id_chat: <?php echo $id_chat ?>
             		   	},
                      	

						success: function(data){
							$('#text_msg').val('');
							atualizaMensagens();
							
						}
					})
					} else{alert('digite algo, babaca');}	
        		});
         


          function atualizaMensagens(){
        $.ajax({
          url: 'get_mensagens.php',
          method: 'post',
          data: {
          	id_chat: <?php echo $id_chat ?>
          },
          success: function(data){
            $('#msgs').html(data);
             
          }
          })
       }
            

       atualizaMensagens();



        })
        </script>





  </head>



  <body>
    			

    	
  			<form id="form_msg" class="input-group">
  				<div class="rows">


  					<div class="col-md-10" >
  							<textarea class="form-control" id="text_msg" rows="5" name="text_msg"
              			    placeholder="Mensagem"></textarea>

              			     </div>
           <div class="col-md-2">

                       <div class="btn-group-vertical" role="group" >
                  
            
                <button class="btn btn-success" id="btn_msg" type="button">Enviar</button>
              
              
              
            
                <button class="btn btn-success" id="btn_limpar" type="button">Limpar</button>
              
              </div>


            
          </div>	

				</div>
						</form>
				
			

				<div id="msgs" class="list-group">
					


				</div>



 



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>

  </html>