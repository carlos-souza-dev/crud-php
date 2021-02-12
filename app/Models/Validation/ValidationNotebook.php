<?php

namespace App\Models\Validation;

class ValidationNotebook {
    const RULE_CREATE = [
        'name'=>'required | max: 40',
        'price'=>'required | max: 10',
    ];
}

?>