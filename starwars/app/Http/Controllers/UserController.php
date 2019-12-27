<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Classes\ApiRequest;
use Auth;

use App\User;
use App\Character;

class UserController extends Controller{
    
    public function index(){
        
        $favs = Character::where('user_id', Auth::id())->get();
        
        //dd($favs);
        return view('user/index')->with('favs', $favs);
    }
}