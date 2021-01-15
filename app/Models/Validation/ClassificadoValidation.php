<?php

namespace App\Models\Validation;

class ClassificadoValidation {
    const RULE_CREATE = [
        'nome' => 'required | max:10',
        'sobrenome' => 'required | max:10',
        'email' => 'required |email|unique:morador| max:30',
        'idade' => 'required | max:2'
    ];
}
?>