<?php

namespace App\Models\Validation;

class ValidationFornecedor {
    const RULE_CREATE = [
        'nome'=>'required | max: 45',
        'cnpj'=>'required | max: 10',
        'email'=>'required| max: 30' 
    ];
}

?>