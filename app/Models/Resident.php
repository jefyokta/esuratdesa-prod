<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Resident extends Model
{
    use HasFactory;
    protected $table = 'residents';
    protected $fillable = [
        'name',
        'nik',
        'birthday',
        'gender',
        'dusun',
        'rt',
        'rw',
        'religion',
        'father_name',
        'father_job',
        'father_birthday',
        'mother_name',
        'job',
        'last_study',
        'current_study',
        'born_in',
        'no_kk',
        'status',
        'status_in_family',
    ];


    // public function Letter(): HasMany
    // {
    //     return $this->hasMany(Letter::class);
    // }
}
