<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationControllerForm extends Controller
{
    //
    public function create_form(Request $request){
        if($request->method() != 'POST'){
            // return with http error, invalid http method
            return response('Invalid HTTP method', 405);
        }

        $request->validate([

        ]);


        $allParameters = $request->input();
    }

    public function edit(Request $request){
        $allParameters = $request->input();

        dd($allParameters);
    }

    public function delete(Request $request){
        $allParameters = $request->input();

        dd($allParameters);
    }
}
