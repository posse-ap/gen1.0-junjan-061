<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = ['name'];
    // protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
    );

    public function getData()
    {
        return $this->id . ':' . $this->name ;
    }
    public function getData_2()
    {
        return $this->id . ':' . $this->name . ' (' . $this->themes['name'] . ')';
    }

    public function themes()
    {
        return $this->hasMany(Theme::class);
    }
}
