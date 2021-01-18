<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Classificado extends Model {

    protected $table = 'classificado';
    protected $fillable = [
        'id_morador',
        'titulo_classificado',
        'descricao_classificado'
    ];
    
    protected $data = [
        'data' => 'Timestamp'
    ];

    public $timestamps = false;

}

?>