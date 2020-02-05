<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    //declare table name
    protected $table = 'diseases';

    //declare field able to fill
    protected $fillable = [
        'name'
    ];

    public function rules()
    {
        return $this->hasMany(Rule::class, 'disease_id');
    }

    public function solutions()
    {
        return $this->hasMany(Solution::class, 'disease_id');
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
