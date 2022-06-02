<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Register extends Controller
{
    public function edit(Request $request) {

        $name = $request->input('Name');
        $psw = $request->input('Password');
        if($name == ''){
            return view('admin-page');
        }
        $nl = 0;
        if(DB::connection()) {
                $result = DB::table('dispatcher')
                        ->select('dispatcher_id', 'login', 'password')
                        ->where('password', '=', $psw)
                        ->where('login', '=', $name)
                        ->get();

                foreach ($result as $res) {
                    echo $res->login;
                    echo $res->password;
                    $nl = $res->password;
                }
                
            
        }
        if($nl != $psw){
            echo "Ошибка авторизации.";
            sleep(2);
            return view('admin-page');
        }
        else{
            return view('auth-page');
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

