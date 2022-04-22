<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    protected $table = 'Language';
    protected $fillable = ['language'];

    public function Language()
    {
        return $this->belongsTo(Language_hour::class);
    }
}
