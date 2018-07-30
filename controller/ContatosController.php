<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/Constants.php';
require_once ROOT_PATH . '/model/ContatosService.php';

class ContatosController 
{

	private $contatosService = null;

	public function __construct()
	{
		$this->contatosService = new ContatosService();
	}

	public function redirect($location)
	{
		header('Location: ' . $location);
	}

	public function handleRequest()
	{
		$op = isset($_GET['op']) ? $_GET['op'] : null;

		try 
		{
			if (!$op || $op == 'list')
			{
			
				$this->listContacts();
			}
				elseif ($op == 'new')
				{
					$this->saveContact();
				}
				elseif ($op == 'edit')
				{
					$this->editContact();
				}
				elseif ($op == 'delete')
				{
					$this->deleteContact();
				}
				elseif ($op == 'show')
				{
					$this->showContact();
				}
				else 
				{
					$this->showError("Page not found", "Page for execution" . $op . " was not found");
				}
		}
		catch(Exception $e)
		{
			$this->showError("Application error", $e->getMessage());
		}
	}	

	public function listContacts()
	{
		$orderby = isset($_GET['orderby']) ? $_GET['orderby'] : null;
		$contacts = $this->contatosService->getAllContacts($orderby);
		include ROOT_PATH . 'view/listaContatosView.php';
	}

	public function saveContact()
	{
		$title = 'Criar Novo Contato';

		$name 	= '';
		$email  = '';
		$mobile = '';

		$errors = array();

		if (isset($_POST['form-submitted']))
		{
			$name   = isset($_POST['name'])   ? trim($_POST['name'])   : null;
			$email  = isset($_POST['email'])  ? trim($_POST['email'])  : null;
			$mobile = isset($_POST['mobile']) ? trim($_POST['mobile']) : null;

			try
			{
				$this->contatosService->createNewContact($name, $email, $mobile);
				$this->redirect('index.php');
				return;
			}
			catch(ValidationException $e)
			{
				$errors = $e->getErrors();
			}
		}

		include ROOT_PATH . '/view/adicionarContatoView.php';
	}

	public function editContact()
	{
		$title = 'Editar contato';

		$name   = '';
		$email  = '';
		$mobile = '';
		$id     = $_GET['id'];

		$contact = $this->contatosService->getContact($id);

		$errors = array();

		if (isset($_POST['form-submitted'])) 
		{
			$name   = isset($_POST['name'])   ? trim($_POST['name']) 	   : null;
			$email  = isset($_POST['email'])  ? trim($_POST['email']) 	   : null;
			$mobile = isset($_POST['mobile']) ? trim($_POST['mobile'])     : null;
			
			try 
			{
				$this->contatosService->editContact($name, $email, $mobile, $id);
				$this->redirect('index.php');
				return;
			}
			catch(ValidationException $e)
			{
				$errors = $e->getErrors();
			}
		}
		include ROOT_PATH . 'view/atualizarContatoView.php';
	}

	public function deleteContact()
	{

		$id = isset($_GET['id']) ? $_GET['id'] : null;
		
		$this->contatosService->deleteContact($id);

		$this->redirect('index.php');
	}

	public function showContact()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : null;

		$errors = array();

		if (!$id)
		{
			throw new Exception('Erro Interno');
		}
		$contact = $this->contatosService->getContact($id);

		include ROOT_PATH . 'view/visualizarContatoView.php';
	}

	public function showError($title, $message)
	{
		include ROOT_PATH . 'view/error.php';
	}
}