<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model 
{
    protected $table = 'fornecedor';
    protected $fillable = [
        'nome',
        'cnpj',
        'email'
    ];

    protected $data = [
        'data' => 'Timestamp'
    ];

    public $timestamps = false;
}