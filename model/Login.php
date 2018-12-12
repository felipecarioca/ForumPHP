<?

class Login extends DB {
	
	private $usuario;

	public function Logar($usuario, $senha) {

		if(empty($usuario) || empty($senha))
			return $this->DadosNaoPreenchidos();

		$sql = "SELECT * FROM usuario
				WHERE usuario = :usuario AND senha = :senha";

		$query = $this->db()->prepare($sql);

		$query->execute(array(
			':usuario' => $usuario,
			':senha' => md5($senha)
		));

		$dados = $query->fetchAll();

		if($query->rowCount()) {

			$usuario = new Usuario('', '', '');
			$usuario->Find($dados[0]['id_usuario']);

			$this->setUsuario($usuario);

			return $this->DadosValidados();
		}

		return $this->DadosInvalidos();
	}

	private function getUsuario() {
		return $this->usuario;
	}

	private function setUsuario($usuario) {
		$this->usuario = $usuario;
	}

	private function DadosNaoPreenchidos() {
		
		$_SESSION['loginError'] = "Usuário ou senha não preenchidos!";
		carregaPagina("../view/index.php");
	}

	private function DadosInvalidos() {

		$_SESSION['loginError'] = "Usuário ou senha inválidos!";
		carregaPagina("../view/index.php");

	}

	private function DadosValidados() {

		$_SESSION['user_data']['nome'] = $this->getUsuario()->getNome();
		$_SESSION['user_data']['senha'] = $this->getUsuario()->getSenha();
		$_SESSION['user_data']['usuario'] = $this->getUsuario()->getUsuario();
		$_SESSION['user_data']['id_usuario'] = $this->getUsuario()->getId();
		
		carregaPagina('../view/forum.php');
	}

}