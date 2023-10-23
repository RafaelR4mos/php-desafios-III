<?php
require_once 'Conta.php';
require_once  'Cpf.php';
require_once 'Titular.php';

$conta1 = new Conta(new Titular(new Cpf("000.000.000-11"), "José"));
$conta2 = new Conta(new Titular(new Cpf("000.000.000-99"), "Paula"));


echo $conta1->getCpfTitular() . PHP_EOL;
echo $conta1->getNomeTitular() . PHP_EOL;

$conta1->depositar(500);
$conta1->sacar(300);
$conta1->transferir(100, $conta2);

var_dump($conta1);
var_dump($conta2);