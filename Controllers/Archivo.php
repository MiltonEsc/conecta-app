<?php 

class Archivo {
	public function subeimagen64temp($img, $nombre) {

		$carpetaDestino = "../Archivos/";
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);

		$file = $carpetaDestino . $nombre . '.png';
		$success = file_put_contents($file, $data);
		return $success;
	}
	
	public function subeImagenBienvenida($img, $nombre) {

		$carpetaDestino = "../bienvenida/";
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);

		$file = $carpetaDestino . $nombre . '.png';
		$success = file_put_contents($file, $data);
		return $success;
	}
	
	public function subeImagenDespedida($img, $nombre) {

		$carpetaDestino = "../despedida/";
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);

		$file = $carpetaDestino . $nombre . '.png';
		$success = file_put_contents($file, $data);
		return $success;
	}
}


?>