<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Pet extends Model implements Auditable
{
    use AuditableTrait;
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'data_nascimento',
        'sexo',
        'cliente_id',
        'raca_id',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function raca()
    {
        return $this->belongsTo(Raca::class);
    }

    public function agendamento()
    {
        return $this->hasMany(Agendamento::class);
    }
}
