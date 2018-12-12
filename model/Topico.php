<?
class Topico extends DB {
	
	protected $id_topico;
	protected $id_forum;
	protected $descricao;
	protected $id_usuario;
	protected $data_cadastro;

	public function getId() {
		return $this->id_topico;
	}

	private function setId($id) {
		$this->id_topico = $id;
	}

	public function getIdForum() {
		return $this->id_forum;
	}

	public function setIdForum($id_forum) {
		$this->id_forum = $id_forum;
	}

	public function getDescricao() {
		return $this->descricao;
	}

	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}

	public function getIdUsuario() {
		return $this->id_usuario;
	}

	public function setIdUsuario($id_usuario) {
		$this->id_usuario = $id_usuario;
	}

	public function getDataCadastro() {

		$data_cadastro = explode("-",$this->data_cadastro);
		
		return $data_cadastro[2] . "/" .  $data_cadastro[1] . "/" . $data_cadastro[0];
	}

	public function setDataCadastro($data_cadastro) {
		$this->data_cadastro = $data_cadastro;
	}

	public function Find($id) {

		$sql = "SELECT * FROM topico
				WHERE id_topico = :id";

		$query = $this->db()->prepare($sql);
		$query->execute(array(
			':id' => $id
		));

		$dados = $query->fetchAll();
		$dados = $dados[0];
		
		$this->setId($dados['id_topico']);
		$this->setIdForum($dados['id_forum']);
		$this->setDescricao($dados['descricao']);
		$this->setIdUsuario($dados['id_usuario']);
		$this->setDataCadastro($dados['data_cadastro']);
		
	}

	public function Salvar() {
		
		$sql = "INSERT INTO topico
					(id_forum, descricao, id_usuario, data_cadastro)
				VALUES
					(:id_forum, :descricao, :id_usuario, :data_cadastro)";

		$query = $this->db()->prepare($sql);

		$query->execute(array(
			':id_forum' => $this->getIdForum(),
			':descricao' => $this->getDescricao(),
			':id_usuario' => $_SESSION['user_data']['id_usuario'],
			':data_cadastro' => date('Y-m-d')
		));

		$this->setId($this->db()->lastInsertId());

	}

	public function getAll($id_forum) {
		
		$sql = "SELECT * FROM topico WHERE id_forum = :id_forum ORDER BY id_topico DESC";

		$query = $this->db()->prepare($sql);

		$query->execute(array(
			':id_forum' => $id_forum
		));

		$dados = $query->fetchAll();

		$topicos = array();
		foreach ($dados as $dado_topico) {
			$topico = new Topico();
			$topico->setId($dado_topico['id_topico']);
			$topico->setIdForum($dado_topico['id_forum']);
			$topico->setIdUsuario($dado_topico['id_usuario']);
			$topico->setDescricao($dado_topico['descricao']);
			$topico->setDataCadastro($dado_topico['data_cadastro']);
			$topicos[] = $topico;
		}

		return $topicos;
	}

}