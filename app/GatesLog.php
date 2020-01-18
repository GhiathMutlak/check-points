<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GatesLog extends Model {
    
    public function person() {
        return $this->belongsTo('App\Person', 'person_id', 'id');
    }

    public function gate() {
        return $this->belongsTo('App\Gate', 'gate_id', 'id');
    }
}
