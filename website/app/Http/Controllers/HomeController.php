<?php

namespace App\Http\Controllers;

use App\Events\WebsocketEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home');
    }

    public function update(Request $request){

        $name = $request->input('name');
        $prenom= $request->input('prenom');
        $fonction = $request->input('fonction');


        $user = Auth::user();
        $user->name = $name;
        $user->prenom = $prenom;
        $user->fonction = $fonction;
        $user->save();

        return redirect('/information');
    }
}
