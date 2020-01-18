<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecurityRecord extends Model {
    
    public function person() {
        return $this->belongsTo('App\Person', 'person_id', 'id');
    }
}
