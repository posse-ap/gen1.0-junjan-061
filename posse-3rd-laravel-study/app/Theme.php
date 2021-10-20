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

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    public function getData()
    {
        return $this->id . ': ' . $this->name . ': ' . $this->question_id;
    }

}