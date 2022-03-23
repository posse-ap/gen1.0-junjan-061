<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    public function contents()
    {
        return $this->hasMany(Content::class);
    }
    public function Language()
    {
        return $this->hasMany(Language::class);
    }
}
