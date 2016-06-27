<?php
namespace Alfa;

class Entidade implements Abstracao\Entidade
{
  public $nome;
  public $colunas;
  public $valores;
  public $clausula;

  public function __construct()
  {

  }

  public function setNome($nome)
  {
    $this->nome = $nome;
  }
  public function getNome()
  {
    return $this->$nome;
  }

  public function create($colunas, $valores)
  {

  }
  public function retrieve($colunas, $clausula)
  {

  }
  public function update($colunas, $valores, $clausula)
  {

  }
  public function delete($clausula)
  {

  }
}
