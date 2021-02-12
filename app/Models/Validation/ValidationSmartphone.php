<?php

namespace App\Models\Validation;

class ValidationSmartphone {
    const RULE_CREATE = [
        'name'=>'required | max: 40',
        'price'=>'required | max: 10',
    ];
}

?>