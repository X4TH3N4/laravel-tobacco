<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mix extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'type_id',
        'brand_id',
        'package_type_id',
        'weight',
        'strength',
        'description',
        'stock_quantity',
        'price',
        'score',
        'production_date',
        'expiration_date',
        'owner_id',
    ];

    protected array $dates = ['production_date', 'expiration_date', 'deleted_at'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(TobaccoType::class);
    }

    public function tobaccoMixes()
    {
        return $this->hasMany(TobaccoMix::class);
    }

    public function tobaccos(): BelongsToMany
    {
        return $this->belongsToMany(Tobacco::class, 'mix_tobaccos', 'mix_id', 'tobacco_id');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    public function aromas(): BelongsToMany
    {
        return $this->belongsToMany(Aroma::class, 'mix_aromas', 'mix_id', 'aroma_id');
    }
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
    public function packageType(): BelongsTo
    {
        return $this->belongsTo(PackageType::class);
    }

}
