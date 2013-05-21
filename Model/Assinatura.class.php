<?php

class Assinatura
{
	private $directory;
	private $funcionario;
	
	public function __construct()
	{
		require "Funcionario.class.php";
		$this->funcionario = new Funcionario();
	}
	
	public function setParams($data)
	{
		$this->directory = empty($data['dir']) ? 'file:///home/user/assinatura/' : 'file://' . $data['dir'];
		$this->funcionario->setNome($data['nome'])
						  ->setCargo($data['cargo'])
						  ->setSetor($data['depto'])
						  ->setEmail($data['email'])
						  ->setFax($data['fax'])
						  ->setNextel($data['nextel'])
						  ->setTelefone1($data['tel1'])
						  ->setTelefone2($data['tel2']);
	}
	
	public function show()
	{
		echo '<html>' . $this->header() . $this->body() . '</html>';
	}
	
	private function header()
	{
		$header = '
					<head>
						<title>Assinatura de E-mail</title>
							<meta http-equiv=\'Content-Type\' content=\'text/html; charset=utf-8\'>
							<style>
								span {
										color:black;
										font-family:"Times New Roman", Georgia, Serif;
								}
								
								#detalhes { font-size:10pt; }
								
								b.nome { font-size:20px; }
							</style>
					</head>';
					
		return $header;
	}
	
	private function body()
	{
		$body =		'
					<body>
						<span>
							<a href="www.ferimport.com.br">
								<img src="' . $this->directory . 'logo.gif" />
							</a><br />
							<b class="nome">' . $this->funcionario->getNome() . '</b> <br />
							' . $this->funcionario->getCargo() . '<br />';
		
		if( !is_null($this->funcionario->getSetor()) )
		{
		 	$body .=		$this->funcionario->getSetor() . '<br />';
		}
		
		$body .=			'<span id="detalhes">
								<img src="' . $this->directory . 'telefone.gif" />'
								. $this->funcionario->getTelefone1() . '<br />';	
	
		if ( !is_null($this->funcionario->getTelefone2()) ) 
		{
			$body .=   			'<img src="' . $this->directory . 'telefone.gif" />'
								. $this->funcionario->getTelefone2() . '<br />';
		}
		if ( !is_null($this->funcionario->getFax()) )
		{
			$body .=	   		'<img src="' . $this->directory . 'fax.gif" />
								&nbsp;&nbsp;' . $this->funcionario->getFax() . '<br />';
		}
		if ( !is_null($this->funcionario->getNextel()) )
		{
			$body .=   			'<img src="' . $this->directory . 'nextel.png" />
								&nbsp;&nbsp;&nbsp;' . $this->funcionario->getNextel() . '<br />';
		}
			
		$body .=				'<img src="' . $this->directory . 'e-mail.gif" />
								&nbsp;<a href="mailto:' . $this->funcionario->getEmail() . '" >'
									. $this->funcionario->getEmail() .
								'</a>
								<br />
								<img src="' . $this->directory . 'arvore.gif" />
								<font color="green" face="arial" size=2 style="font-size:9pt">
									<b>"Antes de imprimir pense em sua responsabilidade e compromisso com o Meio Ambiente."</b>
								</font>
							</span>
						</span>
					</body>';
		
		return $body;
	}
}