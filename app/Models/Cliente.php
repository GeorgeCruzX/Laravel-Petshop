<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Cliente extends Model implements Auditable
{
    use AuditableTrait;
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'email',
        'endereco',
    ];

    public function pet()
    {
        return $this->hasMany(Pet::class);
    }
}
