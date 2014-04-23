<?php
class FileManager{

	public function writeFile($fileName, $arrayObjectsToWrite){
		$file = fopen($fileName, "w+"); // Riapre il file in scrittura azzerandone il contenuto
		$ser = serialize($arrayObjectsToWrite); //Serializza l'istanza
		fwrite($file, $ser); // Memorizza l'istanza serializzata
		fclose($file);
	}

	public function getFile($fileName){
		return $this->loadFile($fileName);
	}

	private function loadFile($fileName){
		@$file = fopen($fileName, "r") or die ("Unable to find file resource"); // Apre il file in sola lettura oppure blocca la funzione (Warning soppresso con @)
		$content = file_get_contents($fileName); // Legge il contenuto del file e lo memorizza in $content
		$obj = unserialize($content); // Ricostruisce l'istanza	deserializzando $content
		return $obj;
	}
}