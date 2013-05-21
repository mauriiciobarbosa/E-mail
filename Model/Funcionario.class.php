<?php

class Funcionario
{
	private $nome;
	private $cargo;
	private $setor;
	private $telefone1;
	private $telefone2;
	private $fax;
	private $nextel;
	private $email;

	public function __call($name, $params)
	{		
		$property = strtolower(substr($name, 3));
		
		if (property_exists($this, $property))
		{
			if (substr($name, 0, 3) == "get")
			{
				return $this->$property;
			}
			else if (substr($name, 0, 3) == "set")
			{
				$this->$property = empty($params[0]) ? null : $params[0];
				return $this;
			}
			else
			{
				echo "Erro: metodo informado nao existe";
			}
		}
		else
		{
			echo "Erro: propriedade informada nao existe";
		}
	}
}