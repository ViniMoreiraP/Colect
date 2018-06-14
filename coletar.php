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

 $sql= "SELECT id_usuario from livros WHERE id_livro= $id_livro ";





   $resultado_id= mysqli_query($link, $sql);

   if ($resultado_id) {
    $registo= mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);

    $id_dono= $registo['id_usuario'];

   }else {
    echo "erro na consulta no banco de dados";
   }

   echo "$id_dono <br>";
   echo "$id_usuario";


$sql = "UPDATE usuarios SET pontos=pontos+50 WHERE id= $id_dono or id= $id_usuario";




		if (mysqli_query($link, $sql)){


$sql = "DELETE FROM `livros` WHERE id_livro= $id_livro";

			mysqli_query($link, $sql);


			header('location:meus_livros_reservados.php');
		}else {
			echo "erro na edicao do banco de dados";
		}


	

 ?>

