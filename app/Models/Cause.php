<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    //declare table name
    protected $table = 'causes';

    //declare field able to fill
    protected $fillable = [
        'name'
    ];

    public function rules()
    {
        return $this->hasMany(Rule::class, 'cause_id');
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
