<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function Content()
    {
        return $this->belongsTo(Content_hour::class);
    }
}
