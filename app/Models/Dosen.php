<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $fillable = ['nip', 'nama', 'alamat', 'email', 'jenis_kelamin', 'id_prodi', 'img_src'];

    public function mata_kuliah(): HasMany
    {
        return $this->hasMany(MataKuliah::class, 'dosen_nip', 'nip');
    }

    public function prodi(): HasOne
    {
        return $this->hasOne(Prodi::class, 'id', 'id_prodi');
    }
}
