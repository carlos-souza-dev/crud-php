<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Morador extends Model {

    protected $table = 'morador';
    protected $fillable = [
        'nome',
        'sobrenome',
        'email',
        'idade',
        'id_apto'
    ];

    protected $data = [
        'data' => 'Timestamp'
    ];

    public $timestamps = false;
}

?>