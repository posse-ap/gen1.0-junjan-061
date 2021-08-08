<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function getData()
    {
        return $this->id . ':' . $this->name ;
    }

    public function choices()
    {
        return $this->hasOne(App\Choice);
    }
}
