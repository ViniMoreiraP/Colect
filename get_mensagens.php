<?php 

	session_start();

	if (!isset($_SESSION['usuario'])) {

		header('Location : index.php?erro=1');
	}



	require_once('db.class.php');
	$objDb = new db();
	$link =$objDb->conecta_mysql();
	$id_usuario=$_SESSION['id'];
	$id_chat=$_POST['id_chat'];






	$sql = "SELECT date_format(m.data_inclusao,'%d %b %Y %T') AS data_inclusao_formatada ,m.mensagem,u.usuario, m.id_mensagem FROM mensagens AS m JOIN usuarios AS u ON(m.id_usuario = u.id) where id_chat= $id_chat order by data_inclusao desc";

	

	

	 $resultado_id= mysqli_query($link, $sql);

	 if ($resultado_id) {
	 	
	   while($registo= mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){
	   	 echo '<a href ="#" class="list-group-item ">';
	   	 echo '<h5 class="list-group-item-heading"> '.$registo['usuario'].' <small > - '.$registo['data_inclusao_formatada'].' </small> </h5> ';
	   
	   	 echo '<p class="list-group-item-text" style="font-size: 12px">'.$registo['mensagem'].'</p>';

	   	 echo '</a>';


	   }






	 }else {
	 	echo "erro na consulta de tweets no banco de dados";
	 }


 ?>