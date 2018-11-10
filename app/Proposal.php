<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{

    //adding user relationship to proposals model
    public function user(){
        return $this->belongsTo('App\User');
    }
}
