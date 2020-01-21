<?php

namespace App\Http\Controllers;

use App\Person;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PeopleController extends BaseAPIController {
    
    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }


    public function addPerson() {

        $rules = array(
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_1' => 'numeric',
            'phone_2' => 'numeric',
            'national_number' => 'required|digits:11|unique:people',
        );

        $validator = Validator::make( $this->request->all(), $rules );

        if ( $validator->fails() ) {
          return $this->sendError($validator->errors());
        }


        try {
            $person = new Person();
            $person->first_name = $this->request->get('first_name');
            $person->last_name = $this->request->get('last_name');

            if($this->request->has('father_name')) {
                $person->father_name = $this->request->get('father_name');
            }

            if($this->request->has('mother_name')) {
                $person->mother_name = $this->request->get('mother_name');
            }

            if($this->request->has('birth_date')) {
                $person->birth_date = $this->request->get('birth_date');
            }

            if($this->request->has('phone_1')) {
                $person->phone_1 = $this->request->get('phone_1');
            }

            if($this->request->has('phone_2')) {
                $person->phone_2 = $this->request->get('phone_2');
            }

            if($this->request->has('national_number')) {
                $person->national_number = $this->request->get('national_number');
            }

            if($this->request->has('id_no')) {
                $person->id_no = $this->request->get('id_no');
            }

            if($this->request->has('issue_date')) {
                $person->issue_date = $this->request->get('issue_date');
            }

            if($this->request->has('registration')) {
                $person->registration = $this->request->get('registration');
            }

            if($this->request->has('address')) {
                $person->address = $this->request->get('address');
            }

            $person->save();

            return $this->sendResponse($person, "Person added successfully");

        } catch(Exception $ex) {
            return $this->sendError($ex);
        }

    }

    
    public function editPerson() {

        $rules = array(
            'id' => 'required|integer',
            'phone_1' => 'numeric',
            'phone_2' => 'numeric',
            'national_number' => 'digits:11|unique:people',
        );

        $validator = Validator::make( $this->request->all(), $rules );

        if ( $validator->fails() ) {
          return $this->sendError($validator->errors());
        }


        try {
            $person = Person::find($this->request->get('id'))->first();

            if($this->request->has('first_name')) {
                $person->first_name = $this->request->get('first_name');
            }

            if($this->request->has('last_name')) {
                $person->last_name = $this->request->get('last_name');
            }


            if($this->request->has('father_name')) {
                $person->father_name = $this->request->get('father_name');
            }

            if($this->request->has('father_name')) {
                $person->father_name = $this->request->get('father_name');
            }

            if($this->request->has('father_name')) {
                $person->father_name = $this->request->get('father_name');
            }

            if($this->request->has('mother_name')) {
                $person->mother_name = $this->request->get('mother_name');
            }

            if($this->request->has('birth_date')) {
                $person->birth_date = $this->request->get('birth_date');
            }

            if($this->request->has('phone_1')) {
                $person->phone_1 = $this->request->get('phone_1');
            }

            if($this->request->has('phone_2')) {
                $person->phone_2 = $this->request->get('phone_2');
            }

            if($this->request->has('national_number')) {
                $person->national_number = $this->request->get('national_number');
            }

            if($this->request->has('id_no')) {
                $person->id_no = $this->request->get('id_no');
            }

            if($this->request->has('issue_date')) {
                $person->issue_date = $this->request->get('issue_date');
            }

            if($this->request->has('registration')) {
                $person->registration = $this->request->get('registration');
            }

            if($this->request->has('address')) {
                $person->address = $this->request->get('address');
            }

            $person->save();

            return $this->sendResponse($person, "Person edited successfully");

        } catch(Exception $ex) {
            return $this->sendError($ex);
        }

    }
  
}
