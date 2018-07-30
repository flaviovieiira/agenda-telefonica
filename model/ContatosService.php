<?php

require_once 'ContatosGateway.php';
require_once ROOT_PATH . 'libraries/ValidationException.php';
require_once ROOT_PATH . 'config/Database.php';

class ContatosService extends ContatosGateway
{

	private $contatosGateway = null;

	public function __construct()
	{
		$this->contatosGateway = new ContatosGateway();
	}

	public function getAllContacts($order)
	{
		try
		{
			self::connect();
			$result = $this->contatosGateway->selectAll($order);

			self::disconnect();
			return $result;
		}
		catch(Exception $e)
		{	
			self::disconnect();
			throw $e;
		}
	}

	public function getContact($id)
	{
		try
		{
			self::connect();
			$result = $this->contatosGateway->selectById($id);
			self::disconnect();
		}
		catch(Exception $e)
		{	
			self::disconnect();
			throw $e;
		}
		return $this->contatosGateway->selectById($id);
	}

	private function validateContactParams($name, $email, $mobile)
	{
		$errors = array();

		//Name
		if ( !isset($name) || empty($name) ) { 
		    $errors[] = 'Nome é obrigatório'; 
		} else if (!preg_match("/^([a-zA-Z' ]+)$/",$name)) { 
			$errors[] = 'Nome inválido'; 
		}

		//Email
		if ( !isset($email) || empty($email) ) { 
		    $errors[] = 'Email é obrigatório'; 
		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors[] = "Email inválido"; 
		}

		// Mobile
		if ( !isset($mobile) || empty($mobile) ) { 
		    $errors[] = 'Telefone é obrigatório'; 
		} else if(!preg_match('^\(+[0-9]{2,3}\) [0-9]{5}-[0-9]{4}$^', $mobile)){

			$errors[] = 'Telefone inválido.'; 
		}

		if (empty($errors))
		{
			return;
		}
		throw new ValidationException($errors);
	}

	public function createNewContact($name, $email, $mobile)
	{
		try 
		{
			self::connect();
			$this->validateContactParams($name, $email, $mobile);
			$result = $this->contatosGateway->insert($name, $email, $mobile);
			self::disconnect();
			return $result;
		}
		catch(Exception $e)
		{
			self::disconnect();
			throw $e;
		}
	}

	public function editContact($name, $email, $mobile, $id)
	{
		try 
		{
			self::connect();
			$result = $this->contatosGateway->edit($name, $email, $mobile, $id);
			self::disconnect();
		}
		catch(Exception $e) {
			self::disconnect();
			throw $e;
		}
	}
	public function deleteContact($id)
	{
		try
		{
			self::connect();
			$result = $this->contatosGateway->delete($id);
			self::disconnect();
		}
		catch(Exception $e)
		{
			self::disconnect();
			throw $e;
		}
	}

}