<?
	function carregaPagina($pagina){
		header("Location: $pagina");
	}
	
	function primeiraPalavra($string){
		
		$string = trim($string);
		
		$exp = explode(" ", $string);
		
		$palavra = $exp[0];
		
		return $palavra;
	}
	
	function startsWith($haystack, $needle){
		
		$length = strlen($needle);
		
		$result = substr($haystack, 0, $length) === $needle;
		
		return $result;
	}

	function endsWith($haystack, $needle){
		
		$length = strlen($needle);
		if ($length == 0) {
			return true;
		}

		return (substr($haystack, -$length) === $needle);
	}

	function verArray($array){
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}
	
?>