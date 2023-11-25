<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiMahasiswa extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nilai_mahasiswa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['mhs_nim', 'id_mk', 'id_user', 'nilai_uts', 'nilai_tugas', 'nilai_uas', 'presensi'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['mhs_nim', 'id_mk', 'id_user', 'created_at', 'updated_at'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['grade', 'average'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mhs_nim', 'nim');
    }
    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'id_mk');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function getGradeAttribute()
    {
        $average = $this->getAverageAttribute();
        if ($average >= 90) return 'A';
        if ($average >= 80) return 'B';
        if ($average >= 70) return 'C';
        if ($average >= 60) return 'D';
        return 'E';
    }

    public function getAverageAttribute()
    {
        return ($this->nilai_uts + $this->nilai_uas + $this->nilai_tugas + $this->presensi) / 4;
    }
}
