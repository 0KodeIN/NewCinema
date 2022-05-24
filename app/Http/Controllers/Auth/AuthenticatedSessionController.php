<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $name = $request->input('Email');
        $conn = 0;
        if(DB::connection()) {
            $result = DB::select('select * from dispatcher where login = :login', ['login' => $name]);
            // $result = DB::select('select m.film_name, s.session_date, m.film_cost, m.film_photo
            // from movie m
            // inner join session s ON s.id_film = m.id_film from movie where m.id_film = '.$id);
            // DB::table('dispatcher')->insert(
            // ['dispatcher_id' => 102, 'login' => 'admin2', 'password' => 'qwe586']
            // );
            foreach ($result as $res) {
                if($res->login){
                    $conn++;
                }
            }
            
            
        }
        if($conn>0){
            $request ->session()->regenerate();
            return redirect()->intended('/admin');
        }
        else{
            return redirect()->intended('/login');
        }
        $conn = 0;
        
        // $request->authenticate();

        // $request->session()->regenerate();

        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
