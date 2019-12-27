<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Classes\ApiRequest;
use Auth;

class FilmController extends Controller
{
    public function index()
    {   
        $list = '';
        if(Auth::check()){
            
            $list = ApiRequest::get('https://swapi.co/api/films', 
            ['query' => [
                'format' => 'json', 
            ]])['results'];
        }
        
        return view('film/list')->with('list', $list);
    }
    
    public function view($id){
        $film = '';
        if(Auth::check()){
            $data = ApiRequest::get('https://swapi.co/api/films/' . $id, 
            ['query' => [
                'format' => 'json', 
            ]]);
            
            $film = ['title' => $data['title'] , 'opening_crawl' => $data['opening_crawl']];
            foreach($data['characters'] as $key => $value){
                $character = ApiRequest::get($value);
                $film['characters'][] = ['name' => $character['name']];
            }
            
            //dd($film);
        }  
        
        return view('film/view')->with('film', $film);
        
    }
}