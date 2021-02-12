<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Notebook extends Model 
{
    protected $table = 'notebook';
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