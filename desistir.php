<?php 
 session_start();
  if (!isset($_SESSION['usuario'])) header('location: index.php');

require_once('db.class.php');
$objDb = new db();
$link =$objDb->conecta_mysql();


$id_usuario= $_SESSION['id'];




$id_livro=$_POST['id_livro'];
$titulo=$_POST['titulo'];
$descricao=$_POST['descricao'];



echo "$id_livro <br>";
echo "$titulo <br>";
echo "$descricao <br>";




$sql = "UPDATE livros SET id_interessado_reservado=0 , disponivel= 0 WHERE id_livro= $id_livro";
echo "$sql";

		if (mysqli_query($link, $sql)){
			header('location:meus_livros_reservados.php');
		}else {
			echo "erro na edicao do banco de dados";
		}


	

 ?>

