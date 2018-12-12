<?
class Post extends DB {
	
	protected $id_post;
	protected $id_topico;
	protected $texto;
	protected $id_usuario;
	protected $data_cadastro;

	public function getId() {
		return $this->id_post;
	}

	private function setId($id) {
		$this->id_post = $id;
	}

	public function getIdTopico() {
		return $this->id_topico;
	}

	public function setIdTopico($id_topico) {
		$this->id_topico = $id_topico;
	}

	public function getTexto() {
		return $this->texto;
	}

	public function setTexto($texto) {
		$this->texto = $texto;
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

		$sql = "SELECT * FROM post
				WHERE id_post = :id";

		$query = $this->db()->prepare($sql);
		$query->execute(array(
			':id' => $id
		));

		$dados = $query->fetchAll();
		$dados = $dados[0];
		
		$this->setId($dados['id_post']);
		$this->setIdTopico($dados['id_topico']);
		$this->setTexto($dados['texto']);
		$this->setIdUsuario($dados['id_usuario']);
		$this->setDataCadastro($dados['data_cadastro']);
		
	}

	public function Salvar() {
		
		$sql = "INSERT INTO post
					(id_topico, texto, id_usuario, data_cadastro)
				VALUES
					(:id_topico, :texto, :id_usuario, :data_cadastro)";

		$query = $this->db()->prepare($sql);

		$query->execute(array(
			':id_topico' => $this->getIdTopico(),
			':texto' => $this->getTexto(),
			':id_usuario' => $_SESSION['user_data']['id_usuario'],
			':data_cadastro' => date('Y-m-d')
		));

		$this->setId($this->db()->lastInsertId());

	}

	public function getAll($id_topico) {
		
		$sql = "SELECT * FROM post WHERE id_topico = :id_topico ORDER BY id_post DESC";

		$query = $this->db()->prepare($sql);

		$query->execute(array(
			':id_topico' => $id_topico
		));

		$dados = $query->fetchAll();

		$posts = array();
		foreach ($dados as $dado_post) {
			$post = new Post();
			$post->setId($dado_post['id_post']);
			$post->setIdTopico($dado_post['id_topico']);
			$post->setIdUsuario($dado_post['id_usuario']);
			$post->setTexto($dado_post['texto']);
			$post->setDataCadastro($dado_post['data_cadastro']);
			$posts[] = $post;
		}

		return $posts;
	}

}