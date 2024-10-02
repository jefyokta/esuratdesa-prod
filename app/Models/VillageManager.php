<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageManager extends Model
{
    use HasFactory;
    protected $table = "village_manager";
    protected $fillable = ['name','role','sign'];
}
