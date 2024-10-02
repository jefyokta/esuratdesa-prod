<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Letter extends Model
{
    use HasFactory;
    protected $table = 'letters';
    protected $fillable =[
        "resident_id",
        "category_id",
        "issued_by",
        "status",
        "needed_for",
        "number",
        "details"
    ];


    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function Resident(): BelongsTo
    {
        return $this->belongsTo(Resident::class, 'resident_id');
    }
    public function VillageManager(): BelongsTo
    {
        return $this->belongsTo(VillageManager::class, 'issued_by');
    }
}
