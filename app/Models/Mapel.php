<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Mapel extends Model
{
    protected $fillable = [
        'nama_mapel',
        'id_guru'
    ];

    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id');
    }
}
