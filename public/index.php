<?php
require ('../autoload.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

use Alfa\SGBD;
use Alfa\BaseDeDados;
use Alfa\Produto;
use Alfa\Entidade;

$servidor = new SGBD('mysql');
$servidor->setEndereco('localhost');
$servidor->setPorta(3366);
$servidor->setUsuario('root');
$servidor->setSenha('');

$base = new BaseDeDados($servidor);
$base->setNome('alfa_oo');

$produto = new Produto($base);

try {
  $base->conectar();
  $result_create = $produto->create(['nome', 'preco'], ['Notebook Avell B153', 10000.00]);
  echo "<pre>"; print_r($result_create); echo "</pre>";

  $result_retrieve = $produto->retrieve('nome', 1);
  echo "<pre>"; print_r($result_retrieve); echo "</pre>";

  $update_result = $produto->update(['nome', 'preco'], ['Notebook Avell B155', 40000.00], 1);
  echo "<pre>"; print_r($update_result); echo "</pre>";

  $result_retrieve = $produto->retrieve('nome', 1);
  echo "<pre>"; print_r($result_retrieve); echo "</pre>";

  $delete_result = $produto->delete(1);
  echo "<pre>"; print_r($delete_result); echo "</pre>";

} catch (Exception $e) {
  echo 'Error :'.$e->getMessage();
}

$base->desconectar();

