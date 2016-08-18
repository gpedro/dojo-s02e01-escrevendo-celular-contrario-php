<?php

class CelularInverso {

	private $teclas = ['0 ', null, 'ABC', 'DEF', 'GHI', 'JKL', 'MNO', 'PQRS', 'TUV', 'WXYZ'];
	private $allowed  = '*#-';
	private $value;

	public function __construct($value = '') {
		if (!$value) throw new InvalidArgumentException;
		// convertendo em um array de char
		$this->value = str_split($value);
	}

	public function resolve() {
		$resultado = '';

		// iterando letra por letra
		foreach($this->value as $letra) {

			// se for número, retorna ele mesmo
			if (is_numeric($letra)) {
				$resultado .= $letra;
				continue;
			}

			if (strpos($this->allowed, $letra) !== false) {
				$resultado .= $letra;
				continue;
			}

			// carregando as letras
			foreach ($this->teclas as $numero => $tecla) {
				// se tiver $letra em $tecla, retornar o index
				if (stripos($tecla, $letra) !== false) {
					$resultado .= $numero;
				}
			}
		}

		if (!$resultado) throw new Exception('Blablabla');

		return $resultado;
	}
}
