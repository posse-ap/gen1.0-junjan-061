<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function Language()
    {
        return $this->belongsTo(Hour::class);
    }
}
