<?
class Usuario extends DB {
	
	protected $id_usuario;
	protected $nome;
	protected $senha;
	protected $usuario;

	public function getId() {
		return $this->id_usuario;
	}

	private function setId($id) {
		$this->id_usuario = $id;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function getUsuario() {
		return $this->usuario;
	}

	public function setUsuario($usuario) {
		$this->usuario = $usuario;
	}

	public function getSenha() {
		return $this->senha;
	}

	public function setSenha($senha) {
		$this->senha = $senha;
	}

	public function Salvar() {
		
		$sql = "INSERT INTO usuario
					(nome, senha, usuario)
				VALUES
					(:nome, :senha, :usuario)";

		$query = $this->db()->prepare($sql);

		$query->execute(array(
			':nome' => $this->getNome(),
			':senha' => $this->getSenha(),
			':usuario' => $this->getUsuario()
		));

		$this->setId($this->db()->lastInsertId());

	}

	public function Find($id) {

		$sql = "SELECT * FROM usuario
				WHERE id_usuario = :id";

		$query = $this->db()->prepare($sql);
		$query->execute(array(
			':id' => $id
		));

		$dados = $query->fetchAll();
		$dados = $dados[0];
		
		$this->setId($dados['id_usuario']);
		$this->setNome($dados['nome']);
		$this->setUsuario($dados['usuario']);
		$this->setSenha($dados['senha']);

	}

}