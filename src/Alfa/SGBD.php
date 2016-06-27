<?php
namespace Alfa;

class SGBD implements Abstracao\SGBD
{
  public $conexao;
  public $tipo;
  protected $endereco;
  protected $porta;
  protected $senha;
  protected $usuario;

  function __construct($tipo)
  {
    $this->tipo = $tipo;
  }

  /**
   * METODOS SET
   */

  public function setEndereco($endereco)
  {
     $this->endereco = $endereco;
  }

  public function setPorta($porta)
  {
      if(is_numeric($porta))
        $this->porta = $porta;
  }

  public function setUsuario($usuario)
  {
    $this->usuario = $usuario;
  }

  public function setSenha($senha)
  {
    $this->senha = $senha;
  }

    /**
   * METODOS GET
   */

  public function getEndereco()
  {
    return $this->endereco;
  }

  public function getPorta()
  {
    return $this->porta;
  }

  public function getUsuario()
  {
    return $this->usuario;
  }

  public function getSenha()
  {
    return $this->senha;
  }

}

