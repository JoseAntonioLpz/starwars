<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Character;
use App\Http\Classes\ApiRequest;
use Auth;

class CharacterController extends Controller
{
    public function index()
    {   
        return 'Index CharacterController';
    }
    
    
    public function store(Request $request)
    {   
        $message = 'Error al añadir personaje';
        try{
            $exist = Character::where('name', $request->name)->where('user_id', Auth::id())->first(); 
            if(empty($exist)){
                $character = new Character();
                $character->name = $request->name;
                $character->user_id = Auth::id();
                $character->save();

                $message = 'Personaje seleccionado como favorito';
            }else{
                $message = 'Este personaje ya es favorito';
            }
            
            
        }catch(\Exception $e){
          // dump($e);
        }
        
        return json_encode($message);    
    }
}