<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnose extends Model
{
    //declare table name
    protected $table = 'diagnoses';

    //declare field able to fill
    protected $fillable = [
        'name'
    ];

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
    }
}
