<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    protected $table = 'Language';

    public function Language()
    {
        return $this->belongsTo(Language_hour::class);
    }
}
