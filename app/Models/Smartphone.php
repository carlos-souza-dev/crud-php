<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Smartphone extends Model 
{
    protected $table = 'smartphone';
    protected $fillable = [
        'name',
        'price'
    ];

    protected $data = [
        'data' => 'Timestamp'
    ];

    public $timestamps = false;
}

?>