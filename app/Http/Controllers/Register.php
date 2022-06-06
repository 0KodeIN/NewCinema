<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Register extends Controller
{
    public function edit(Request $request) {

        $name = $request->input('Name');
        $psw = $request->input('Password');

        //dd(session()->all());
        if($name == ''){
            return view('admin-page');
        }
        if($psw == ''){
            return view('admin-page');
        }
        $nl = 0;
        if(DB::connection()) {
                $result = DB::table('dispatcher')
                        ->select('dispatcher_id', 'login', 'password')
                        ->where('login', '=', $name)
                        ->get();

                foreach ($result as $res) {
                    echo $res->login;
                    $new_hash = $res->password;
                    $nl = $res->password;
                }
                
            
        }
        if(password_verify($psw, $new_hash)){
            session(['admin' => $name]);
            session()->save();
            //session()->flush();
            header("Location: http://localhost/admin/panel");
            exit( );
        }
        else{
            return view('admin-page');
        } 
    }
    public function show() {
        
        return view('root-page');
    }
    public function ticket(Request $request, $id) {        
        $number = $request->input('number');
        echo $number;
        return view('root-page');
        echo $id;
    }
}

