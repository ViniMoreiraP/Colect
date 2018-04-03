<?php 

	session_start();

	if (!isset($_SESSION['usuario'])) {

		header('Location : index.php?erro=1');
	}



	require_once('db.class.php');
	$objDb = new db();
	$link =$objDb->conecta_mysql();

	$id_usuario=$_SESSION['id'];



	$sql= "SELECT * from livros order by data_inclusao desc limit 9";


	 $resultado_id= mysqli_query($link, $sql);

	 if ($resultado_id) {
	 	
	   while($registo= mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){

	echo '


           <div class="col-xs-6 col-md-4" >

           	<h4> '.$registo['titulo'].' </h4>


            <a href="livro.php?cod='.md5($registo['id_livro']).'&" class="thumbnail">
             <img class="primeirasAmostras" src="img-livros/'.$registo['arquivo'].'" >
               </a>
          </div>    



          ';
	   }






	 }else {
	 	echo "erro na consulta de tweets no banco de dados";
	 }


 ?>