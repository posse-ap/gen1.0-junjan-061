<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language_hour extends Model
{
    protected $table = "languages_hour"; 

    protected $fillable = ['hour', 'date', 'language_id'];

    public function Language()
    {
        return $this->hasMany(Language::class);
    }
}
