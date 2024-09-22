<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AromaTobacco extends Pivot
{
    use HasFactory;

    protected $table = 'aroma_tobaccos';

    public function aromas()
    {
        return $this->belongsTo(Aroma::class);
    }

    public function tobaccos()
    {
        return $this->belongsTo(Tobacco::class);
    }
}
