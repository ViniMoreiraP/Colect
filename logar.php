	<?php

	session_start();
	
	require_once('db.class.php');

		$email= $_POST['email'];

		$senha= md5($_POST['senha']);	

		$sql= "SELECT * FROM usuarios WHERE email= '$email' AND senha='$senha'";

		$objDb = new db();
		$link =$objDb->conecta_mysql();

		
		

		if($resultado_id = mysqli_query($link, $sql)){
		
		$dados_usuario = mysqli_fetch_array($resultado_id);

		if (isset($dados_usuario['id'])) {
			$_SESSION['usuario']= $dados_usuario['usuario'];
			$_SESSION['email']= $dados_usuario['email'];
			$_SESSION['id']= $dados_usuario['id'];

			header('location: home.php');

		} else{
		
			header('location: index.php?erro_usuario=1&');
			die();
			}


		}else{
		
		echo "erro na execulcao na consulta favor entrar em  contato com o admin do site";
		}

	

?>





		
		
			

				
			
			