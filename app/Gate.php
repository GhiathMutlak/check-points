<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gate extends Model {

    protected $name;
    protected $location;
    protected $chief;

    public function gatesLogs() {
        return $this->hasMany('App\GatesLog');
    }

}
