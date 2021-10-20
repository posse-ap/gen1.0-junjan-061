<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'theme_id' => 'required',
        'name' => 'required',
        'valid' => 'required'
    );

    public function question()
    {
        return $this->belongsTo(Theme::class);
    }

    public function getData()
    {
        return $this->id . ': ' . $this->name . ': ' . $this->valid . ': ' . $this->theme_id;
    }

    public function getData_2()
    {
        return $this->id . ':' . $this->name . ' (' . $this->choices['name'] . ')' . ' (' . $this->choices['valid'] . ')' ;
    }

}
