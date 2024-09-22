<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Tobacco extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'name',
        'type_id',
        'brand_id',
        'aroma_id',
        'aromas',
        'package_type_id',
        'weight',
        'strength',
        'description',
        'stock_quantity',
        'price',
        'score',
        'production_date',
        'expiration_date',
    ];

    protected array $dates = ['production_date', 'expiration_date', 'deleted_at'];

    public function packageType(): BelongsTo
    {
        return $this->belongsTo(PackageType::class, 'package_type_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(TobaccoType::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function mixes(): BelongsToMany
    {
        return $this->belongsToMany(Mix::class, 'mix_tobaccos', 'tobacco_id', 'mix_id');
    }

    public function aromas(): BelongsToMany
    {
        return $this->belongsToMany(Aroma::class, 'aroma_tobaccos');
    }

}
