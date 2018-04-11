<?php 
	
	session_start();

	if (!isset($_SESSION['usuario'])) {

		header('Location : index.php?erro=1');
	}



	require_once('db.class.php');

	$texto_msg= $_POST['text_msg'];
	$id_usuario=$_SESSION['id'];
	
	$id_chat= $_POST['id_chat'];



	if($texto_msg=='' || $id_usuario==''){
		die();
	}





	$objDb = new db();
	$link =$objDb->conecta_mysql();
	

	$sql = " INSERT INTO mensagens (id_chat ,id_usuario, mensagem) VALUES ($id_chat, $id_usuario , '$texto_msg')" ;
	
	

	mysqli_query($link, $sql);
	
 ?>