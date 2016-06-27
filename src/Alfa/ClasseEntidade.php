<?php
namespace Alfa;

use Alfa\BaseDeDados;

abstract class ClasseEntidade extends Entidade
{

  public $base;

  public function __construct(BaseDeDados $base)
  {
    $this->base = $base;
  }

  public function create($colunas, $valores)
  {

    $sql = "INSERT INTO $this->nome (".implode(",",$colunas).") VALUES ('".implode("','",$valores)."')";

    if(!mysqli_query($this->base->conexao, $sql))
      throw new \Exception(mysqli_error($this->base->conexao));

    return 'Produto inserido com sucesso!';

  }
  public function retrieve($colunas, $clausula)
  {
    $sql = "SELECT $colunas FROM $this->nome WHERE id = $clausula";

    if(!$result = mysqli_query($this->base->conexao, $sql))
      throw new \Exception(mysqli_error($this->base->conexao));

    return mysqli_fetch_object($result);
  }
  public function update($colunas, $valores, $clausula)
  {
    $values_update = null;
    $values = array_combine($colunas, $valores);
    foreach ($values as $key => $value) {
      $values_update .= $key." = '".$value."', ";
    }
    $values_update = substr_replace($values_update, '', -2);

    $sql = "UPDATE $this->nome SET $values_update WHERE id = $clausula";

    if(!mysqli_query($this->base->conexao, $sql))
      throw new \Exception(mysqli_error($this->base->conexao));

    return 'Produto atualizado com sucesso!';
  }
  public function delete($clausula)
  {
    $sql = "DELETE FROM $this->nome WHERE id = $clausula";

    if(!$result = mysqli_query($this->base->conexao, $sql))
      throw new \Exception(mysqli_error($this->base->conexao));

    return 'Produto deletado com sucesso!';
  }

}
