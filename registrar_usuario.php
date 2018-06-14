<?php

	session_start();

	require_once('db.class.php');

		$email= $_GET['email'];
		$nome= $_GET['nome'] ;
		$senha= md5($_GET['senha']) 	;




		$objDb = new db();
		$link =$objDb->conecta_mysql();


		$email_existe=false;





		// verificar se o email ja existe

		$sql= "select * from usuarios where email = '$email' ";

		if( $resultado_id= mysqli_query($link, $sql)) {
			$dados_usuario =mysqli_fetch_array($resultado_id);


			if (isset($dados_usuario['email'])) {
				header('location: index.php?erro_email=1&');
					die();
			}


		} 









		$sql = "INSERT into usuarios (email, usuario, senha ) VALUES ('$email', '$nome', '$senha')";

		//executar a query

		if (mysqli_query($link, $sql)){

		




		$sql= "SELECT * FROM usuarios WHERE email= '$email' AND senha='$senha'";

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


		
			
		
			


		}
	}
		else {
			echo "erro ao registrar usuario";
		}




?>