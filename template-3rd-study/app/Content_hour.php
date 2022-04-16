<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content_hour extends Model
{
    protected $table = "contents_hour";

    protected $fillable = ['hour', 'date', 'content_id'];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}
