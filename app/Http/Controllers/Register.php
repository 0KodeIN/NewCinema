<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Register extends Controller
{
    public function edit(Request $request) {
        // dd($request->all());
        // dd($request->all());
        // dd($request->all());  //to check all the datas dumped from the form
        // //if your want to get single element,someName in this case
        // $someName = $request->someName;
        // echo $someName;
        $name = $request->input('Name');
        if($name == 'Nikita'){
            return view('auth-page');
        }
        else{
            echo '<br> Failed';
        }
    }
}

