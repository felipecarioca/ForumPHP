<?
class Comentario extends DB {
	
	protected $id_comentario;
	protected $id_post;
	protected $texto;
	protected $id_usuario;
	protected $data_cadastro;

	public function getId() {
		return $this->id_comentario;
	}

	private function setId($id) {
		$this->id_comentario = $id;
	}

	public function getIdPost() {
		return $this->id_post;
	}

	public function setIdPost($id_post) {
		$this->id_post = $id_post;
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

	public function Salvar() {
		
		$sql = "INSERT INTO comentario
					(id_post, texto, id_usuario, data_cadastro)
				VALUES
					(:id_post, :texto, :id_usuario, :data_cadastro)";

		$query = $this->db()->prepare($sql);

		$query->execute(array(
			':id_post' => $this->getIdPost(),
			':texto' => $this->getTexto(),
			':id_usuario' => $_SESSION['user_data']['id_usuario'],
			':data_cadastro' => date('Y-m-d')
		));

		$this->setId($this->db()->lastInsertId());

	}

	public function getAll($id_post) {
		
		$sql = "SELECT * FROM comentario WHERE id_post = :id_post ORDER BY id_comentario DESC";

		$query = $this->db()->prepare($sql);

		$query->execute(array(
			':id_post' => $id_post
		));

		$dados = $query->fetchAll();

		$comentarios = array();
		foreach ($dados as $dado_comentario) {
			$comentario = new Comentario();
			$comentario->setId($dado_comentario['id_comentario']);
			$comentario->setIdPost($dado_comentario['id_post']);
			$comentario->setIdUsuario($dado_comentario['id_usuario']);
			$comentario->setTexto($dado_comentario['texto']);
			$comentario->setDataCadastro($dado_comentario['data_cadastro']);
			$comentarios[] = $comentario;
		}

		return $comentarios;
	}

}