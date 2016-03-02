<?php

	$response = array('error' => 'No se recibio ningun parametro de busqueda.' );
	
		$id_nino  = $_GET['numero'];
	
			require_once('../config/mysql.php');

			$db  = new EissonConnect();
			$dbh = $db->enchufalo();
			
			$q = 'SELECT * from tb_suscripciones
						WHERE id_nino =:id_nino';
				
			$stmt = $dbh->prepare($q);
			$stmt->bindParam(':id_nino',  $id_nino, PDO::PARAM_STR);
			$stmt->execute();

			$r = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$response = array('success' => $r );


	
	echo json_encode($response);
	
?>