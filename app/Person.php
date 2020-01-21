<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model {

    protected $first_name;
    protected $last_name;
    protected $father_name;
    protected $mother_name;
    protected $birth_date;
    protected $birth_place;
    protected $phone_1;
    protected $phone_2;
    protected $national_number;
    protected $id_no;
    protected $issue_date;
    protected $registration;
    protected $address;

    
    public function gatesLogs() {
        return $this->hasMany('App\GatesLog');
    }

    public function securityRecords() {
        return $this->hasMany('App\SecurityRecord');
    }

}
