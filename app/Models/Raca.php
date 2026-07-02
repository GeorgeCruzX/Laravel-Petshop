<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Raca extends Model implements Auditable
{
    use AuditableTrait;
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'especie_id',
    ];

    public function especie()
    {
        return $this->belongsTo(Especie::class);
    }

    public function pet()
    {
        return $this->hasMany(Pet::class);
    }
}
