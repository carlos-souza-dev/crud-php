<?php

namespace App\Models\Validation;

class ClassificadoValidation {
    const RULE_CREATE = [
        'morador_id' => 'required | max:2',
        'titulo_classificado'  => 'required | max:30',
        'descricao_classificado' => 'required | max:50'
    ];
}
?>