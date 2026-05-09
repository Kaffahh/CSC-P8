<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prodi extends Model
{
    protected $fillable = ['name', 'jurusan_id'];

    public function Mahasiswa() : HasMany
    {
        return $this->hasMany(User::class);
    }

    public function Jurusan() : BelongsTo
    {
        return $this->belongsTo(Jurusan::class);
    }
}
