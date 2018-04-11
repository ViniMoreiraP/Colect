<?php 

	session_start();

	if (!isset($_SESSION['usuario'])) {

		header('Location : index.php?erro=1');
	}



	require_once('db.class.php');
	$objDb = new db();
	$link =$objDb->conecta_mysql();

	
	$nome_livro= $_POST['nome_livro'];



   $sql= "SELECT * from livros WHERE titulo LIKE '%$nome_livro%' order by data_inclusao DESC ";

  


	

	 $resultado_id= mysqli_query($link, $sql);

	 if ($resultado_id) {
	 	
	   while($registo= mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){



		   	echo '<a href ="livro.php?cod='.md5($registo['id_livro']).'&" class="list-group-item">';
	   	 	echo ' <strong> '.$registo['titulo'].'</strong> ';
	   	 	
	   	
	   	 echo '</a>';


	   }


	 }else {
	 	echo "erro na consulta de usuarios no banco de dados";
	 }


 ?>