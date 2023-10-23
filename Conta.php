<?php

class Conta
{
    private Titular $titular;
    private float $saldo = 0;
    private static int $numeroDeContas = 0;

    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        self::$numeroDeContas++;
    }

    public function __destruct()
    {
        self::$numeroDeContas--;
    }

    public function depositar(float $valorADepositar): void
    {
        if ($valorADepositar <= 0) {
            echo 'Não é possível depositar 0 ou um valor negativo' . PHP_EOL;
            return;
        }

        $this->saldo = +$valorADepositar;
    }

    public function sacar(float $valorASacar): void
    {
        if ($valorASacar > $this->saldo) {
            echo 'Saldo indisponível para saque' . PHP_EOL;
            return;
        }

        $this->saldo -= $valorASacar;
    }

    public function transferir(float $valorATransferir, Conta $contaDestino): void
    {
        if ($valorATransferir > $this->saldo) {
            echo 'Saldo indisponível para transferência' . PHP_EOL;
            return;
        }

        $this->sacar($valorATransferir);
        $contaDestino->depositar($valorATransferir);
    }

    public function getNomeTitular(): string
    {
        return $this->titular->getNome();
    }

    public function getCpfTitular(): string
    {
        return $this->titular->getCpf();
    }

    public function getSaldo(): string
    {
        return $this->saldo;
    }

    public static function getTotalContas(): int
    {
        return self::$numeroDeContas;
    }
}