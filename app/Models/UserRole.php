<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;


    const ADMINSTRATOR = 1;
    const DOSEN = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['role_name'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_role';

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
