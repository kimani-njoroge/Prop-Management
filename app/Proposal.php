<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    // table name
    protected $table = 'proposals';
    //primary key field
    public $primaryKey = 'id';
    //time stamps
    public $timestamps = true;
    //adding user relationship to proposals model
    public function user(){
        return $this->belongsTo('App\User');
    }
}
