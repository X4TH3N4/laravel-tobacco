<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aroma extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    protected array $dates = ['deleted_at'];

    public function tobaccos(): BelongsToMany
    {
        return $this->belongsToMany(Tobacco::class, 'aroma_tobaccos');
    }
    public function mixes(): BelongsToMany
    {
        return $this->belongsToMany(Mix::class, 'mix_aromas');
    }

}
