<?php

namespace App\Http\Controllers;

class BaseAPIController extends Controller {

    public function sendResponse ( $result, $message = [] ) {

        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message
        ];

        return response()->json( $response, 200 );

    }


    public function sendError($error , $errorMessages = [] , $code = 404){

        $response = [
            'success' => false ,
            'data' => $error
        ];

        if (!empty($errorMessages)) {
            $response['message'] = $errorMessages;
        }

        return response()->json($response , $code);

    }

}
