<?php 
 session_start();
 if (!isset($_SESSION['usuario'])) header('location: index.php');

require_once('db.class.php');
$objDb = new db();
$link =$objDb->conecta_mysql();

  $id_livro= $_POST['id_livro'];
  $id_usuario= $_SESSION['id'];




     $sql= "INSERT INTO chat_livro (id_livro, id_interessado) VALUES ( $id_livro, $id_usuario )";
      
    


    if ($resultado_id= mysqli_query($link, $sql)) {
    	echo "adicao realizada com sucesso";
    }

else{
	echo "erro na consulta do banco de dados";
}

   

?>