<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'question_id' => 'required',
        'name' => 'required',
    );

    public function questions()
    {
        return $this->belongsTo('App\Question');
    }

    public function choices()
    {
        return $this->hasMany('App\Choice');
    }

    // public function getData()
    // {
    //     return $this->id . ': ' . $this->name . ': ' . $this->question_id;
    // }

}