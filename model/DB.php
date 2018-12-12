<?
class DB {
	protected $conexao;

	function __construct() {
		try {
		  	$this->conexao = new PDO(
			  	'mysql:host=localhost;dbname=forumblackout', 'root', 'lf161092');
		  	$this->conexao->setAttribute(
		  		PDO::ATTR_ERRMODE, 
		  		PDO::ERRMODE_EXCEPTION);
		}
		catch (Exception $e) {
		  die('Conexão não efetuada...');
		}
	}
	
	public function db() {
		return $this->conexao;
	}
}