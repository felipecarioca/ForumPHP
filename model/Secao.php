<?
class Secao extends DB {
	
	protected $id_secao;
	protected $descricao;

	public function getId() {
		return $this->id_usuario;
	}

	private function setId($id) {
		$this->id_usuario = $id;
	}

	public function getDescricao() {
		return $this->descricao;
	}

	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}

	public function Find($id) {

		$sql = "SELECT * FROM secao
				WHERE id_secao = :id";

		$query = $this->db()->prepare($sql);
		$query->execute(array(
			':id' => $id
		));

		$dados = $query->fetchAll();
		$dados = $dados[0];
		
		$this->setId($dados['id_secao']);
		$this->setDescricao($dados['descricao']);

	}

	public function getAll() {
		
		$sql = "SELECT * FROM secao";

		$query = $this->db()->prepare($sql);

		$query->execute();
		$dados = $query->fetchAll();
		$secoes = array();
		foreach ($dados as $dado_secao) {
			$secao = new Secao();
			$secao->setId($dado_secao['id_secao']);
			$secao->setDescricao($dado_secao['descricao']);
			$secoes[] = $secao;
		}

		return $secoes;
	}

}