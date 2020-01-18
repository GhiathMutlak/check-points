<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gate extends Model {
    
    public function gatesLogs() {
        return $this->hasMany('App\GatesLog');
    }

}
