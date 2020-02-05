<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    //declare table name
    protected $table = 'rules';

    //declare field able to fill
    protected $fillable = [
        'cause_id','disease_id'
    ];

    public function disease()
    {
        return $this->belongsTo(Diagnose::class,'disease_id');
    }

    public function cause()
    {
        return $this->belongsTo(Diagnose::class,'cause_id');

    }
}
