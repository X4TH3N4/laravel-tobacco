<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TobaccoMix extends Pivot
{
    use HasFactory;

    protected $table = 'mix_tobaccos';

    public function mix()
    {
        return $this->belongsTo(Mix::class);
    }

    public function tobacco()
    {
        return $this->belongsTo(Tobacco::class);
    }

}
