<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;;


class Guru extends Model
{
    protected $fillable = [
        'nip',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'password'
    ];

    public function mapel(): HasMany
    {
        return $this->hasMany(Mapel::class, 'id_guru', 'id');
    }
}
