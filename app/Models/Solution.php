<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    //declare table name
    protected $table = 'solutions';

    //declare field able to fill
    protected $fillable = [
        'name','disease_id'
    ];

    public function disease()
    {
        return $this->belongsTo(Diagnose::class,'disease_id');
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
    }
}
