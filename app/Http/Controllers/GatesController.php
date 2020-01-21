<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Gate;
use Exception;

class GatesController extends BaseAPIController {
    
    
    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }


    public function addGate() {

        $rules = array(
            'name' => 'required'
        );

        $validator = Validator::make( $this->request->all(), $rules );

        if ( $validator->fails() ) {
          return $this->sendError($validator->errors());
        }


        try {
            $gate = new Gate();
            $gate->name = $this->request->get('name');

            if($this->request->has('location')) {
                $gate->location = $this->request->get('location');
            }

            if($this->request->has('chief')) {
                $gate->chief = $this->request->get('chief');
            }

            $gate->save();

            return $this->sendResponse($gate, "Gate added successfully");

        } catch(Exception $ex) {
            return $this->sendError($ex);
        }

    }



    public function editGate() {

        $rules = array(
            'id' => 'required|integer'
        );

        $validator = Validator::make( $this->request->all(), $rules );

        if ( $validator->fails() ) {
          return $this->sendError($validator->errors());
        }


        try {
            $gate = Gate::find($this->request->get('id'))->first();

            if($this->request->has('name')) {
                $gate->name = $this->request->get('name');
            }

            if($this->request->has('location')) {
                $gate->location = $this->request->get('location');
            }

            if($this->request->has('chief')) {
                $gate->chief = $this->request->get('chief');
            }

            $gate->save();

            return $this->sendResponse($gate, "Gate edited successfully");

        } catch(Exception $ex) {
            return $this->sendError($ex);
        }

    }

    
}
