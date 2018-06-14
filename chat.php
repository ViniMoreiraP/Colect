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

 $sql= "SELECT  l.*, u.* from livros AS l JOIN usuarios AS u ON(l.id_usuario = u.id) where md5(id_livro)= '$id_livro_crip' ";

 
 	


 	$resultado_id= mysqli_query($link, $sql);

 	if ($resultado_id) {

 		$registo= mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);

 		$id_livro= $registo['id_livro'];
 		$id_interessado_reservado= $registo['id_interessado_reservado'];


 		if ($id_usuario == $registo['id_usuario'] ) {
 			include('chat_dono.php');
 			



 

 		}else{
 			
 			$sql= "SELECT * from chat_livro where id_interessado = $id_usuario and id_livro = $id_livro " ;
 		
	
			 $resultado_id= mysqli_query($link, $sql);

			 if ($resultado_id) {
	 			$registo= mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);
	 	
	 	if (isset($registo['id_chat'])) {
	 		$id_chat= $registo['id_chat'];
	 		include('chat_visitante.php');


	 	}else{
	 	
	 		include('chat_visitante_nao_iniciado.php');

	 	}
	 

	  }else {
    echo "erro na consulta de tweets no banco de dados pra entrar no chat visitante";
   }


 		}






 }else {
    echo "erro na consulta de tweets no banco de dados";
   }





 ?>