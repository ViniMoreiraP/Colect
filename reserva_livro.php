<?php 
 session_start();
  if (!isset($_SESSION['usuario'])) header('location: index.php');

require_once('db.class.php');
$objDb = new db();
$link =$objDb->conecta_mysql();


$id_usuario= $_SESSION['id'];




$id_chat=$_POST['id_chat'];




echo "$id_chat <br>";







$sql = "SELECT * FROM `chat_livro` WHERE id_chat = $id_chat ";
echo "$sql";
 $resultado_id= mysqli_query($link, $sql);


		if ($resultado_id){
			
			$registo= mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);

			

			$id_livro= $registo["id_livro"];
			echo "$id_livro <br>";
			$id_interessado= $registo["id_interessado"];
			echo "$id_interessado <br>";


			$sql = "UPDATE `livros` SET `disponivel`= 1 ,`id_interessado_reservado`= $id_interessado WHERE id_livro= $id_livro ";

			
			echo "$sql";

			if (mysqli_query($link, $sql)){
				echo "foi";
			}else {
				echo "erro na edicao do banco de dados";
		}






		}else {
			echo "erro na edicao do banco de dados";
		}


	

 ?>

