<?php 

	session_start();

	if (!isset($_SESSION['usuario'])) {

		header('Location : index.php?erro=1');
	}



	require_once('db.class.php');
	$objDb = new db();
	$link =$objDb->conecta_mysql();

	
	$nome_livro= $_POST['nome_livro'];
	$latitude=$_POST['latitude'];
	$longitude=$_POST['longitude'];


function distancia($lat1, $lon1, $lat2, $lon2) {

$lat1 = deg2rad($lat1);
$lat2 = deg2rad($lat2);
$lon1 = deg2rad($lon1);
$lon2 = deg2rad($lon2);

$dist = (6371 * acos( cos( $lat1 ) * cos( $lat2 ) * cos( $lon2 - $lon1 ) + sin( $lat1 ) * sin($lat2) ) );
$dist = number_format($dist, 2, '.', '');
return $dist;
}




   $sql= "SELECT * from livros WHERE titulo LIKE '%$nome_livro%' order by data_inclusao DESC ";

  


	

	 $resultado_id= mysqli_query($link, $sql);

	 if ($resultado_id) {
	 	
	   while($registo= mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){



		   	echo '<a href ="livro.php?cod='.md5($registo['id_livro']).'&" class="list-group-item">';
	   	 	echo ' <strong> '.$registo['titulo'].'</strong> ';
	   		echo ' <span class="badge">'.distancia($registo['latitude'],$registo['longitude'], $latitude,$longitude).'  Km<br /> </span>';
	   		
	   	
	   	 echo '</a>';


	   }


	 }else {
	 	echo "erro na consulta de usuarios no banco de dados";
	 }


 ?>