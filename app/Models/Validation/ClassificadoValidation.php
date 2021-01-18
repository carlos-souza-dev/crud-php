<?php

namespace App\Models\Validation;

class ClassificadoValidation {
    const RULE_CREATE = [
        'id_morador' => 'required| max:2',
        'titulo_classificado'  => 'required| max:15',
        'descricao_classificado' => 'required| max:50'
    ];
}
?>