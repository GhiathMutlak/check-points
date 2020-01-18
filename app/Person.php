<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model {
    
    public function gatesLogs() {
        return $this->hasMany('App\GatesLog');
    }

    public function securityRecords() {
        return $this->hasMany('App\SecurityRecord');
    }

}
