<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['contents','color'];

    public function Content()
    {
        return $this->belongsTo(Content_hour::class);
    }
}
