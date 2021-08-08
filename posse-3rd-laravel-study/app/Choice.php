<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'question_id' => 'required',
        'name' => 'required',
        'valid' => 'required'
    );

    public function choice()
    {
        return $this->hasOne('App\Choice');
    }

    public function getData()
    {
        return $this->id . ': ' . $this->name . ': ' . $this->valid;
    }
}
