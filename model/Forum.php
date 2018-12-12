<?php
class Forum extends DB {
	
	protected $id_forum;
	protected $secao;

	public function getId() {
		return $this->id_forum;
	}

	private function setId($id) {
		$this->id_forum = $id;
	}

	public function getSecao() {
		return $this->secao;
	}

	public function setSecao($secao) {
		$this->secao = $secao;
	}

	public function Find($id) {

		$sql = "SELECT * FROM forum
				WHERE id_forum = :id";

		$query = $this->db()->prepare($sql);
		$query->execute(array(
			':id' => $id
		));

		$dados = $query->fetchAll();
		$dados = $dados[0];
		
		$this->setId($dados['id_forum']);

		$secao = new Secao();
		$secao->Find($dados['id_secao']);

		$this->setSecao($secao);

	}

}